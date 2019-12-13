<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;

use App\Http\Requests\LectureScheduleRequest;

use App\Models\LectureSchedule;
use App\Models\Student;

use App\Mail\SuccessPerScheduleChange;
use App\Mail\SuccessTempScheduleChange;

class LectureScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $courses = LectureSchedule::where('status', 1)->get();
        else $courses = LectureSchedule::where('status', 1)->paginate($pagination);

    	return view('staff.lecture-schedule.index', compact('courses', 'type', 'color', 'data', 'pagination'));
    }

    public function indexReq($mode, $pagination)
    {
        [$type, $color, $data] = alert();

        if($mode == 'all')
        {
            if($pagination == 'all') $courses = LectureSchedule::where('role', 'student')->get();
            else $courses = LectureSchedule::where('role', 'student')->paginate($pagination);
        }
        else
        {
            if($pagination == 'all') $courses = LectureSchedule::where('role', 'student')->where('mode', $mode)->get();
            else $courses = LectureSchedule::where('role', 'student')->where('mode', $mode)->paginate($pagination);
        }

        return view('staff.lecture-schedule.index', compact('courses', 'type', 'color', 'data', 'pagination'));
    }

    public function getAvailableRoom($start_time, $end_time, $day)
    {
        $rooms = getRoomsAvailableByDay($day, $start_time, $end_time);
        
        $result = '';
        foreach ($rooms as $key => $value) {
            $result .= '<option value="' . $key . '">' . $value . '</option>';
        }

        return response()->json([
            "rooms"  => $result,
        ], 200);
    }

    public function getAvailableRoomByDate($start_time, $end_time, $date)
    {
        $day = date('l', strtotime($date));
        $rooms = getRoomsAvailableByDay($day, $start_time, $end_time);
        
        $result = '';
        foreach ($rooms as $key => $value) {
            $result .= '<option value="' . $key . '">' . $value . '</option>';
        }

        return response()->json([
            "rooms"  => $result,
        ], 200);
    }

    public function create($mode, $old_id)
    {
        [$type, $color, $data] = alert();

        if($old_id != null)
        {
            $old = LectureSchedule::find($old_id);

            return view('staff.lecture-schedule.create', compact('mode', 'type', 'color', 'data', 'old'));
        }

        return view('staff.lecture-schedule.create', compact('mode', 'type', 'color', 'data'));
    }

    public function store($mode, $old_id, LectureScheduleRequest $request)
    {
        $data = $request->input();
        $data['status'] = 1;
        $data['mode']   = $mode;

        $course = LectureSchedule::create($data);

        session(['alert' => 'add', 'data' => 'Course']);

        return redirect('/staff/course/' . $course->id . '/detail');
    }

    public function detail($course_id)
    {
        [$type, $color, $data] = alert();

        $course = LectureSchedule::find($course_id);

        return view('staff.lecture-schedule.detail', compact('course', 'type', 'color', 'data'));
    }

    public function edit($course_id)
    {
        [$type, $color, $data] = alert();

        $course = LectureSchedule::find($course_id);

        return view('staff.lecture-schedule.edit', compact('course', 'type', 'color', 'data'));
    }

    public function update($course_id, LectureScheduleRequest $request)
    {
        $data = $request->input();

        $course = LectureSchedule::find($course_id);
        $course->update($data);

        session(['alert' => 'edit', 'data' => 'Course']);

        return redirect('/staff/course/' . $course->id . '/detail');
    }

    public function changeStatus($course_id, $status)
    {
        $data['status'] = $status;

        $course = LectureSchedule::find($course_id);
        $course->update($data);

        if($course->role != null)
        {
            if($course->role == 'Student')
            {
                $student = Student::find($course->role_id);

                if($course->mode == 'per')
                {
                    Mail::to($student->email)->send(new SuccessPerScheduleChange($student));
                }
                else
                {
                    Mail::to($student->email)->send(new SuccessTempScheduleChange($student));
                }
            }
        }

        session(['alert' => 'edit', 'data' => 'Course']);

        return redirect('/staff/course/' . $course->id . '/detail');
    }

    public function delete($course_id)
    {
        $course = LectureSchedule::find($course_id);
        $course->delete();

        session(['alert' => 'delete', 'data' => 'Course']);

        return redirect('/staff/course/10');
    }
}