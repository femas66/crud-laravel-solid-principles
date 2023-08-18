<?php

namespace App\Contracts\Interfaces\Eloquent;

interface DeleteInterface
{
    public function delete(mixed $id): mixed;
}
