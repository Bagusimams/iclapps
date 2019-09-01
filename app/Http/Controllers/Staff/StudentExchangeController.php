<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;

use App\Models\Student;
use App\Models\StudentExchangeForm;
use App\Models\UniversityExchange;

use App\Mail\AcceptStudentExchange;
use App\Mail\RejectStudentExchange;

class StudentExchangeController extends Controller
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
                if($pagination == 'all') $exchanges = StudentExchangeForm::all();
                else $exchanges = StudentExchangeForm::paginate($pagination);
            }
            else
            {
                if($pagination == 'all') $exchanges = StudentExchangeForm::where('status', $status)->get();
                else $exchanges = StudentExchangeForm::where('status', $status)->paginate($pagination);
            }
        }
        else
        {
            if($status == 'all')
            {
                if($pagination == 'all') $exchanges = StudentExchangeForm::where('university_exchange_id', $university_id)->get();
                else $exchanges = StudentExchangeForm::where('university_exchange_id', $university_id)->paginate($pagination);
            }
            else
            {
                if($pagination == 'all') $exchanges = StudentExchangeForm::where('university_exchange_id', $university_id)->where('status', $status)->get();
                else $exchanges = StudentExchangeForm::where('university_exchange_id', $university_id)->where('status', $status)->paginate($pagination);
            }
        }

    	return view('staff.student-exchange.index', compact('exchanges', 'type', 'color', 'data', 'pagination', 'university_id', 'status'));
    }

    public function important($exchange_id)
    {
        [$type, $color, $data] = alert();

        $exchange = StudentExchangeForm::find($exchange_id);

        return view('staff.student-exchange.important', compact('exchange', 'type', 'color', 'data'));
    }

    public function detail($exchange_id)
    {
        [$type, $color, $data] = alert();

        $exchange = StudentExchangeForm::find($exchange_id);

        return view('staff.student-exchange.detail', compact('exchange', 'type', 'color', 'data'));
    }

    public function accept($exchange_id)
    {
        $data['is_form_complete'] = 1;

        $exchange = StudentExchangeForm::find($exchange_id);
        $exchange->update($data);

        $student = Student::find($exchange->student_id);

        Mail::to($student->email)->send(new AcceptStudentExchange($student));

        session(['alert' => 'edit', 'data' => 'Student Exchange']);

        return redirect('/staff/student-exchange/' . $exchange_id . '/detail');
    }

    public function reject($exchange_id)
    {
        $data['is_form_complete'] = 2;

        $exchange = StudentExchangeForm::find($exchange_id);
        $exchange->update($data);

        $student = Student::find($exchange->student_id);

        Mail::to($student->email)->send(new RejectStudentExchange($student));

        session(['alert' => 'edit', 'data' => 'Student Exchange']);

        return redirect('/staff/student-exchange/' . $exchange_id . '/detail');
    }

    public function ticket($exchange_id)
    {
        $data['is_ticket_complete'] = 1;

        $exchange = StudentExchangeForm::find($exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Student Exchange']);

        return redirect('/staff/student-exchange/' . $exchange_id . '/detail');
    }

    public function payment($exchange_id)
    {
        $data['is_payment_complete'] = 1;

        $exchange = StudentExchangeForm::find($exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Student Exchange']);

        return redirect('/staff/student-exchange/' . $exchange_id . '/detail');
    }

    public function assign($exchange_id)
    {
        [$type, $color, $data] = alert();

        $exchange = StudentExchangeForm::find($exchange_id);

        return view('staff.student-exchange.assign', compact('exchange', 'type', 'color', 'data'));
    }

    public function assignLecturer($exchange_id, Request $request)
    {
        $data['lecturer_id'] = $request->lecturer_id;

        $exchange = StudentExchangeForm::find($exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Student Exchange']);

        return redirect('/staff/student-exchange/' . $exchange_id . '/detail');
    }

    public function upload($university_id)
    {
        [$type, $color, $data] = alert();

        $exchanges = [];
        if($university_id == 'all')
        {
            $universities = UniversityExchange::where('status', 1)->whereDate('start', '<=', date('Y-m-d'))->whereDate('end', '>=', date('Y-m-d'))->get();
        }
        else
        {
            $universities = UniversityExchange::where('id', $university_id)->get();
        }

        foreach ($universities as $university) 
        {
            $datas = StudentExchangeForm::where('university_exchange_id', $university->id)->get();

            array_push($exchanges, $datas);
        }

        return view('staff.student-exchange.upload', compact('exchanges', 'university_id', 'type', 'color', 'data'));
    }
}