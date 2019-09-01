<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RoomRequest extends FormRequest
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
            'name'                  => 'required',
            'isBooked'              => 'required',
        ];

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
