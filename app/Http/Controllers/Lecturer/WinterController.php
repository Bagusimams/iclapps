<?php

namespace App\Http\Controllers\Lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\WinterSchool;
use App\Models\WinterSchoolForm;
use App\Models\WinterSchoolPre;

class WinterController extends Controller
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
                if($pagination == 'all') $exchanges = WinterSchoolForm::where('lecturer_id', Auth::guard('lecturer')->user()->id)->get();
                else $exchanges = WinterSchoolForm::where('lecturer_id', Auth::guard('lecturer')->user()->id)->paginate($pagination);
            }
            else
            {
                if($pagination == 'all') $exchanges = WinterSchoolForm::where('status', $status)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->get();
                else $exchanges = WinterSchoolForm::where('status', $status)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->paginate($pagination);
            }
        }
        else
        {
            if($status == 'all')
            {
                if($pagination == 'all') $exchanges = WinterSchoolForm::where('winter_school_id', $university_id)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->get();
                else $exchanges = WinterSchoolForm::where('winter_school_id', $university_id)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->paginate($pagination);
            }
            else
            {
                if($pagination == 'all') $exchanges = WinterSchoolForm::where('winter_school_id', $university_id)->where('status', $status)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->get();
                else $exchanges = WinterSchoolForm::where('winter_school_id', $university_id)->where('status', $status)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->paginate($pagination);
            }
        }

        if($university_id != 'all')
        {
            $pre = WinterSchoolPre::where('lecturer_id', Auth::guard('lecturer')->user()->id)->where('winter_school_id', $university_id)->first();

            if($pre == null)
            {
                $data_pre['lecturer_id'] = Auth::guard('lecturer')->user()->id;
                $data_pre['winter_school_id'] = $university_id;

                $pre = WinterSchoolPre::create($data_pre);
            }

            return view('lecturer.winter.index', compact('exchanges', 'type', 'color', 'data', 'pagination', 'university_id', 'status', 'pre'));
        }

    	return view('lecturer.winter.index', compact('exchanges', 'type', 'color', 'data', 'pagination', 'university_id', 'status'));
    }

    public function updatePre($pre_id, Request $request)
    {
        $data = $request->input();

        $pre = WinterSchoolPre::find($pre_id);
        $pre->update($data);

        session(['alert' => 'edit', 'data' => 'Winter School']);

        return redirect('/lecturer/winter/' . $pre->university_exchange_id . '/1/10');
    }

    public function update($university_exchange_id, Request $request)
    {
        $data = $request->input();

        $exchange = WinterSchoolForm::find($university_exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Winter School']);

        return redirect('/lecturer/winter/' . $exchange->university_exchange_id . '/1/10');
    }

    public function report($university_exchange_id, Request $request)
    {
        $data = $request->input();
        $data['lecturer_id'] = Auth::guard('lecturer')->user()->id;

        $exchange = WinterSchoolForm::find($university_exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Winter School']);

        return redirect('/lecturer/winter/' . $exchange->university_exchange_id . '/1/10');
    }
}