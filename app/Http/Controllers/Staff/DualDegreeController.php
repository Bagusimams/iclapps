<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;

use App\Models\JointForm;
use App\Models\Student;
use App\Models\UniversityJoint;

use App\Mail\AcceptDualDegree;
use App\Mail\RejectDualDegree;

class DualDegreeController extends Controller
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
                if($pagination == 'all') $exchanges = JointForm::all();
                else $exchanges = JointForm::paginate($pagination);
            }
            else
            {
                if($pagination == 'all') $exchanges = JointForm::where('status', $status)->get();
                else $exchanges = JointForm::where('status', $status)->paginate($pagination);
            }
        }
        else
        {
            if($status == 'all')
            {
                if($pagination == 'all') $exchanges = JointForm::where('university_joint_id', $university_id)->get();
                else $exchanges = JointForm::where('university_joint_id', $university_id)->paginate($pagination);
            }
            else
            {
                if($pagination == 'all') $exchanges = JointForm::where('university_joint_id', $university_id)->where('status', $status)->get();
                else $exchanges = JointForm::where('university_joint_id', $university_id)->where('status', $status)->paginate($pagination);
            }
        }

        return view('staff.dual-degree.index', compact('exchanges', 'type', 'color', 'data', 'pagination', 'university_id', 'status'));
    }

    public function important($exchange_id)
    {
        [$type, $color, $data] = alert();

        $exchange = JointForm::find($exchange_id);

        return view('staff.dual-degree.important', compact('exchange', 'type', 'color', 'data'));
    }

    public function detail($exchange_id)
    {
        [$type, $color, $data] = alert();

        $exchange = JointForm::find($exchange_id);

        return view('staff.dual-degree.detail', compact('exchange', 'type', 'color', 'data'));
    }

    public function accept($exchange_id)
    {
        $data['is_form_complete'] = 1;

        $exchange = JointForm::find($exchange_id);
        $exchange->update($data);

        $student = Student::find($exchange->student_id);

        Mail::to($student->email)->send(new AcceptDualDegree($student));

        session(['alert' => 'edit', 'data' => 'Dual Degree']);

        return redirect('/staff/dual-degree/' . $exchange_id . '/detail');
    }

    public function reject($exchange_id)
    {
        $data['is_form_complete'] = 2;

        $exchange = JointForm::find($exchange_id);
        $exchange->update($data);

        $student = Student::find($exchange->student_id);

        Mail::to($student->email)->send(new RejectDualDegree($student));

        session(['alert' => 'edit', 'data' => 'Dual Degree']);

        return redirect('/staff/dual-degree/' . $exchange_id . '/detail');
    }

    public function ticket($exchange_id)
    {
        $data['is_ticket_complete'] = 1;

        $exchange = JointForm::find($exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Dual Degree']);

        return redirect('/staff/dual-degree/' . $exchange_id . '/detail');
    }

    public function payment($exchange_id)
    {
        $data['is_payment_complete'] = 1;

        $exchange = JointForm::find($exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Dual Degree']);

        return redirect('/staff/dual-degree/' . $exchange_id . '/detail');
    }

    public function assign($exchange_id)
    {
        [$type, $color, $data] = alert();

        $exchange = JointForm::find($exchange_id);

        return view('staff.dual-degree.assign', compact('exchange', 'type', 'color', 'data'));
    }

    public function assignLecturer($exchange_id, Request $request)
    {
        $data['lecturer_id'] = $request->lecturer_id;

        $exchange = JointForm::find($exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Dual Degree']);

        return redirect('/staff/dual-degree/' . $exchange_id . '/detail');
    }

    public function upload($university_id)
    {
        [$type, $color, $data] = alert();

        $exchanges = [];
        if($university_id == 'all')
        {
            $universities = UniversityJoint::where('status', 1)->whereDate('start', '<=', date('Y-m-d'))->whereDate('end', '>=', date('Y-m-d'))->get();
        }
        else
        {
            $universities = UniversityJoint::where('id', $university_id)->get();
        }

        foreach ($universities as $university) 
        {
            $datas = JointForm::where('university_joint_id', $university->id)->get();

            array_push($exchanges, $datas);
        }

        return view('staff.dual-degree.upload', compact('exchanges', 'university_id', 'type', 'color', 'data'));
    }
}