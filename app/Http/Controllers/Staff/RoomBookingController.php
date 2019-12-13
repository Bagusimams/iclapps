<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Http\Requests\RoomBookingRequest;

use App\Models\Room;
use App\Models\RoomBooking;

class RoomBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $bookings = RoomBooking::all();
        else $bookings = RoomBooking::paginate($pagination);

    	return view('staff.room.booking.index', compact('bookings', 'type', 'color', 'data', 'pagination'));
    }

    public function create()
    {
        [$type, $color, $data] = alert();

        return view('staff.room.booking.create', compact('type', 'color', 'data'));
    }

    public function store(RoomBookingRequest $request)
    {
        $data = $request->input();
        $data['role'] = 'Staff';
        $data['role_id'] = Auth::guard('staff')->user()->id;

        $booking = RoomBooking::create($data);

        if($booking->isApproved != 2)
        {
            $data_room['isBooked'] = 1;
            $room = Room::find($booking->room_id);
            $room->update($data_room);
        }

        session(['alert' => 'add', 'data' => 'Room booking']);

        return redirect('/staff/room/booking/' . $booking->id . '/detail');
    }

    public function detail($booking_id)
    {
        [$type, $color, $data] = alert();

        $booking = RoomBooking::find($booking_id);

        return view('staff.room.booking.detail', compact('booking', 'type', 'color', 'data'));
    }

    public function edit($booking_id)
    {
        [$type, $color, $data] = alert();

        $booking = RoomBooking::find($booking_id);

        return view('staff.room.booking.edit', compact('booking', 'type', 'color', 'data'));
    }

    public function update($booking_id, RoomBookingRequest $request)
    {
        $data = $request->input();
        // $data['role'] = 'Staff';
        // $data['role_id'] = Auth::guard('staff')->user()->id;

        $booking = RoomBooking::find($booking_id);
        $booking->update($data);
        
        if($booking->isApproved == 2)
        {
            $data_room['isBooked'] = 0;
            $room = Room::find($booking->room_id);
            $room->update($data_room);
        }

        session(['alert' => 'edit', 'data' => 'Room booking']);

        return redirect('/staff/room/booking/' . $booking->id);
    }

    public function delete($booking_id)
    {
        $booking = RoomBooking::find($booking_id);

        $data_room['isBooked'] = 0;
        $room = Room::find($booking->room_id);
        $room->update($data_room);

        $booking->delete();

        session(['alert' => 'delete', 'data' => 'Room booking']);

        return redirect('/staff/room/booking/10');
    }
}