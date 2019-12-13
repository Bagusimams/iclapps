<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

use Cookie;

use GuzzleHttp\Exception\RequestException;

use App\Models\Staff;

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
            
            if($result2["status"] == "ok" && $result2['data'][0]->groupname == 'STAFF')
            {
                $staff = Staff::where('username', $request->username)->first();

                if(!$staff)
                {
                    $data_staff['username'] = $request->username;
                    $data_staff['password'] = bcrypt($request->password . '1c4o');
                    $data_staff['email'] = $result2['data'][0]->email;
                    $data_staff['name'] = $result2['data'][0]->fullname;

                    $staff = Staff::create($data_staff);
                }

                $data = $request->only('username', 'password');
                $data['password'] = $data['password'] . '1c4o';

                if(\Auth::guard('staff')->attempt($data))
                {
                    session_start();

                    return redirect('/staff');
                }
                else
                {
                    return redirect('/staff/login');
                }
            }
            else
            {
                session(['alert' => 'errorLogin', 'data' => $result2['data'][0]->groupname]);

                return redirect('/staff/login');
            }
        }
        else
        {
            session(['alert' => 'invalidCredential', 'data' => 'Login']);

            return redirect('/staff/login');
        }
    }
}