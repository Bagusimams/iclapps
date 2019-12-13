<?php

namespace App\Http\Controllers\Lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\SummerSchool;
use App\Models\SummerSchoolForm;
use App\Models\SummerSchoolPre;

class SummerController extends Controller
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
                if($pagination == 'all') $exchanges = SummerSchoolForm::where('lecturer_id', Auth::guard('lecturer')->user()->id)->get();
                else $exchanges = SummerSchoolForm::where('lecturer_id', Auth::guard('lecturer')->user()->id)->paginate($pagination);
            }
            else
            {
                if($pagination == 'all') $exchanges = SummerSchoolForm::where('status', $status)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->get();
                else $exchanges = SummerSchoolForm::where('status', $status)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->paginate($pagination);
            }
        }
        else
        {
            if($status == 'all')
            {
                if($pagination == 'all') $exchanges = SummerSchoolForm::where('summer_school_id', $university_id)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->get();
                else $exchanges = SummerSchoolForm::where('summer_school_id', $university_id)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->paginate($pagination);
            }
            else
            {
                if($pagination == 'all') $exchanges = SummerSchoolForm::where('summer_school_id', $university_id)->where('status', $status)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->get();
                else $exchanges = SummerSchoolForm::where('summer_school_id', $university_id)->where('status', $status)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->paginate($pagination);
            }
        }

        if($university_id != 'all')
        {
            $pre = SummerSchoolPre::where('lecturer_id', Auth::guard('lecturer')->user()->id)->where('summer_school_id', $university_id)->first();

            if($pre == null)
            {
                $data_pre['lecturer_id'] = Auth::guard('lecturer')->user()->id;
                $data_pre['summer_school_id'] = $university_id;

                $pre = SummerSchoolPre::create($data_pre);
            }

            return view('lecturer.summer.index', compact('exchanges', 'type', 'color', 'data', 'pagination', 'university_id', 'status', 'pre'));
        }

    	return view('lecturer.summer.index', compact('exchanges', 'type', 'color', 'data', 'pagination', 'university_id', 'status'));
    }

    public function updatePre($pre_id, Request $request)
    {
        $data = $request->input();

        $pre = SummerSchoolPre::find($pre_id);
        $pre->update($data);

        session(['alert' => 'edit', 'data' => 'Summer School']);

        return redirect('/lecturer/summer/' . $pre->university_exchange_id . '/1/10');
    }

    public function update($university_exchange_id, Request $request)
    {
        $data = $request->input();

        $exchange = SummerSchoolForm::find($university_exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Summer School']);

        return redirect('/lecturer/summer/' . $exchange->university_exchange_id . '/1/10');
    }

    public function report($university_exchange_id, Request $request)
    {
        $data = $request->input();
        $data['lecturer_id'] = Auth::guard('lecturer')->user()->id;

        $exchange = SummerSchoolForm::find($university_exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Summer School']);

        return redirect('/lecturer/summer/' . $exchange->university_exchange_id . '/1/10');
    }
}