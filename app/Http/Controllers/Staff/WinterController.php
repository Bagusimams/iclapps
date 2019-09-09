<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;

use App\Models\Student;
use App\Models\WinterSchool;
use App\Models\WinterSchoolForm;

use App\Mail\AcceptWinter;
use App\Mail\RejectWinter;

class WinterController extends Controller
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
                if($pagination == 'all') $exchanges = WinterSchoolForm::all();
                else $exchanges = WinterSchoolForm::paginate($pagination);
            }
            else
            {
                if($pagination == 'all') $exchanges = WinterSchoolForm::where('status', $status)->get();
                else $exchanges = WinterSchoolForm::where('status', $status)->paginate($pagination);
            }
        }
        else
        {
            if($status == 'all')
            {
                if($pagination == 'all') $exchanges = WinterSchoolForm::where('winter_school_id', $university_id)->get();
                else $exchanges = WinterSchoolForm::where('winter_school_id', $university_id)->paginate($pagination);
            }
            else
            {
                if($pagination == 'all') $exchanges = WinterSchoolForm::where('winter_school_id', $university_id)->where('status', $status)->get();
                else $exchanges = WinterSchoolForm::where('winter_school_id', $university_id)->where('status', $status)->paginate($pagination);
            }
        }

    	return view('staff.winter.index', compact('exchanges', 'type', 'color', 'data', 'pagination', 'university_id', 'status'));
    }

    public function important($exchange_id)
    {
        [$type, $color, $data] = alert();

        $exchange = WinterSchoolForm::find($exchange_id);

        return view('staff.winter.important', compact('exchange', 'type', 'color', 'data'));
    }

    public function detail($exchange_id)
    {
        [$type, $color, $data] = alert();

        $exchange = WinterSchoolForm::find($exchange_id);

        return view('staff.winter.detail', compact('exchange', 'type', 'color', 'data'));
    }

    public function accept($exchange_id)
    {
        $data['is_form_complete'] = 1;

        $exchange = WinterSchoolForm::find($exchange_id);
        $exchange->update($data);

        $student = Student::find($exchange->student_id);

        Mail::to($student->email)->send(new AcceptWinter($student));

        session(['alert' => 'edit', 'data' => 'Winter School Program']);

        return redirect('/staff/winter/' . $exchange_id . '/detail');
    }

    public function reject($exchange_id)
    {
        $data['is_form_complete'] = 2;

        $exchange = WinterSchoolForm::find($exchange_id);
        $exchange->update($data);

        $student = Student::find($exchange->student_id);

        Mail::to($student->email)->send(new RejectWinter($student));

        session(['alert' => 'edit', 'data' => 'Winter School Program']);

        return redirect('/staff/winter/' . $exchange_id . '/detail');
    }

    public function ticket($exchange_id)
    {
        $data['is_ticket_complete'] = 1;

        $exchange = WinterSchoolForm::find($exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Winter School']);

        return redirect('/staff/winter/' . $exchange_id . '/detail');
    }

    public function payment($exchange_id)
    {
        $data['is_payment_complete'] = 1;

        $exchange = WinterSchoolForm::find($exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Winter School']);

        return redirect('/staff/winter/' . $exchange_id . '/detail');
    }

    public function assign($exchange_id)
    {
        [$type, $color, $data] = alert();

        $exchange = WinterSchoolForm::find($exchange_id);

        return view('staff.winter.assign', compact('exchange', 'type', 'color', 'data'));
    }

    public function assignLecturer($exchange_id, Request $request)
    {
        $data['lecturer_id'] = $request->lecturer_id;

        $exchange = WinterSchoolForm::find($exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Winter School']);

        return redirect('/staff/winter/' . $exchange_id . '/detail');
    }

    public function upload($university_id)
    {
        [$type, $color, $data] = alert();

        $exchanges = [];
        if($university_id == 'all')
        {
            $universities = WinterSchool::where('status', 1)->whereDate('start', '<=', date('Y-m-d'))->whereDate('end', '>=', date('Y-m-d'))->get();
        }
        else
        {
            $universities = WinterSchool::where('id', $university_id)->get();
        }

        foreach ($universities as $university) 
        {
            $datas = WinterSchoolForm::where('winter_school_id', $university->id)->get();

            array_push($exchanges, $datas);
        }

        return view('staff.winter.upload', compact('exchanges', 'university_id', 'type', 'color', 'data'));
    }
}