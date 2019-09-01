<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;

use App\Http\Requests\ExamSupervisorRequest;

use App\Models\ExamSupervisor;
use App\Models\Student;

use App\Mail\ExamProctor;

class ExamSupervisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    public function create()
    {
        if(date('Y') - 2 >= Auth::guard('student')->user()->batch_year)
        {
            [$type, $color, $data] = alert();

            $supervisor = ExamSupervisor::where('role', 'Student')->where('role_id', Auth::guard('student')->user()->id)->orderBy('created_at', 'desc')->first();

            if($supervisor) return redirect('/student/exam-supervisor/detail');
            else return view('student.exam-supervisor.create', compact('type', 'color', 'data'));
        }
        else
        {
            return redirect('/student/exam-supervisor/error');
        }
    }

    public function error()
    {
        [$type, $color, $data] = alert();

        return view('student.exam-supervisor.error', compact('type', 'color', 'data'));
    }

    public function store(ExamSupervisorRequest $request)
    {
        $data = $request->input();
        $data['role'] = 'Student';
        $data['role_id'] = Auth::guard('student')->user()->id;
        $data['status'] = 0;

        if($request->hasFile('certificate_file')) 
        {
            $data['certificate_file'] = $request->file('certificate_file')->store('certificate_files');
        }

        $supervisor = ExamSupervisor::create($data);

        $student = Student::find(Auth::guard('student')->user()->id);

        Mail::to($student->email)->send(new ExamProctor($student));

        session(['alert' => 'add', 'data' => 'Exam supervisor']);

        return redirect('/student/exam-supervisor/detail');
    }

    public function detail()
    {
        [$type, $color, $data] = alert();

        $supervisor = ExamSupervisor::where('role', 'student')->where('role_id', Auth::guard('student')->user()->id)->orderBy('created_at', 'desc')->first();

        return view('student.exam-supervisor.detail', compact('supervisor', 'type', 'color', 'data'));
    }

    public function edit()
    {
        [$type, $color, $data] = alert();

        $supervisor = ExamSupervisor::where('role', 'student')->where('role_id', Auth::guard('student')->user()->id)->orderBy('created_at', 'desc')->first();

        return view('student.exam-supervisor.edit', compact('supervisor', 'type', 'color', 'data'));
    }

    public function update($supervisor_id, ExamSupervisorRequest $request)
    {
        $data = $request->input();

        $supervisor = ExamSupervisor::where('role', 'student')->where('role_id', Auth::guard('student')->user()->id)->orderBy('created_at', 'desc')->first();
        $supervisor->update($data);

        session(['alert' => 'edit', 'data' => 'Exam supervisor']);

        return redirect('/student/exam-supervisor/detail');
    }

    public function delete($supervisor_id)
    {
        $supervisor = ExamSupervisor::where('role', 'student')->where('role_id', Auth::guard('student')->user()->id)->orderBy('created_at', 'desc')->first();
        $supervisor->delete();

        session(['alert' => 'delete', 'data' => 'Exam supervisor']);

        return redirect('/student/exam-supervisor/create');
    }
}