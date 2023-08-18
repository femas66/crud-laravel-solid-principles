<?php

namespace App\Observers;

use App\Models\Student;
use Faker\Provider\Uuid;

class StudentObserver
{
    public function creating(Student $student): void
    {
        $student->id = Uuid::uuid();
    }
}
