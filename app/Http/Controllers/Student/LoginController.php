<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

use Cookie;

use GuzzleHttp\Exception\RequestException;

use App\Models\Major;
use App\Models\School;
use App\Models\Student;

class LoginController extends Controller
{
    public function __construct()
    {
    }

    public function doLogin(Request $request)
    {
        $result = callPostGuzzle('/issueauth', null, $request->input());
        
        if($result["status"] == "ok")
        {
            $result2 = callGetGuzzle('/8025fd46773b2ed931db2fe53048d5c3', $result['data']->token);
            
            if($result2["status"] == "ok" && $result2['data'][0]->groupname == 'STUDENT')
            {
                $student = Student::where('username', $request->username)->first();

                if(!$student)
                {
                    $data_student['username'] = $request->username;
                    $data_student['password'] = bcrypt($request->password . '1c4o');
                    $data_student['email'] = $result2['data'][0]->email;
                    $data_student['name'] = $result2['data'][0]->fullname;
                    $data_student['nim'] = $result2['data'][0]->nipnim;

                    $school = School::where('name', $result2['data'][0]->facultyname)->first();
                    $data_student['school_id'] = $school->id;

                    $major = Major::where('name', $result2['data'][0]->studyprogramname)->first();
                    $data_student['major_id'] = $major->id;

                    $student = Student::create($data_student);
                }

                $data = $request->only('username', 'password');
                $data['password'] = $data['password'] . '1c4o';

                if(\Auth::guard('student')->attempt($data))
                {
                    session_start();

                    return redirect('/student');
                }
                else
                {
                    return redirect('/student/login');
                }
            }
            else
            {
                // dd('a');die;
                session(['alert' => 'notUser', 'data' => $result2['data'][0]->groupname]);

                return redirect('/student/login');
            }
        }
        else
        {
            session(['alert' => 'invalidCredential', 'data' => 'Login']);

            return redirect('/student/login');
        }
    }
}