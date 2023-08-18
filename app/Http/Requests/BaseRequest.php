<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    abstract public function rules(): array;

    protected function failedFalidation(Validator $validator): RedirectResponse
    {
        return redirect()->back()->withErrors($validator->errors()->messages());
    }

    protected function failedAuthorization(): void
    {
        abort(Response::HTTP_FORBIDDEN);
    }
}
