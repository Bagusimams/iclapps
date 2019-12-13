<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Http\Requests\RoomRequest;

use App\Models\Room;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $rooms = Room::all();
        else $rooms = Room::paginate($pagination);

    	return view('student.room.index', compact('rooms', 'type', 'color', 'data', 'pagination'));
    }

    public function detail($inventory_id)
    {
        [$type, $color, $data] = alert();

        $room = Room::find($inventory_id);

        return view('student.room.detail', compact('room', 'type', 'color', 'data'));
    }
}