<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;

use App\Models\Student;
use App\Models\SummerSchool;
use App\Models\SummerSchoolForm;

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

    	return view('staff.summer-school.index', compact('exchanges', 'type', 'color', 'data', 'pagination', 'university_id', 'status'));
    }

    public function important($exchange_id)
    {
        [$type, $color, $data] = alert();

        $exchange = SummerSchoolForm::find($exchange_id);

        return view('staff.summer-school.important', compact('exchange', 'type', 'color', 'data'));
    }

    public function detail($exchange_id)
    {
        [$type, $color, $data] = alert();

        $exchange = SummerSchoolForm::find($exchange_id);

        return view('staff.summer-school.detail', compact('exchange', 'type', 'color', 'data'));
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

        return redirect('/staff/summer-school/' . $exchange_id . '/detail');
    }

    public function payment($exchange_id)
    {
        $data['is_payment_complete'] = 1;

        $exchange = SummerSchoolForm::find($exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Summer School']);

        return redirect('/staff/summer-school/' . $exchange_id . '/detail');
    }

    public function assign($exchange_id)
    {
        [$type, $color, $data] = alert();

        $exchange = SummerSchoolForm::find($exchange_id);

        return view('staff.summer-school.assign', compact('exchange', 'type', 'color', 'data'));
    }

    public function assignLecturer($exchange_id, Request $request)
    {
        $data['lecturer_id'] = $request->lecturer_id;

        $exchange = SummerSchoolForm::find($exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Summer School']);

        return redirect('/staff/summer-school/' . $exchange_id . '/detail');
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

        return view('staff.summer-school.upload', compact('exchanges', 'university_id', 'type', 'color', 'data'));
    }
}