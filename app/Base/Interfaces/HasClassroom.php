<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasClassroom
{
    public function classroom(): BelongsTo;
}
