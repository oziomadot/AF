<?php

namespace App\Observers;

use App\Models\Volunteer;
use Illuminate\Support\Facades\Cache;

class VolunteerObserver
{
    /**
     * Handle the Volunteer "created" event.
     */
    public function created(Volunteer $volunteer): void
    {
        Cache::flush();
    }

    /**
     * Handle the Volunteer "updated" event.
     */
    public function updated(Volunteer $volunteer): void
    {
        Cache::flush();
    }

    /**
     * Handle the Volunteer "deleted" event.
     */
    public function deleted(Volunteer $volunteer): void
    {
        Cache::flush();
    }

    /**
     * Handle the Volunteer "restored" event.
     */
    public function restored(Volunteer $volunteer): void
    {
        Cache::flush();
    }

    /**
     * Handle the Volunteer "force deleted" event.
     */
    public function forceDeleted(Volunteer $volunteer): void
    {
        Cache::flush();
    }
}
