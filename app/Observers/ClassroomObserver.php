<?php

namespace App\Observers;

use App\Models\Classroom;
use Faker\Provider\Uuid;

class ClassroomObserver
{
    /**
     * Handle the Classroom "creating" event
     *
     * @param Classroom $classroom
     * @return void
     */
    public function creating(Classroom $classroom): void
    {
        $classroom->id = Uuid::uuid();
    }
    /**
     * Handle the Classroom "created" event.
     */
    public function created(Classroom $classroom): void
    {
        //
    }

    /**
     * Handle the Classroom "updated" event.
     */
    public function updated(Classroom $classroom): void
    {
        //
    }

    /**
     * Handle the Classroom "deleted" event.
     */
    public function deleted(Classroom $classroom): void
    {
        //
    }

    /**
     * Handle the Classroom "restored" event.
     */
    public function restored(Classroom $classroom): void
    {
        //
    }

    /**
     * Handle the Classroom "force deleted" event.
     */
    public function forceDeleted(Classroom $classroom): void
    {
        //
    }
}
