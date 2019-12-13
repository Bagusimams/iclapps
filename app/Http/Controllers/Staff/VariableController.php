<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\Variable;

class VariableController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $variables = Variable::all();
        else $variables = Variable::paginate($pagination);

    	return view('staff.variable.index', compact('variables', 'type', 'color', 'data', 'pagination'));
    }

    public function detail($variable_id)
    {
        [$type, $color, $data] = alert();

        $variable = Variable::find($variable_id);

        return view('staff.variable.detail', compact('variable', 'type', 'color', 'data'));
    }

    public function edit($variable_id)
    {
        [$type, $color, $data] = alert();

        $variable = Variable::find($variable_id);

        return view('staff.variable.edit', compact('variable', 'type', 'color', 'data'));
    }

    public function update($variable_id, Request $request)
    {
        $data = $request->input();

        $variable = Variable::find($variable_id);
        $variable->update($data);

        session(['alert' => 'edit', 'data' => 'Variable']);

        return redirect('/staff/variable/' . $variable->id);
    }
}