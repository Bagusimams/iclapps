<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\WinterSchool;

class WinterSchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $universities = WinterSchool::all();
        else $universities = WinterSchool::paginate($pagination);

    	return view('staff.winter-school.index', compact('universities', 'type', 'color', 'data', 'pagination'));
    }

    public function create()
    {
        [$type, $color, $data] = alert();

        return view('staff.winter-school.create', compact('type', 'color', 'data'));
    }

    public function store(Request $request)
    {
        $data = $request->input();

        $university = WinterSchool::create($data);

        session(['alert' => 'add', 'data' => 'Winter School']);

        return redirect('/staff/winter-school/' . $university->id . '/detail');
    }

    public function detail($university_id)
    {
        [$type, $color, $data] = alert();

        $university = WinterSchool::find($university_id);

        return view('staff.winter-school.detail', compact('university', 'type', 'color', 'data'));
    }

    public function edit($university_id, Request $request)
    {
        [$type, $color, $data] = alert();

        $university = WinterSchool::find($university_id);

        return view('staff.winter-school.edit', compact('university', 'type', 'color', 'data'));
    }

    public function update($university_id, Request $request)
    {
        $data = $request->input();

        $university = WinterSchool::find($university_id);
        $university->update($data);

        session(['alert' => 'edit', 'data' => 'Winter School']);

        return redirect('/staff/winter-school/' . $university->id . '/detail');
    }

    public function delete($university_id)
    {
        $university = WinterSchool::find($university_id);
        $university->delete();

        session(['alert' => 'delete', 'data' => 'Winter School']);

        return redirect('/staff/winter-school/10');
    }
}