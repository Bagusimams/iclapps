<?php

namespace App\Http\Controllers\Lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

use Cookie;

use GuzzleHttp\Exception\RequestException;

use App\Models\Lecturer;

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
            
            if($result2["status"] == "ok" && $result2['data'][0]->groupname == 'STAFF' && $result2['data'][0]->lecturercode != null)
            {
                $lecturer = Lecturer::where('username', $request->username)->first();

                if(!$lecturer)
                {
                    $data_lecturer['username'] = $request->username;
                    $data_lecturer['password'] = bcrypt($request->password . '1c4o');
                    $data_lecturer['email'] = $result2['data'][0]->email;
                    $data_lecturer['name'] = $result2['data'][0]->fullname;
                    $data_lecturer['nip'] = $result2['data'][0]->nipnim;
                    $data_lecturer['code'] = $result2['data'][0]->lecturercode;

                    $lecturer = Lecturer::create($data_lecturer);
                }

                $data = $request->only('username', 'password');
                $data['password'] = $data['password'] . '1c4o';

                if(\Auth::guard('lecturer')->attempt($data))
                {
                    session_start();

                    return redirect('/lecturer');
                }
                else
                {
                    return redirect('/lecturer/login');
                }
            }
            else
            {
                session(['alert' => 'errorLogin', 'data' => $result2['data'][0]->groupname]);

                return redirect('/lecturer/login');
            }
        }
        else
        {
            session(['alert' => 'invalidCredential', 'data' => 'Login']);

            return redirect('/lecturer/login');
        }
    }
}