<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Http\Requests\RoomRequest;

use App\Models\Room;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $rooms = Room::all();
        else $rooms = Room::paginate($pagination);

    	return view('staff.room.index', compact('rooms', 'type', 'color', 'data', 'pagination'));
    }

    public function create()
    {
        [$type, $color, $data] = alert();

        return view('staff.room.create', compact('type', 'color', 'data'));
    }

    public function store(RoomRequest $request)
    {
        $data = $request->input();

        $room = Room::create($data);

        session(['alert' => 'add', 'data' => 'Room']);

        return redirect('/staff/room/' . $room->id . '/detail');
    }

    public function detail($room_id)
    {
        [$type, $color, $data] = alert();

        $room = Room::find($room_id);

        return view('staff.room.detail', compact('room', 'type', 'color', 'data'));
    }

    public function edit($room_id)
    {
        [$type, $color, $data] = alert();

        $room = Room::find($room_id);

        return view('staff.room.edit', compact('room', 'type', 'color', 'data'));
    }

    public function update($room_id, RoomRequest $request)
    {
        $data = $request->input();

        $room = Room::find($room_id);
        $room->update($data);

        session(['alert' => 'edit', 'data' => 'Room']);

        return redirect('/staff/room/' . $room->id . '/detail');
    }

    public function delete($room_id)
    {
        $room = Room::find($room_id);
        $room->delete();

        session(['alert' => 'delete', 'data' => 'Room']);

        return redirect('/staff/room/10');
    }
}