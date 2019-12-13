<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;

use App\Http\Requests\LectureScheduleRequest;

use App\Models\LectureSchedule;
use App\Models\Student;

use App\Mail\PerScheduleChange;
use App\Mail\TempScheduleChange;

class LectureScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $courses = LectureSchedule::where('status', 1)->get();
        else $courses = LectureSchedule::where('status', 1)->paginate($pagination);

    	return view('student.lecture-schedule.index', compact('courses', 'type', 'color', 'data', 'pagination'));
    }

    public function indexReq($mode, $pagination)
    {
        [$type, $color, $data] = alert();

        if($mode == 'all')
        {
            if($pagination == 'all') $courses = LectureSchedule::where('role', 'Student')->where('role_id', Auth::guard('student')->user()->id)->get();
            else $courses = LectureSchedule::where('role', 'Student')->where('role_id', Auth::guard('student')->user()->id)->paginate($pagination);
        }
        else
        {
            if($pagination == 'all') $courses = LectureSchedule::where('role', 'Student')->where('role_id', Auth::guard('student')->user()->id)->where('mode', $mode)->get();
            else $courses = LectureSchedule::where('role', 'Student')->where('role_id', Auth::guard('student')->user()->id)->where('mode', $mode)->paginate($pagination);
        }

        return view('student.lecture-schedule.index', compact('courses', 'type', 'color', 'data', 'pagination'));
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

            return view('student.lecture-schedule.create', compact('mode', 'type', 'color', 'data', 'old'));
        }

        return view('student.lecture-schedule.create', compact('mode', 'type', 'color', 'data'));
    }

    public function store($mode, $old_id, LectureScheduleRequest $request)
    {
        $data = $request->input();

        $data['status'] = 0;
        $data['mode']   = $mode;
        $data['role'] = 'Student';
        $data['role_id'] = Auth::guard('student')->user()->id;

        $course = LectureSchedule::create($data);

        $student = Student::find(Auth::guard('student')->user()->id);

        if($mode == 'per')
        {
            Mail::to($student->email)->send(new PerScheduleChange($student));
        }
        else
        {
            Mail::to($student->email)->send(new TempScheduleChange($student));
        }

        session(['alert' => 'add', 'data' => 'Course']);

        return redirect('/student/course/' . $course->id . '/detail');
    }

    public function detail($course_id)
    {
        [$type, $color, $data] = alert();

        $course = LectureSchedule::find($course_id);

        return view('student.lecture-schedule.detail', compact('course', 'type', 'color', 'data'));
    }

    public function edit($course_id)
    {
        [$type, $color, $data] = alert();

        $course = LectureSchedule::find($course_id);

        return view('student.lecture-schedule.edit', compact('course', 'type', 'color', 'data'));
    }

    public function update($course_id, LectureScheduleRequest $request)
    {
        $data = $request->input();

        $course = LectureSchedule::find($course_id);
        $course->update($data);

        session(['alert' => 'edit', 'data' => 'Course']);

        return redirect('/student/course/' . $course->id . '/detail');
    }

    public function delete($course_id)
    {
        $course = LectureSchedule::find($course_id);
        $course->delete();

        session(['alert' => 'delete', 'data' => 'Course']);

        return redirect('/student/course/10');
    }
}