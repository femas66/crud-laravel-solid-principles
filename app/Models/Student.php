<?php

namespace App\Models;

use App\Base\Interfaces\HasClassroom;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model implements HasClassroom
{
    use HasFactory;

    protected $fillable = [
        'name', 'image', 'gender', 'classroom_id', 'email',
    ];

    public $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'id';

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }
}
