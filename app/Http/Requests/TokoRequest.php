<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class TokoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_toko' => 'required',
            'alamat' => 'required',
            'user_id' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'nama_toko.required' => 'nama toko wajib di isi',
            'alamat.required' => 'alamat toko wajib di isi',
            'status.required' => 'tentukan status toko mu',
        ];
    }
}
