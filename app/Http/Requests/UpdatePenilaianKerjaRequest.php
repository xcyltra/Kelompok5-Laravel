<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePenilaianKerjaRequest extends FormRequest
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
            'pegawai_id' => 'required|exists:pegawais,id',
            'tgl_review' => 'required|date',
            'evaluator' => 'required|exists:users,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'nilai_id' => 'required|exists:skala_nilais,id',
            'komentar' => 'required|max:255'
        ];
    }
}
