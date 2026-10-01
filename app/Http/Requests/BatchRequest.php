<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Override;

class BatchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'jumlah'=> 'required|integer|min:1',
            'harga_modal'=> 'required|numeric|min:0',
        ];
    }

    #[Override]
    public function messages()
    {
        return[
            'jumlah.required' => 'jumlah wajib di isi',
            'jumlah.min' => 'jumlah barang minimal 1',
            'harga_modal.required' => 'harga modal wajib di isi',
            'jumlah.numeric' => 'harga modal harus berupa angka',
        ];
    }
}
