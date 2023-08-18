<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasClassrooms
{
    public function classrooms(): HasMany;
}
