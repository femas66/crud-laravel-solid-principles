<?php

namespace App\Http\Requests\SchoolRequests;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ];
    }
    public function messages(): array
    {
        return [
            'image.required' => 'Gambar tidak boleh kosong',
            'image.image' => 'Gambar harus berupa gambar',
            'image.mimes' => 'Gambar harus berekstensi jpg, jpeg, png',
            'name.required' => 'Nama tidak boleh kosong',
        ];
    }
}
