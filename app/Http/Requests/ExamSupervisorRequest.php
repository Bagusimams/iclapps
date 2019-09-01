<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ExamSupervisorRequest extends FormRequest
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
            'nim'          => 'required',
            'name'         => 'required',
            // 'major_id'     => 'required',
            // 'faculty'      => 'required',
            'batch_year'   => 'required',
            'phone_number' => 'required',
            'email'        => 'required',
            'english_score' => 'required',
            'type'         => 'required',
        ];
        
        if ($request->method() == 'POST') 
        {
            $rules = array_add($rules, 'certificate_file', 'required');
        } 
        else 
        {
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
