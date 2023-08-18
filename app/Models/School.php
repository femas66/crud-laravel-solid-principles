<?php

namespace App\Models;

use App\Base\Interfaces\HasClassrooms;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model implements HasClassrooms
{
    use HasFactory;

    protected $fillable = [
        'image', 'name',
    ];

    public $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'id';

    public function classrooms(): HasMany
    {
        return $this->hasMany(Classroom::class);
    }
}
