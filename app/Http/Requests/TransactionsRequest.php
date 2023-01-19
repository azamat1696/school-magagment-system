<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionsRequest extends FormRequest
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
            'transaction_no'=> 'required',
            'qualification_id'=> 'sometimes',
            'description' => 'sometimes',
            'student_id' => 'required',
            'department_id' => 'required',
            'semester_id' => 'required',
            'currency_type' => 'required',
            'islem_tarih' => 'sometimes',
            'vade_tarih' => 'sometimes',
            'amount_payed' => 'required',
            'transaction_type' => 'required',
            'status' => 'required',
        ];
    }
}
