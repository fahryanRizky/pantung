<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdukRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_produk' => 'required',
            'jenis_produk' => 'required|in:Fisik,Digital',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }
    
    public function messages()
    {
        return [
            'nama_produk.required' => 'nama produk wajib di isi',
            'jenis_produk.required' => 'jenis produk wajib di isi',
            'jenis_produk.in' => 'jenis produk harus berupa Fisik atau Digital',
        ];
    }
}
