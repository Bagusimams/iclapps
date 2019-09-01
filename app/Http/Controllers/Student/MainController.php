<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Http\Requests\Role\StudentRequest;

use App\Models\Student;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    public function index()
    {
        [$type, $color, $data] = alert();
        $role = 'student';

    	return view('student.index', compact('type', 'color', 'data', 'role'));
    }

    public function profile()
    {
        [$type, $color, $data] = alert();

    	$user = Auth::guard('student')->user();

    	return view('student.auth.profile', compact('user', 'type', 'color', 'data'));
    }

    public function updateProfile(InternshipRequest $request)
    {
    	$data = $request->input();
        $data['password'] = bcrypt($request->password);
    	$user = Staff::find(Auth::guard('student')->user()->id);
    	$user->update($data);

        session(['alert' => 'edit', 'data' => 'Profile']);

        return redirect('student/' . $clinic . '/profile');
    }
}