<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Http\Requests\InventoryRequest;

use App\Models\Inventory;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $inventories = Inventory::all();
        else $inventories = Inventory::paginate($pagination);

    	return view('student.inventory.index', compact('inventories', 'type', 'color', 'data', 'pagination'));
    }

    public function detail($inventory_id)
    {
        [$type, $color, $data] = alert();

        $inventory = Inventory::find($inventory_id);

        return view('student.inventory.detail', compact('inventory', 'type', 'color', 'data'));
    }
}