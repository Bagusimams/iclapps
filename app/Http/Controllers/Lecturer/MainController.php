<?php

namespace App\Http\Controllers\Lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Http\Requests\Role\LecturerRequest;

use App\Models\Lecturer;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('lecturer');
    }

    public function index()
    {
        [$type, $color, $data] = alert();
        $role = 'lecturer';

    	return view('lecturer.index', compact('type', 'color', 'data', 'role'));
    }

    public function profile()
    {
        [$type, $color, $data] = alert();

    	$user = Auth::guard('lecturer')->user();

    	return view('lecturer.auth.profile', compact('user', 'type', 'color', 'data'));
    }

    public function updateProfile(InternshipRequest $request)
    {
    	$data = $request->input();
        $data['password'] = bcrypt($request->password);
    	$user = Lecturer::find(Auth::guard('lecturer')->user()->id);
    	$user->update($data);

        session(['alert' => 'edit', 'data' => 'Profile']);

        return redirect('lecturer/profile');
    }
}