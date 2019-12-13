<?php

namespace App\Http\Controllers\Lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\StudentExchangeForm;
use App\Models\StudentExchangePre;
use App\Models\UniversityExchange;

class StudentExchangeController extends Controller
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
                if($pagination == 'all') $exchanges = StudentExchangeForm::where('lecturer_id', Auth::guard('lecturer')->user()->id)->get();
                else $exchanges = StudentExchangeForm::where('lecturer_id', Auth::guard('lecturer')->user()->id)->paginate($pagination);
            }
            else
            {
                if($pagination == 'all') $exchanges = StudentExchangeForm::where('status', $status)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->get();
                else $exchanges = StudentExchangeForm::where('status', $status)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->paginate($pagination);
            }
        }
        else
        {
            if($status == 'all')
            {
                if($pagination == 'all') $exchanges = StudentExchangeForm::where('university_exchange_id', $university_id)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->get();
                else $exchanges = StudentExchangeForm::where('university_exchange_id', $university_id)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->paginate($pagination);
            }
            else
            {
                if($pagination == 'all') $exchanges = StudentExchangeForm::where('university_exchange_id', $university_id)->where('status', $status)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->get();
                else $exchanges = StudentExchangeForm::where('university_exchange_id', $university_id)->where('status', $status)->where('lecturer_id', Auth::guard('lecturer')->user()->id)->paginate($pagination);
            }
        }

        if($university_id != 'all')
        {
            $pre = StudentExchangePre::where('lecturer_id', Auth::guard('lecturer')->user()->id)->where('university_exchange_id', $university_id)->first();

            if($pre == null)
            {
                $data_pre['lecturer_id'] = Auth::guard('lecturer')->user()->id;
                $data_pre['university_exchange_id'] = $university_id;

                $pre = StudentExchangePre::create($data_pre);
            }

            return view('lecturer.student-exchange.index', compact('exchanges', 'type', 'color', 'data', 'pagination', 'university_id', 'status', 'pre'));
        }

    	return view('lecturer.student-exchange.index', compact('exchanges', 'type', 'color', 'data', 'pagination', 'university_id', 'status'));
    }

    public function updatePre($pre_id, Request $request)
    {
        $data = $request->input();

        $pre = StudentExchangePre::find($pre_id);
        $pre->update($data);

        session(['alert' => 'edit', 'data' => 'Student Exchange']);

        return redirect('/lecturer/student-exchange/' . $pre->university_exchange_id . '/1/10');
    }

    public function update($university_exchange_id, Request $request)
    {
        $data = $request->input();

        $exchange = StudentExchangeForm::find($university_exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Student Exchange']);

        return redirect('/lecturer/student-exchange/' . $exchange->university_exchange_id . '/1/10');
    }

    public function report($university_exchange_id, Request $request)
    {
        $data = $request->input();
        $data['lecturer_id'] = Auth::guard('lecturer')->user()->id;

        $exchange = StudentExchangeForm::find($university_exchange_id);
        $exchange->update($data);

        session(['alert' => 'edit', 'data' => 'Student Exchange']);

        return redirect('/lecturer/student-exchange/' . $exchange->university_exchange_id . '/1/10');
    }
}