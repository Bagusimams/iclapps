<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\InternshipProgram;

class InternshipController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $internships = InternshipProgram::all();
        else $internships = InternshipProgram::paginate($pagination);

    	return view('staff.internship.index', compact('internships', 'type', 'color', 'data', 'pagination'));
    }

    public function create()
    {
        [$type, $color, $data] = alert();

        return view('staff.internship.create', compact('type', 'color', 'data'));
    }

    public function store(Request $request)
    {
        $data = $request->input();

        $internship = InternshipProgram::create($data);

        session(['alert' => 'add', 'data' => 'Internship']);

        return redirect('/staff/internship/' . $internship->id . '/detail');
    }

    public function detail($internship_id)
    {
        [$type, $color, $data] = alert();

        $internship = InternshipProgram::find($internship_id);

        return view('staff.internship.detail', compact('internship', 'type', 'color', 'data'));
    }

    public function changeActive($internship_id, $status)
    {
        $data['is_active'] = $status;

        $internship = InternshipProgram::find($internship_id);
        $internship->update($data);

        session(['alert' => 'edit', 'data' => 'Internship']);

        return redirect('/staff/internship/20');
    }

    public function edit($internship_id, Request $request)
    {
        [$type, $color, $data] = alert();

        $internship = InternshipProgram::find($internship_id);

        return view('staff.internship.edit', compact('internship', 'type', 'color', 'data'));
    }

    public function update($internship_id, Request $request)
    {
        $data = $request->input();

        $internship = InternshipProgram::find($internship_id);
        $internship->update($data);

        session(['alert' => 'edit', 'data' => 'Internship']);

        return redirect('/staff/internship/' . $internship->id . '/detail');
    }

    public function delete($internship_id)
    {
        $internship = InternshipProgram::find($internship_id);
        $internship->delete();

        session(['alert' => 'delete', 'data' => 'Internship']);

        return redirect('/staff/internship/10');
    }
}