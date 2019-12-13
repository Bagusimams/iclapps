<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RoomBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $rules = [
            // 'role'          => 'required',
            // 'role_id'       => 'required',
            'name'          => 'required',
            'email'          => 'required',
            'phone_number'  => 'required',
            'purpose'       => 'required',
            'date'          => 'required',
            'start_time'    => 'required',
            'end_time'      => 'required',
            // 'isApproved'    => 'required',
            // 'notes'         => 'required',
        ];
        
        if ($request->method() == 'post') 
        {
            $rules = array_add($rules, 'room_id', 'required');
        } 

        return $rules;
    }

    public function messages()
    {
        return [
            // 'showOnInvBookingMenu.required'  => 'Booking tidak boleh kosong',
            // 'name.required'  => 'Nama obat tidak boleh kosong',
            // 'name.required'  => 'Nama obat tidak boleh kosong',
            // 'name.required'  => 'Nama obat tidak boleh kosong',
        ];
    }
}
