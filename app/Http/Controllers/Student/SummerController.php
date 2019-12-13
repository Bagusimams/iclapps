<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;
use Carbon\Carbon;

use App\Http\Requests\SummerRequest;

use App\Models\Student;
use App\Models\SummerSchool;
use App\Models\SummerSchoolForm;
use App\Models\Variable;

use App\Mail\SummerSchoolEmail;

class SummerController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    public function create()
    {
        [$type, $color, $data] = alert();

        $exchange = SummerSchoolForm::where('student_id', Auth::guard('student')->user()->id)->first();

        if($exchange) return redirect('/student/summer/detail');
        else return view('student.summer.create', compact('type', 'color', 'data'));
    }

    public function store(SummerRequest $request)
    {
        $data = $request->input();

        $univ = SummerSchool::find($request->university_exchange_id);
        $univ_date = Carbon::createFromFormat('Y-m-d', $univ->end);
        if(Carbon::createFromFormat('Y-m-d', $request->passport_expiry_date) < $univ_date->addMonths(6))
        {
            session(['alert' => 'errorPass', 'data' => 'Pass Exp']);

            return redirect()->back();
        }

        $gpa_teknik = Variable::where('name', 'gpa_teknik_summer')->first();
        $gpa_non    = Variable::where('name', 'gpa_non_summer')->first();

        if(!(intval($request->gpa) > $gpa_teknik->score && Auth::guard('student')->user()->school_id > 1 && Auth::guard('student')->user()->school_id < 5) && !($request->gpa > $gpa_non->score && (Auth::guard('student')->user()->school_id == 1 || Auth::guard('student')->user()->school_id > 4)))
        {
            session(['alert' => 'errorGPA', 'data' => 'Pass Exp']);

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

        $exchange = SummerSchoolForm::create($data);

        $student = Student::find(Auth::guard('student')->user()->id);

        Mail::to($student->email)->send(new SummerSchoolEmail($student));

        session(['alert' => 'add', 'data' => 'Summer School Program']);

        return redirect('/student/summer/detail');
    }

    public function detail()
    {
        [$type, $color, $data] = alert();

        $exchange = SummerSchoolForm::where('student_id', Auth::guard('student')->user()->id)->first();

        return view('student.summer.detail', compact('exchange', 'type', 'color', 'data'));
    }

    public function edit()
    {
        [$type, $color, $data] = alert();

        $exchange = SummerSchoolForm::where('student_id', Auth::guard('student')->user()->id)->first();

        return view('student.summer.edit', compact('exchange', 'type', 'color', 'data'));
    }

    public function update(SummerRequest $request)
    {
        $data = $request->input();

        $univ = SummerSchool::where('name', $request->university_exchange)->first();
        $univ_date = Carbon::createFromFormat('Y-m-d', $univ->end);
        if(Carbon::createFromFormat('Y-m-d', $request->passport_expiry_date) < $univ_date->addMonths(6))
        {
            session(['alert' => 'errorPass', 'data' => 'Pass Exp']);

            return redirect()->back();
        }

        $gpa_teknik = Variable::where('name', 'gpa_teknik_summer')->first();
        $gpa_non    = Variable::where('name', 'gpa_non_summer')->first();

        if(!(intval($request->gpa) > $gpa_teknik->score && Auth::guard('student')->user()->school_id > 1 && Auth::guard('student')->user()->school_id < 5) && !($request->gpa > $gpa_non->score && (Auth::guard('student')->user()->school_id == 1 || Auth::guard('student')->user()->school_id > 4)))
        {
            session(['alert' => 'errorGPA', 'data' => 'Pass Exp']);

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

        $exchange = SummerSchoolForm::where('student_id', Auth::guard('student')->user()->id)->first();
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Summer School Program']);

        return redirect('/student/summer/detail');
    }

    public function delete()
    {
        $exchange = SummerSchoolForm::where('student_id', Auth::guard('student')->user()->id)->first();
        $exchange->delete();

        session(['alert' => 'delete', 'data' => 'Summer School Program']);

        return redirect('/student/summer/10');
    }
}