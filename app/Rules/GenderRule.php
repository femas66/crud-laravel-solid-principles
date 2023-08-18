<?php

namespace App\Rules;

use App\Enums\GenderEnum;
use Closure;
use Illuminate\Contracts\Validation\Rule;

class GenderRule implements Rule
{
    public function passes($attribute, $value): bool
    {
        return in_array(strtolower($value), [GenderEnum::MALE->value, GenderEnum::FEMALE->value]);
    }

    public function message(): string
    {
        return "Gender tidak valid";
    }
}
