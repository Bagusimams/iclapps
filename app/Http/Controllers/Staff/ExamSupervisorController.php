<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;

use App\Http\Requests\ExamSupervisorRequest;

use App\Models\ExamSupervisor;
use App\Models\Student;

use App\Mail\FailedExamProctor;
use App\Mail\SuccessExamProctor;

class ExamSupervisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $supervisors = ExamSupervisor::all();
        else $supervisors = ExamSupervisor::paginate($pagination);

    	return view('staff.exam-supervisor.index', compact('supervisors', 'type', 'color', 'data', 'pagination'));
    }

    public function create()
    {
        [$type, $color, $data] = alert();

        return view('staff.exam-supervisor.create', compact('type', 'color', 'data'));
    }

    public function store(ExamSupervisorRequest $request)
    {
        $data = $request->input();

        if($request->hasFile('certificate_file')) 
        {
            $data['certificate_file'] = $request->file('certificate_file')->store('certificate_files');
        }

        $supervisor = ExamSupervisor::create($data);

        session(['alert' => 'add', 'data' => 'Exam supervisor']);

        return redirect('/staff/exam-supervisor/' . $supervisor->id . '/detail');
    }

    public function detail($supervisor_id)
    {
        [$type, $color, $data] = alert();

        $supervisor = ExamSupervisor::find($supervisor_id);

        return view('staff.exam-supervisor.detail', compact('supervisor', 'type', 'color', 'data'));
    }

    public function edit($supervisor_id)
    {
        [$type, $color, $data] = alert();

        $supervisor = ExamSupervisor::find($supervisor_id);

        return view('staff.exam-supervisor.edit', compact('supervisor', 'type', 'color', 'data'));
    }

    public function update($supervisor_id, ExamSupervisorRequest $request)
    {
        $data = $request->input();

        $supervisor = ExamSupervisor::find($supervisor_id);
        $supervisor->update($data);

        session(['alert' => 'edit', 'data' => 'Exam supervisor']);

        return redirect('/staff/exam-supervisor/' . $supervisor->id . '/detail');
    }

    public function changeStatus($supervisor_id, $status)
    {
        $data['status'] = $status;

        $supervisor = ExamSupervisor::find($supervisor_id);
        $supervisor->update($data);

        if($supervisor->role != null)
        {
            if($supervisor->role == 'Student')
            {
                $student = Student::find($supervisor->role_id);

                if($status == 1)
                {
                    Mail::to($student->email)->send(new SuccessExamProctor($student));
                }
                else
                {
                    Mail::to($student->email)->send(new FailedExamProctor($student));
                }
            }
        }

        session(['alert' => 'edit', 'data' => 'Exam supervisor']);

        return redirect('/staff/exam-supervisor/10');
    }

    public function delete($supervisor_id)
    {
        $supervisor = ExamSupervisor::find($supervisor_id);
        $supervisor->delete();

        session(['alert' => 'delete', 'data' => 'Exam supervisor']);

        return redirect('/staff/exam-supervisor/10');
    }
}