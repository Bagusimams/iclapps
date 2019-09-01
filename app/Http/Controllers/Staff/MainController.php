<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Http\Requests\Role\StaffRequest;

use App\Models\Staff;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
    }

    public function index()
    {
        [$type, $color, $data] = alert();
        $role = 'staff';

    	return view('staff.index', compact('type', 'color', 'data', 'role'));
    }

    public function profile()
    {
        [$type, $color, $data] = alert();

    	$user = Auth::guard('staff')->user();

    	return view('staff.auth.profile', compact('user', 'type', 'color', 'data'));
    }

    public function updateProfile(InternshipRequest $request)
    {
    	$data = $request->input();
        $data['password'] = bcrypt($request->password);
    	$user = Staff::find(Auth::guard('staff')->user()->id);
    	$user->update($data);

        session(['alert' => 'edit', 'data' => 'Profile']);

        return redirect('staff/' . $clinic . '/profile');
    }
}