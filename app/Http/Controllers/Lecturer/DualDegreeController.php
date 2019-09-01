<?php

namespace App\Http\Controllers\Lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\JointForm;
use App\Models\JointPre;
use App\Models\UniversityJoint;

class DualDegreeController extends Controller
{
    public function __construct()
    {
        $this->middleware('lecturer');
    }

    public function index($university_id, $status, $pagination)
    {
        [$type, $color, $data] = alert();

        if($university_id == 'all')
        {
            if($status == 'all')
            {
                if($pagination == 'all') $exchanges = JointForm::where('lecturer_id', Auth::guard('lecturer')->user()->id)->get();
                else $exchanges = JointForm::where('lecturer_id', Auth::guard('lecturer')->user()->id)->paginate($pagination);
            }
            else
            {
                if($pagination == 'all') $exchanges = JointForm::where('status', $status)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->get();
                else $exchanges = JointForm::where('status', $status)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->paginate($pagination);
            }
        }
        else
        {
            if($status == 'all')
            {
                if($pagination == 'all') $exchanges = JointForm::where('university_joint_id', $university_id)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->get();
                else $exchanges = JointForm::where('university_joint_id', $university_id)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->paginate($pagination);
            }
            else
            {
                if($pagination == 'all') $exchanges = JointForm::where('university_joint_id', $university_id)->where('status', $status)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->get();
                else $exchanges = JointForm::where('university_joint_id', $university_id)->where('status', $status)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->paginate($pagination);
            }
        }

        if($university_id != 'all')
        {
            $pre = JointPre::where('lecturer_id', Auth::guard('lecturer')->user()->id)->where('university_joint_id', $university_id)->first();

            if($pre == null)
            {
                $data_pre['lecturer_id'] = Auth::guard('lecturer')->user()->id;
                $data_pre['university_joint_id'] = $university_id;

                $pre = JointPre::create($data_pre);
            }

            return view('lecturer.dual-degree.index', compact('exchanges', 'type', 'color', 'data', 'pagination', 'university_id', 'status', 'pre'));
        }

    	return view('lecturer.dual-degree.index', compact('exchanges', 'type', 'color', 'data', 'pagination', 'university_id', 'status'));
    }

    public function updatePre($pre_id, Request $request)
    {
        $data = $request->input();

        $pre = JointPre::find($pre_id);
        $pre->update($data);

        session(['alert' => 'edit', 'data' => 'Dual Degree']);

        return redirect('/lecturer/dual-degree/' . $pre->university_exchange_id . '/1/10');
    }

    public function update($university_exchange_id, Request $request)
    {
        $data = $request->input();

        $exchange = JointForm::find($university_exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Dual Degree']);

        return redirect('/lecturer/dual-degree/' . $exchange->university_exchange_id . '/1/10');
    }
}