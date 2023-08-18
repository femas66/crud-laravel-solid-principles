<?php

namespace App\Http\Requests\ClassroomRequests;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'school_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'school_id.required' => 'Id sekolah tidak boleh kosong',
        ];
    }
}
