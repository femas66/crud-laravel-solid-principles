<?php

namespace App\Contracts\Interfaces\Eloquent;

interface StoreInterface
{
    public function store(array $data): mixed;
}
