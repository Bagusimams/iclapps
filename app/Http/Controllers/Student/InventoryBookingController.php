<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Http\Requests\InventoryBookingRequest;

use App\Models\Inventory;
use App\Models\InventoryBooking;

class InventoryBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $bookings = InventoryBooking::where('role', 'Student')->where('role_id', Auth::guard('student')->user()->id)->get();
        else $bookings = InventoryBooking::where('role', 'Student')->where('role_id', Auth::guard('student')->user()->id)->paginate($pagination);

    	return view('student.inventory.booking.index', compact('bookings', 'type', 'color', 'data', 'pagination'));
    }

    public function create()
    {
        [$type, $color, $data] = alert();

        return view('student.inventory.booking.create', compact('type', 'color', 'data'));
    }

    public function store(InventoryBookingRequest $request)
    {
        $data = $request->input();
        $data['role'] = 'Student';
        $data['role_id'] = Auth::guard('student')->user()->id;

        $booking = InventoryBooking::create($data);

        session(['alert' => 'add', 'data' => 'Inventory booking']);

        return redirect('/student/inventory/booking/' . $booking->id . '/detail');
    }

    public function detail($booking_id)
    {
        [$type, $color, $data] = alert();

        $booking = InventoryBooking::find($booking_id);

        return view('student.inventory.booking.detail', compact('booking', 'type', 'color', 'data'));
    }

    public function edit($booking_id)
    {
        [$type, $color, $data] = alert();

        $booking = InventoryBooking::find($booking_id);

        return view('student.inventory.booking.edit', compact('booking', 'type', 'color', 'data'));
    }

    public function update($booking_id, InventoryBookingRequest $request)
    {
        $data = $request->input();
        $data['role'] = 'Student';
        $data['role_id'] = Auth::guard('student')->user()->id;

        $booking = InventoryBooking::find($booking_id);
        $booking->update($data);

        session(['alert' => 'edit', 'data' => 'Inventory booking']);

        return redirect('/student/inventory/booking/' . $booking->id);
    }

    public function delete($booking_id)
    {
        $booking = InventoryBooking::find($booking_id);
        $booking->delete();

        session(['alert' => 'delete', 'data' => 'Inventory booking']);

        return redirect('/student/inventory/booking/10');
    }
}