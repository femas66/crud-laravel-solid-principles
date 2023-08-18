<?php

namespace App\Contracts\Interfaces\Eloquent;

interface UpdateInterface
{
    public function update(mixed $id, array $data): mixed;
}
