<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'name' => 'required',
            'surname' => 'required',
            'other_names' => 'sometimes',
            'identity_no' => 'required',
            'passport_no' => 'required',
            'gender' => 'required',
            'country_id' => 'required',
            'blood_group' => 'required',
            'birth_date' => 'required',
            'place_of_birth' => 'required',
            'mother_name' => 'required',
            'father_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'phone_no_1' => 'sometimes',
            'phone_no_2' => 'sometimes',
            'address' => 'required',
            'notes' => 'sometimes',
            'student_photo' => 'sometimes',
            'status' => 'required',
        ];
    }
}
