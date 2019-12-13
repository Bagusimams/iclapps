<?php

namespace App\Http\Controllers\Staff;

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

use App\Mail\AcceptSummer;
use App\Mail\RejectSummer;

class SummerController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
    }

    public function index($university_id, $status, $pagination)
    {
        [$type, $color, $data] = alert();

        if($university_id == 'all')
        {
            if($status == 'all')
            {
                if($pagination == 'all') $exchanges = SummerSchoolForm::all();
                else $exchanges = SummerSchoolForm::paginate($pagination);
            }
            else
            {
                if($pagination == 'all') $exchanges = SummerSchoolForm::where('status', $status)->get();
                else $exchanges = SummerSchoolForm::where('status', $status)->paginate($pagination);
            }
        }
        else
        {
            if($status == 'all')
            {
                if($pagination == 'all') $exchanges = SummerSchoolForm::where('summer_school_id', $university_id)->get();
                else $exchanges = SummerSchoolForm::where('summer_school_id', $university_id)->paginate($pagination);
            }
            else
            {
                if($pagination == 'all') $exchanges = SummerSchoolForm::where('summer_school_id', $university_id)->where('status', $status)->get();
                else $exchanges = SummerSchoolForm::where('summer_school_id', $university_id)->where('status', $status)->paginate($pagination);
            }
        }

    	return view('staff.summer.index', compact('exchanges', 'type', 'color', 'data', 'pagination', 'university_id', 'status'));
    }

    public function important($exchange_id)
    {
        [$type, $color, $data] = alert();

        $exchange = SummerSchoolForm::find($exchange_id);

        return view('staff.summer.important', compact('exchange', 'type', 'color', 'data'));
    }

    public function detail($exchange_id)
    {
        [$type, $color, $data] = alert();

        $exchange = SummerSchoolForm::find($exchange_id);

        return view('staff.summer.detail', compact('exchange', 'type', 'color', 'data'));
    }

    public function edit($exchange_id)
    {
        [$type, $color, $data] = alert();

        $exchange = SummerSchoolForm::find($exchange_id);

        return view('staff.summer.edit', compact('exchange', 'type', 'color', 'data'));
    }

    public function update($exchange_id, SummerRequest $request)
    {
        $exchange = SummerSchoolForm::find($exchange_id);

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

        if(!(intval($request->gpa) > $gpa_teknik->score && $exchange->student->school_id > 1 && $exchange->student->school_id < 5) && !($request->gpa > $gpa_non->score && ($exchange->student->school_id == 1 || $exchange->student->school_id > 4)))
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

        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Summer School Program']);

        return redirect('/staff/summer/' . $exchange_id . '/detail');
    }

    public function accept($exchange_id)
    {
        $data['is_form_complete'] = 1;

        $exchange = SummerSchoolForm::find($exchange_id);
        $exchange->update($data);

        $student = Student::find($exchange->student_id);

        Mail::to($student->email)->send(new AcceptSummer($student));

        session(['alert' => 'edit', 'data' => 'Summer School Program']);

        return redirect('/staff/summer/' . $exchange_id . '/detail');
    }

    public function reject($exchange_id)
    {
        $data['is_form_complete'] = 2;

        $exchange = SummerSchoolForm::find($exchange_id);
        $exchange->update($data);

        $student = Student::find($exchange->student_id);

        Mail::to($student->email)->send(new RejectSummer($student));

        session(['alert' => 'edit', 'data' => 'Summer School Program']);

        return redirect('/staff/summer/' . $exchange_id . '/detail');
    }

    public function ticket($exchange_id)
    {
        $data['is_ticket_complete'] = 1;

        $exchange = SummerSchoolForm::find($exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Summer School']);

        return redirect('/staff/summer/' . $exchange_id . '/detail');
    }

    public function payment($exchange_id)
    {
        $data['is_payment_complete'] = 1;

        $exchange = SummerSchoolForm::find($exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Summer School']);

        return redirect('/staff/summer/' . $exchange_id . '/detail');
    }

    public function assign($exchange_id)
    {
        [$type, $color, $data] = alert();

        $exchange = SummerSchoolForm::find($exchange_id);

        return view('staff.summer.assign', compact('exchange', 'type', 'color', 'data'));
    }

    public function assignLecturer($exchange_id, Request $request)
    {
        $data['lecturer_id'] = $request->lecturer_id;

        $exchange = SummerSchoolForm::find($exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Summer School']);

        return redirect('/staff/summer/' . $exchange_id . '/detail');
    }

    public function upload($university_id)
    {
        [$type, $color, $data] = alert();

        $exchanges = [];
        if($university_id == 'all')
        {
            $universities = SummerSchool::where('status', 1)->whereDate('start', '<=', date('Y-m-d'))->whereDate('end', '>=', date('Y-m-d'))->get();
        }
        else
        {
            $universities = SummerSchool::where('id', $university_id)->get();
        }

        foreach ($universities as $university) 
        {
            $datas = SummerSchoolForm::where('summer_school_id', $university->id)->get();

            array_push($exchanges, $datas);
        }

        return view('staff.summer.upload', compact('exchanges', 'university_id', 'type', 'color', 'data'));
    }
}