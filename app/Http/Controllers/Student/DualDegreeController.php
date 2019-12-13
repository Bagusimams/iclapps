<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;
use Carbon\Carbon;

use App\Http\Requests\DualDegreeRequest;

use App\Models\Student;
use App\Models\JointForm;
use App\Models\UniversityJoint;
use App\Models\Variable;

use App\Mail\JointRegis;

class DualDegreeController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    public function create()
    {
        [$type, $color, $data] = alert();

        $exchange = JointForm::where('student_id', Auth::guard('student')->user()->id)->first();

        if($exchange) return redirect('/student/dual-degree/detail');
        else return view('student.dual-degree.create', compact('type', 'color', 'data'));
    }

    public function store(DualDegreeRequest $request)
    {
        $data = $request->input();

        $univ = UniversityJoint::find($request->university_joint_id);
        $univ_date = Carbon::createFromFormat('Y-m-d', $univ->end);
        if(Carbon::createFromFormat('Y-m-d', $request->passport_expiry_date) < $univ_date->addMonths(6))
        {
            session(['alert' => 'errorPass', 'data' => 'Pass Exp']);

            return redirect()->back();
        }

        $gpa_teknik = Variable::where('name', 'gpa_teknik_dd')->first();
        $gpa_non    = Variable::where('name', 'gpa_non_dd')->first();

        if(!(intval($request->gpa) > $gpa_teknik->score && Auth::guard('student')->user()->school_id > 1 && Auth::guard('student')->user()->school_id < 5) && !($request->gpa > $gpa_non->score && (Auth::guard('student')->user()->school_id == 1 || Auth::guard('student')->user()->school_id > 4)))
        {
            session(['alert' => 'errorGPA', 'data' => 'Pass Exp']);

            return redirect()->back();
        }

        if($request->eng_type == 'IBT Toefl')
        {
            $eng_score_min = Variable::where('name', 'ibt_dd')->first();
        }
        elseif($request->eng_type == 'IELTS')
        {
            $eng_score_min = Variable::where('name', 'ielts_dd')->first();
        }

        if(intval($request->eng_score) < $eng_score_min->score)
        {
            session(['alert' => 'errorToefl', 'data' => 'English Score']);

            return redirect()->back();
        }

        $data['student_id'] = Auth::guard('student')->user()->id;
        $data['school_id'] = Auth::guard('student')->user()->school_id;
        $data['major_id'] = Auth::guard('student')->user()->major_id;

        if($request->hasFile('file_passport')) 
        {
            $data['file_passport'] = $request->file('file_passport')->store('passport_files');
        }

        if($request->hasFile('file_toefl')) 
        {
            $data['file_toefl'] = $request->file('file_toefl')->store('toefl_files');
        }

        if($request->hasFile('file_transcript')) 
        {
            $data['file_transcript'] = $request->file('file_transcript')->store('transcript_files');
        }

        if($request->hasFile('file_financial')) 
        {
            $data['file_financial'] = $request->file('file_financial')->store('financial_files');
        }

        $exchange = JointForm::create($data);

        $student = Student::find(Auth::guard('student')->user()->id);

        Mail::to($student->email)->send(new JointRegis($student));

        session(['alert' => 'add', 'data' => 'Dual Degree']);

        return redirect('/student/dual-degree/detail');
    }

    public function detail()
    {
        [$type, $color, $data] = alert();

        $exchange = JointForm::where('student_id', Auth::guard('student')->user()->id)->first();

        return view('student.dual-degree.detail', compact('exchange', 'type', 'color', 'data'));
    }

    public function edit()
    {
        [$type, $color, $data] = alert();

        $exchange = JointForm::where('student_id', Auth::guard('student')->user()->id)->first();

        return view('student.dual-degree.edit', compact('exchange', 'type', 'color', 'data'));
    }

    public function update(DualDegreeRequest $request)
    {
        $data = $request->input();

        $univ = UniversityJoint::where('name', $request->university_joint)->first();
        $univ_date = Carbon::createFromFormat('Y-m-d', $univ->end);
        if(Carbon::createFromFormat('Y-m-d', $request->passport_expiry_date) < $univ_date->addMonths(6))
        {
            session(['alert' => 'errorPass', 'data' => 'Pass Exp']);

            return redirect()->back();
        }

        $gpa_teknik = Variable::where('name', 'gpa_teknik_dd')->first();
        $gpa_non    = Variable::where('name', 'gpa_non_dd')->first();

        if(!(intval($request->gpa) > $gpa_teknik->score && Auth::guard('student')->user()->school_id > 1 && Auth::guard('student')->user()->school_id < 5) && !($request->gpa > $gpa_non->score && (Auth::guard('student')->user()->school_id == 1 || Auth::guard('student')->user()->school_id > 4)))
        {
            session(['alert' => 'errorGPA', 'data' => 'Pass Exp']);

            return redirect()->back();
        }

        if($request->eng_type == 'IBT Toefl')
        {
            $eng_score_min = Variable::where('name', 'ibt_dd')->first();
        }
        elseif($request->eng_type == 'IELTS')
        {
            $eng_score_min = Variable::where('name', 'ielts_dd')->first();
        }

        if(intval($request->eng_score) < $eng_score_min->score)
        {
            session(['alert' => 'errorToefl', 'data' => 'English Score']);

            return redirect()->back();
        }

        if($request->hasFile('file_admission_letter')) 
        {
            $data['file_admission_letter'] = $request->file('file_admission_letter')->store('admission_letter_files');
        }

        if($request->hasFile('file_ticket')) 
        {
            $data['file_ticket'] = $request->file('file_ticket')->store('ticket_files');
        }

        if($request->hasFile('file_visa')) 
        {
            $data['file_visa'] = $request->file('file_visa')->store('visa_files');
        }

        if($request->hasFile('file_payment')) 
        {
            $data['file_payment'] = $request->file('file_payment')->store('payment_files');
        }

        $exchange = JointForm::where('student_id', Auth::guard('student')->user()->id)->first();
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Dual Degree']);

        return redirect('/student/dual-degree/detail');
    }

    public function delete()
    {
        $exchange = JointForm::where('student_id', Auth::guard('student')->user()->id)->first();
        $exchange->delete();

        session(['alert' => 'delete', 'data' => 'Dual Degree']);

        return redirect('/student/dual-degree/10');
    }
}