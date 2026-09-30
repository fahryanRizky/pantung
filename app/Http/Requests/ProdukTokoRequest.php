<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukTokoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
   public function rules(): array
    {
        return [
            'harga_jual' => 'required|numeric|min:0',
            'harga_modal_digital' => 'nullable|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'harga_jual.required' => 'harga jual wajib di isi',
            'harga_jual.numeric' => 'harga jual harus berupa angka',
            'harga_jual.min' => 'harga jual minimal 0',
            'harga_modal_digital.numeric' => 'harga modal harus berupa angka',
        ];
    }
}
