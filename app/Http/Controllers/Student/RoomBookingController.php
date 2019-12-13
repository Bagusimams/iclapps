<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Http\Requests\RoomBookingRequest;

use App\Models\Room;
use App\Models\RoomBooking;
use App\Models\Student;

use App\Mail\RoomBookingEmail;

class RoomBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $bookings = RoomBooking::where('role', 'Student')->where('role_id', Auth::guard('student')->user()->id)->get();
        else $bookings = RoomBooking::where('role', 'Student')->where('role_id', Auth::guard('student')->user()->id)->paginate($pagination);

    	return view('student.room.booking.index', compact('bookings', 'type', 'color', 'data', 'pagination'));
    }

    public function create()
    {
        [$type, $color, $data] = alert();

        return view('student.room.booking.create', compact('type', 'color', 'data'));
    }

    public function store(RoomBookingRequest $request)
    {
        $data = $request->input();
        $data['role'] = 'Student';
        $data['role_id'] = Auth::guard('student')->user()->id;

        $booking = RoomBooking::create($data);

        if($booking->isApproved != 2)
        {
            $data_room['isBooked'] = 1;
            $room = Room::find($booking->room_id);
            $room->update($data_room);
        }

        $student = Student::find(Auth::guard('student')->user()->id);

        Mail::to($student->email)->send(new RoomBookingEmail($student));

        session(['alert' => 'add', 'data' => 'Room booking']);

        return redirect('/student/room/booking/' . $booking->id . '/detail');
    }

    public function detail($booking_id)
    {
        [$type, $color, $data] = alert();

        $booking = RoomBooking::find($booking_id);

        return view('student.room.booking.detail', compact('booking', 'type', 'color', 'data'));
    }

    public function edit($booking_id)
    {
        [$type, $color, $data] = alert();

        $booking = RoomBooking::find($booking_id);

        return view('student.room.booking.edit', compact('booking', 'type', 'color', 'data'));
    }

    public function update($booking_id, RoomBookingRequest $request)
    {
        $data = $request->input();
        $data['role'] = 'Student';
        $data['role_id'] = Auth::guard('student')->user()->id;

        $booking = RoomBooking::find($booking_id);
        $booking->update($data);
        
        if($booking->isApproved == 2)
        {
            $data_room['isBooked'] = 0;
            $room = Inventory::find($booking->room_id);
            $room->update($data_room);
        }

        session(['alert' => 'edit', 'data' => 'Room booking']);

        return redirect('/student/room/booking/' . $booking->id);
    }

    public function delete($booking_id)
    {
        $booking = RoomBooking::find($booking_id);

        $data_room['isBooked'] = 0;
        $room = Room::find($booking->room_id);
        $room->update($data_room);
        
        $booking->delete();

        session(['alert' => 'delete', 'data' => 'Room booking']);

        return redirect('/student/room/booking/10');
    }
}