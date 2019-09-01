<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class InternshipRequest extends FormRequest
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
            'name'             => 'required|string',
            'password'         => 'required|confirmed',
            // 'role'             => 'required',
        ];
        
        if ($request->method() == 'post') 
        {
            $rules = array_add($rules, 'email', 'required|unique:internships');
        } 
        else 
        {
            $id = $request->input('id');

            $rules = array_add($rules, 'email', 'required|unique:internships,email,' . $id . ',id');
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'      => 'name tidak boleh kosong',
            'name.string'        => 'name harus berupa kalimat',
            'password.required'  => 'password tidak boleh kosong',
            'password.confirmed' => 'password dan confirm password tidak sesuai',
            'email.required'     => 'Username tidak boleh kosong',
            'email.unique'       => 'Username sudah digunakan',
        ];
    }
}
