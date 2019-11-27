<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentFormRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name'      =>  'required|max:20',
            'username'  =>  'required|max:20|regex:/^(?=.*?[0-9])/',
            'email'  =>  'required|email|max:100',
            'telephone'  =>  'required|numeric|regex:/(0)[0-9]/',
            'dob' => ['required', 'date'],
            'password' => 'required|string|max:30|regex:/^(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/',
        ];
    }
}
