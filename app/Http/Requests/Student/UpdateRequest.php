<?php

namespace App\Http\Requests\Student;

use App\Http\Requests\BaseRequest;
use App\Rules\GenderRule;
use Illuminate\Validation\Rule;

class UpdateRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name'=>'required',
            'email'=>['required', 'email', Rule::unique('students', 'email')->ignore($this->student->id)],
            'image'=>'nullable|image|mimes:jpg,jpeg,png',
            'gender'=> ['required', new GenderRule],
            'classroom_id'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'nama tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'classroom_id.required' => 'classroom tidak boleh kosong',
        ];
    }
}
