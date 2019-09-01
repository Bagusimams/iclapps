<?php

namespace App\Http\Controllers\Internship;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Http\Requests\Role\InternshipRequest;

use App\Models\Internship;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('internship');
    }

    public function index()
    {
    	return view('internship.index');
    }

    public function profile()
    {
        [$type, $color, $data] = alert();

    	$user = Auth::guard('internship')->user();

    	return view('internship.auth.profile', compact('user', 'type', 'color', 'data', 'internship'));
    }

    public function updateProfile(InternshipRequest $request)
    {
    	$data = $request->input();
        $data['password'] = bcrypt($request->password);
    	$user = Internship::find(Auth::guard('internship')->user()->id);
    	$user->update($data);

        session(['alert' => 'edit', 'data' => 'Profile']);

        return redirect('internship/' . $clinic . '/profile');
    }
}