<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\UniversityJoint;

class UniversityJointController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $universities = UniversityJoint::all();
        else $universities = UniversityJoint::paginate($pagination);

    	return view('staff.university-joint.index', compact('universities', 'type', 'color', 'data', 'pagination'));
    }

    public function create()
    {
        [$type, $color, $data] = alert();

        return view('staff.university-joint.create', compact('type', 'color', 'data'));
    }

    public function store(Request $request)
    {
        $data = $request->input();

        $university = UniversityJoint::create($data);

        session(['alert' => 'add', 'data' => 'University Joint']);

        return redirect('/staff/university-joint/' . $university->id . '/detail');
    }

    public function detail($university_id)
    {
        [$type, $color, $data] = alert();

        $university = UniversityJoint::find($university_id);

        return view('staff.university-joint.detail', compact('university', 'type', 'color', 'data'));
    }

    public function edit($university_id, Request $request)
    {
        [$type, $color, $data] = alert();

        $university = UniversityJoint::find($university_id);

        return view('staff.university-joint.edit', compact('university', 'type', 'color', 'data'));
    }

    public function update($university_id, Request $request)
    {
        $data = $request->input();

        $university = UniversityJoint::find($university_id);
        $university->update($data);

        session(['alert' => 'edit', 'data' => 'University Joint']);

        return redirect('/staff/university-joint/' . $university->id . '/detail');
    }

    public function delete($university_id)
    {
        $university = UniversityJoint::find($university_id);
        $university->delete();

        session(['alert' => 'delete', 'data' => 'University Joint']);

        return redirect('/staff/university-joint/10');
    }
}