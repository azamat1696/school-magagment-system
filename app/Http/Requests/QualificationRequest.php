<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QualificationRequest extends FormRequest
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
            'student_id' => 'required',
            'student_no' => 'required',
            'qualification_start_date'  => 'sometimes',
            'departmnent_id'  => 'required',
            'ic_denetim_tarih'  => 'sometimes',
            'ic_denetim_user_id'  => 'sometimes',
            'depart_imza_end_date'  => 'sometimes',
            'diplom_req_date'  => 'sometimes',
            'diplom_confirm_date'  => 'sometimes',
            'diplom_no'  => 'sometimes',
            'islem_sira_no'  => 'required',
            'student_status'  => 'required',
            'ogr_hakk'  => 'required',
            'not_sistemi'  => 'sometimes',
            'ayrilma_tarihi'  => 'sometimes',
            'ayrilma_nedeni'  => 'sometimes',
            'register_date'  => 'required',
            'hazirlik_okudum'  => 'sometimes',
            'hazirlik_donem_sayi'  => 'sometimes',
            'giris_turu'  => 'sometimes',
            'giris_puan_turu'  => 'sometimes',
            'giris_puan'  => 'sometimes',
            'genel_not_ortalama'  => 'sometimes',
            'notes'  => 'sometimes',
            'status'  => 'required',
            'diploma_tur'  => 'sometimes',
            'diploma_not'  => 'sometimes',
        ];
    }
}
