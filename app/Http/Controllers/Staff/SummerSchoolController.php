<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\SummerSchool;

class SummerSchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $universities = SummerSchool::all();
        else $universities = SummerSchool::paginate($pagination);

    	return view('staff.summer-school.index', compact('universities', 'type', 'color', 'data', 'pagination'));
    }

    public function create()
    {
        [$type, $color, $data] = alert();

        return view('staff.summer-school.create', compact('type', 'color', 'data'));
    }

    public function store(Request $request)
    {
        $data = $request->input();

        $university = SummerSchool::create($data);

        session(['alert' => 'add', 'data' => 'Summer School']);

        return redirect('/staff/summer-school/' . $university->id . '/detail');
    }

    public function detail($university_id)
    {
        [$type, $color, $data] = alert();

        $university = SummerSchool::find($university_id);

        return view('staff.summer-school.detail', compact('university', 'type', 'color', 'data'));
    }

    public function edit($university_id, Request $request)
    {
        [$type, $color, $data] = alert();

        $university = SummerSchool::find($university_id);

        return view('staff.summer-school.edit', compact('university', 'type', 'color', 'data'));
    }

    public function update($university_id, Request $request)
    {
        $data = $request->input();

        $university = SummerSchool::find($university_id);
        $university->update($data);

        session(['alert' => 'edit', 'data' => 'Summer School']);

        return redirect('/staff/summer-school/' . $university->id . '/detail');
    }

    public function delete($university_id)
    {
        $university = SummerSchool::find($university_id);
        $university->delete();

        session(['alert' => 'delete', 'data' => 'Summer School']);

        return redirect('/staff/summer-school/10');
    }
}