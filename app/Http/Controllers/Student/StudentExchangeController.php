<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;
use Carbon\Carbon;

use App\Http\Requests\StudentExchangeRequest;

use App\Models\Student;
use App\Models\StudentExchangeForm;
use App\Models\UniversityExchange;
use App\Models\Variable;

use App\Mail\ExchangeRegis;

class StudentExchangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    public function create()
    {
        [$type, $color, $data] = alert();

        $exchange = StudentExchangeForm::where('student_id', Auth::guard('student')->user()->id)->first();

        if($exchange) return redirect('/student/student-exchange/detail');
        else return view('student.student-exchange.create', compact('type', 'color', 'data'));
    }

    public function store(StudentExchangeRequest $request)
    {
        $data = $request->input();

        $univ = UniversityExchange::find($request->university_exchange_id);
        $univ_date = Carbon::createFromFormat('Y-m-d', $univ->end);
        if(Carbon::createFromFormat('Y-m-d', $request->passport_expiry_date) < $univ_date->addMonths(6))
        {
            session(['alert' => 'errorPass', 'data' => 'Pass Exp']);

            return redirect()->back();
        }

        $gpa_teknik = Variable::where('name', 'gpa_teknik_exc')->first();
        $gpa_non    = Variable::where('name', 'gpa_non_exc')->first();

        if(!(intval($request->gpa) > $gpa_teknik->score && Auth::guard('student')->user()->school_id > 1 && Auth::guard('student')->user()->school_id < 5) && !($request->gpa > $gpa_non->score && (Auth::guard('student')->user()->school_id == 1 || Auth::guard('student')->user()->school_id > 4)))
        {
            session(['alert' => 'errorGPA', 'data' => 'Pass Exp']);

            return redirect()->back();
        }

        if($request->eng_type == 'ITP Toefl')
        {
            $eng_score_min = Variable::where('name', 'itp_exc')->first();
        }
        elseif($request->eng_type == 'EPRT')
        {
            $eng_score_min = Variable::where('name', 'eprt_exc')->first();
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

        $exchange = StudentExchangeForm::create($data);

        $student = Student::find(Auth::guard('student')->user()->id);

        Mail::to($student->email)->send(new ExchangeRegis($student));

        session(['alert' => 'add', 'data' => 'Student Exchange']);

        return redirect('/student/student-exchange/detail');
    }

    public function detail()
    {
        [$type, $color, $data] = alert();

        $exchange = StudentExchangeForm::where('student_id', Auth::guard('student')->user()->id)->first();

        return view('student.student-exchange.detail', compact('exchange', 'type', 'color', 'data'));
    }

    public function edit()
    {
        [$type, $color, $data] = alert();

        $exchange = StudentExchangeForm::where('student_id', Auth::guard('student')->user()->id)->first();

        return view('student.student-exchange.edit', compact('exchange', 'type', 'color', 'data'));
    }

    public function update(StudentExchangeRequest $request)
    {
        $data = $request->input();

        $univ = UniversityExchange::where('name', $request->university_exchange)->first();
        $univ_date = Carbon::createFromFormat('Y-m-d', $univ->end);
        if(Carbon::createFromFormat('Y-m-d', $request->passport_expiry_date) < $univ_date->addMonths(6))
        {
            session(['alert' => 'errorPass', 'data' => 'Pass Exp']);

            return redirect()->back();
        }
        
        $gpa_teknik = Variable::where('name', 'gpa_teknik_exc')->first();
        $gpa_non    = Variable::where('name', 'gpa_non_exc')->first();

        if(!(intval($request->gpa) > $gpa_teknik->score && Auth::guard('student')->user()->school_id > 1 && Auth::guard('student')->user()->school_id < 5) && !($request->gpa > $gpa_non->score && (Auth::guard('student')->user()->school_id == 1 || Auth::guard('student')->user()->school_id > 4)))
        {
            session(['alert' => 'errorGPA', 'data' => 'Pass Exp']);

            return redirect()->back();
        }

        if($request->eng_type == 'ITP Toefl')
        {
            $eng_score_min = Variable::where('name', 'itp_exc')->first();
        }
        elseif($request->eng_type == 'EPRT')
        {
            $eng_score_min = Variable::where('name', 'eprt_exc')->first();
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

        $exchange = StudentExchangeForm::where('student_id', Auth::guard('student')->user()->id)->first();
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Student Exchange']);

        return redirect('/student/student-exchange/detail');
    }

    public function delete()
    {
        $exchange = StudentExchangeForm::where('student_id', Auth::guard('student')->user()->id)->first();
        $exchange->delete();

        session(['alert' => 'delete', 'data' => 'Student Exchange']);

        return redirect('/student/student-exchange/10');
    }
}