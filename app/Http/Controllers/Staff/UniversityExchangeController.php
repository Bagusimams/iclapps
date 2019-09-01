<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\UniversityExchange;

class UniversityExchangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
    }

    public function index($pagination)
    {
        [$type, $color, $data] = alert();

        if($pagination == 'all') $universities = UniversityExchange::all();
        else $universities = UniversityExchange::paginate($pagination);

    	return view('staff.university-exchange.index', compact('universities', 'type', 'color', 'data', 'pagination'));
    }

    public function create()
    {
        [$type, $color, $data] = alert();

        return view('staff.university-exchange.create', compact('type', 'color', 'data'));
    }

    public function store(Request $request)
    {
        $data = $request->input();

        $university = UniversityExchange::create($data);

        session(['alert' => 'add', 'data' => 'University Exchange']);

        return redirect('/staff/university-exchange/' . $university->id . '/detail');
    }

    public function detail($university_id)
    {
        [$type, $color, $data] = alert();

        $university = UniversityExchange::find($university_id);

        return view('staff.university-exchange.detail', compact('university', 'type', 'color', 'data'));
    }

    public function edit($university_id, Request $request)
    {
        [$type, $color, $data] = alert();

        $university = UniversityExchange::find($university_id);

        return view('staff.university-exchange.edit', compact('university', 'type', 'color', 'data'));
    }

    public function update($university_id, Request $request)
    {
        $data = $request->input();

        $university = UniversityExchange::find($university_id);
        $university->update($data);

        session(['alert' => 'edit', 'data' => 'University Exchange']);

        return redirect('/staff/university-exchange/' . $university->id . '/detail');
    }

    public function delete($university_id)
    {
        $university = UniversityExchange::find($university_id);
        $university->delete();

        session(['alert' => 'delete', 'data' => 'University Exchange']);

        return redirect('/staff/university-exchange/10');
    }
}