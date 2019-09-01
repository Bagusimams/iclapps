<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Http\Requests\InventoryRequest;

use App\Models\Inventory;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $inventories = Inventory::all();
        else $inventories = Inventory::paginate($pagination);

    	return view('staff.inventory.index', compact('inventories', 'type', 'color', 'data', 'pagination'));
    }

    public function create()
    {
        [$type, $color, $data] = alert();

        return view('staff.inventory.create', compact('type', 'color', 'data'));
    }

    public function store(InventoryRequest $request)
    {
        $data = $request->input();

        $inventory = Inventory::create($data);

        session(['alert' => 'add', 'data' => 'Inventory']);

        return redirect('/staff/inventory/' . $inventory->id . '/detail');
    }

    public function detail($inventory_id)
    {
        [$type, $color, $data] = alert();

        $inventory = Inventory::find($inventory_id);

        return view('staff.inventory.detail', compact('inventory', 'type', 'color', 'data'));
    }

    public function edit($inventory_id)
    {
        [$type, $color, $data] = alert();

        $inventory = Inventory::find($inventory_id);

        return view('staff.inventory.edit', compact('inventory', 'type', 'color', 'data'));
    }

    public function update($inventory_id, InventoryRequest $request)
    {
        $data = $request->input();

        $inventory = Inventory::find($inventory_id);
        $inventory->update($data);

        session(['alert' => 'edit', 'data' => 'Inventory']);

        return redirect('/staff/inventory/' . $inventory->id . '/detail');
    }

    public function delete($inventory_id)
    {
        $inventory = Inventory::find($inventory_id);
        $inventory->delete();

        session(['alert' => 'delete', 'data' => 'Inventory']);

        return redirect('/staff/inventory/10');
    }
}