<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class DualDegreeRequest extends FormRequest
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
            // 'full_name'              => 'required', 
            'passport_number'        => 'required', 
            'passport_expiry_date'   => 'required', 
            'birth_date'             => 'required', 
            'gender'                 => 'required', 
            // 'phone_number'           => 'required', 
            'email'                  => 'required', 
            'address'                => 'required', 
            'whatsapp'               => 'required', 
            // 'id_number'              => 'required', 
            // 'school_id'              => 'required', 
            // 'major_id'               => 'required', 
            'class'                  => 'required', 
            'gpa'                    => 'required', 
            'toefl'                  => 'required', 
            'semester'               => 'required', 
            'batch'                  => 'required', 
            // 'university_exchange_id' => 'required', 
            'semester_applied'       => 'required', 
            'father_name'            => 'required', 
            'father_occupation'      => 'required', 
            'father_phone_number'    => 'required', 
            'father_email'           => 'required', 
            'father_postal_address'  => 'required', 
            'mother_name'            => 'required', 
            'mother_occupation'      => 'required', 
            'mother_phone_number'    => 'required', 
            'mother_email'           => 'required', 
            'mother_postal_address'  => 'required', 
            // 'file_passport'          => 'required', 
            // 'file_toefl'             => 'required', 
            // 'file_transcript'        => 'required', 
            // 'file_financial'         => 'required'
        ];
        
        if ($request->method() == 'POST') 
        {
            $rules = array_add($rules, 'file_passport', 'required');
            $rules = array_add($rules, 'file_toefl', 'required');
            $rules = array_add($rules, 'file_transcript', 'required');
            $rules = array_add($rules, 'file_financial', 'required');
            $rules = array_add($rules, 'university_joint_id', 'required');
        } 
        else 
        {
            // $id = JWTAuth::parseToken()->toUser()->id;

            // $rules = array_add($rules, 'email', 'required|unique:users,email,' . $id . ',id');
            // $rules = array_add($rules, 'phone_number', 'required|unique:users,phone_number,' . $id . ',id');
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
