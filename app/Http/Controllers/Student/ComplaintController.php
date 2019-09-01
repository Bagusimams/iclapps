<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;

use App\Http\Requests\ComplaintRequest;

use App\Models\Complaint;

use App\Mail\ComplaintEmail;

class ComplaintController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $complaints = Complaint::where('role', 'student')->where('role_id', Auth::guard('student')->user()->id)->get();
        else $complaints = Complaint::where('role', 'student')->where('role_id', Auth::guard('student')->user()->id)->paginate($pagination);

    	return view('student.complaint.index', compact('complaints', 'type', 'color', 'data', 'pagination'));
    }

    public function create()
    {
        [$type, $color, $data] = alert();

        return view('student.complaint.create', compact('type', 'color', 'data'));
    }

    public function store(ComplaintRequest $request)
    {
        $data = $request->input();
        $data['role'] = 'Student';
        $data['role_id'] = Auth::guard('student')->user()->id;
        $data['school_id'] = Auth::guard('student')->user()->school_id;
        $data['major_id'] = Auth::guard('student')->user()->major_id;

        $complaint = Complaint::create($data);

        $student = Student::find(Auth::guard('student')->user()->id);
            
        Mail::to($student->email)->send(new ComplaintEmail($student));

        session(['alert' => 'add', 'data' => 'Complaint']);

        return redirect('/student/complaint/' . $complaint->id . '/detail');
    }

    public function detail($complaint_id)
    {
        [$type, $color, $data] = alert();

        $complaint = Complaint::find($complaint_id);

        return view('student.complaint.detail', compact('complaint', 'type', 'color', 'data'));
    }

    public function edit($complaint_id)
    {
        [$type, $color, $data] = alert();

        $complaint = Complaint::find($complaint_id);

        return view('student.complaint.edit', compact('complaint', 'type', 'color', 'data'));
    }

    public function update($complaint_id, ComplaintRequest $request)
    {
        $data = $request->input();

        $complaint = Complaint::find($complaint_id);
        $complaint->update($data);

        session(['alert' => 'edit', 'data' => 'Complaint']);

        return redirect('/student/complaint/' . $complaint->id);
    }

    public function delete($complaint_id)
    {
        $complaint = Inventory::find($complaint_id);
        $complaint->delete();

        session(['alert' => 'delete', 'data' => 'Complaint']);

        return redirect('/student/complaint/10');
    }
}