<?php

namespace App\Models;

use App\Base\Interfaces\HasSchool;
use App\Base\Interfaces\HasStudents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classroom extends Model implements HasSchool, HasStudents
{
    use HasFactory;

    protected $fillable = [
        'name', 'school_id',
    ];

    public $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'id';

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
