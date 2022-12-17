<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequset extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['sometimes'],
            'KullaniciKodu' => ['required', 'string'],
            'TelefonNo' => ['sometimes', 'string'],
            'Adres' => ['sometimes', 'string'],
            'KullaniciTipi' => ['required', 'string'],
            'Cinsiyet' => ['required'],
            'DogumTarihi' => ['required'],
            'ProfilResim' => ['sometimes','image','mimes:jpeg,png,jpg'],
        ];
    }
}
