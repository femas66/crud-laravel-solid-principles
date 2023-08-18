<?php

namespace App\Http\Requests\SchoolRequests;

use App\Http\Requests\BaseRequest;

class UpdateRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'image.required' => 'Gambar tidak boleh kosong',
            'image.mimes' => 'Gambar harus berekstensi jpg, jpeg, png',
        ];
    }
}
