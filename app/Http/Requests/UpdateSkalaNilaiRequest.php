<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSkalaNilaiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama_skala' => 'required|string|max:255', 
            'nilai_min' => 'required|string|max:2',
            'nilai_max' => 'required|string|max:3',// Sesuaikan sesuai kebutuhan Anda
            // ...
        ];
    }
}
