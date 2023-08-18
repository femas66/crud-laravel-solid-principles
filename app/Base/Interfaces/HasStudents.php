<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasStudents
{
    public function students(): HasMany;
}
