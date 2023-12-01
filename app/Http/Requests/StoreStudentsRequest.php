<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
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
            // 'first' => 'required',
            // 'Middle' => 'required',
            // 'Last' => 'required',
            'email' => 'required|email|unique:students,email,'.$this->id,
            // 'Contact_No' => 'required',
            'gender_id' => 'required',
            'Date_Birth' => 'required|date|date_format:Y-m-d',
            // 'Course_id' => 'required',
            'academic_year' => 'required',
        ];
    }
}
