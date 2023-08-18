<?php

namespace App\Observers;

use App\Models\School;
use Faker\Provider\Uuid;

class SchoolObserver
{
    /**
     * Handle the School "creating" event.
     *
     * @param School $school
     * @return void
     */
    public function creating(School $school): void
    {
        $school->id = Uuid::uuid();
    }

    /**
     * Handle the School "created" event.
     */
    public function created(School $school): void
    {
        //
    }

    /**
     * Handle the School "updated" event.
     */
    public function updated(School $school): void
    {
        //
    }

    /**
     * Handle the School "deleted" event.
     */
    public function deleted(School $school): void
    {
        //
    }

    /**
     * Handle the School "restored" event.
     */
    public function restored(School $school): void
    {
        //
    }

    /**
     * Handle the School "force deleted" event.
     */
    public function forceDeleted(School $school): void
    {
        //
    }
}
