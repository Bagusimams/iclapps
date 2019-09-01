<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Http\Requests\ComplaintRequest;

use App\Models\Complaint;

class ComplaintController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $complaints = Complaint::all();
        else $complaints = Complaint::paginate($pagination);

    	return view('staff.complaint.index', compact('complaints', 'type', 'color', 'data', 'pagination'));
    }

    public function getMajors($school_id)
    {
        $majors = getMajors($school_id);

        $result = '';
        foreach ($majors as $key => $value) {
            $result .= '<option value="' . $key . '">' . $value . '</option>';
        }

        return response()->json([
            "majors"  => $result,
        ], 200);
    }

    public function create()
    {
        [$type, $color, $data] = alert();

        return view('staff.complaint.create', compact('type', 'color', 'data'));
    }

    public function store(ComplaintRequest $request)
    {
        $data = $request->input();
        $data['role'] = 'Staff';
        $data['role_id'] = Auth::guard('staff')->user()->id;

        $complaint = Complaint::create($data);

        session(['alert' => 'add', 'data' => 'Complaint']);

        return redirect('/staff/complaint/' . $complaint->id . '/detail');
    }

    public function detail($complaint_id)
    {
        [$type, $color, $data] = alert();

        $complaint = Complaint::find($complaint_id);

        return view('staff.complaint.detail', compact('complaint', 'type', 'color', 'data'));
    }

    public function edit($complaint_id)
    {
        [$type, $color, $data] = alert();

        $complaint = Complaint::find($complaint_id);

        return view('staff.complaint.edit', compact('complaint', 'type', 'color', 'data'));
    }

    public function update($complaint_id, ComplaintRequest $request)
    {
        $data = $request->input();

        $complaint = Complaint::find($complaint_id);
        $complaint->update($data);

        session(['alert' => 'edit', 'data' => 'Complaint']);

        return redirect('/staff/complaint/' . $complaint->id);
    }

    public function changeStatus($complaint_id, $status)
    {
        $data['isDone'] = $status;

        $complaint = Complaint::find($complaint_id);
        $complaint->update($data);

        session(['alert' => 'edit', 'data' => 'Complaint']);

        return redirect('/staff/complaint/10');
    }

    public function delete($complaint_id)
    {
        $complaint = Inventory::find($complaint_id);
        $complaint->delete();

        session(['alert' => 'delete', 'data' => 'Complaint']);

        return redirect('/staff/complaint/10');
    }
}