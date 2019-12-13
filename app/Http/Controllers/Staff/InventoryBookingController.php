<?php

namespace App\Http\Controllers\Staff;

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
        $this->middleware('staff');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $bookings = InventoryBooking::all();
        else $bookings = InventoryBooking::paginate($pagination);

    	return view('staff.inventory.booking.index', compact('bookings', 'type', 'color', 'data', 'pagination'));
    }

    public function create()
    {
        [$type, $color, $data] = alert();

        return view('staff.inventory.booking.create', compact('type', 'color', 'data'));
    }

    public function store(InventoryBookingRequest $request)
    {
        $data = $request->input();
        $data['role'] = 'Staff';
        $data['role_id'] = Auth::guard('staff')->user()->id;

        $booking = InventoryBooking::create($data);

        if($booking->isApproved != 2)
        {
            $data_inventory['isBooked'] = 1;
            $inventory = Inventory::find($booking->inventory_id);
            $inventory->update($data_inventory);
        }

        session(['alert' => 'add', 'data' => 'Inventory booking']);

        return redirect('/staff/inventory/booking/' . $booking->id . '/detail');
    }

    public function detail($booking_id)
    {
        [$type, $color, $data] = alert();

        $booking = InventoryBooking::find($booking_id);

        return view('staff.inventory.booking.detail', compact('booking', 'type', 'color', 'data'));
    }

    public function edit($booking_id)
    {
        [$type, $color, $data] = alert();

        $booking = InventoryBooking::find($booking_id);

        return view('staff.inventory.booking.edit', compact('booking', 'type', 'color', 'data'));
    }

    public function update($booking_id, InventoryBookingRequest $request)
    {
        $data = $request->input();
        $data['role'] = 'Staff';
        $data['role_id'] = Auth::guard('staff')->user()->id;

        $booking = InventoryBooking::find($booking_id);
        $booking->update($data);
        
        if($booking->isApproved == 2)
        {
            $data_inventory['isBooked'] = 0;
            $inventory = Inventory::find($booking->inventory_id);
            $inventory->update($data_inventory);
        }

        session(['alert' => 'edit', 'data' => 'Inventory booking']);

        return redirect('/staff/inventory/booking/' . $booking->id);
    }

    public function changeStatus($booking_id, $status)
    {
        $data['isApproved'] = $status;

        $booking = InventoryBooking::find($booking_id);
        $booking->update($data);

        session(['alert' => 'edit', 'data' => 'Inventory booking status']);

        return redirect('/staff/inventory/booking/10');
    }

    public function changeItemStatus($booking_id, $status)
    {
        $data['status'] = $status;

        $booking = InventoryBooking::find($booking_id);
        $booking->update($data);

        session(['alert' => 'edit', 'data' => 'Inventory booking status']);

        return redirect('/staff/inventory/booking/10');
    }

    public function delete($booking_id)
    {
        $booking = InventoryBooking::find($booking_id);

        $data_inventory['isBooked'] = 0;
        $inventory = Inventory::find($booking->inventory_id);
        $inventory->update($data_inventory);

        $booking->delete();

        session(['alert' => 'delete', 'data' => 'Inventory booking']);

        return redirect('/staff/inventory/booking/10');
    }
}