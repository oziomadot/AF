<?php

namespace App\Observers;

use App\Models\Newcase;
use Illuminate\Support\Facades\Cache;

class NewcaseObserver
{
    /**
     * Handle the Newcase "created" event.
     */
    public function created(Newcase $newcase): void
    {
        Cache::flush();
    }

    /**
     * Handle the Newcase "updated" event.
     */
    public function updated(Newcase $newcase): void
    {
        Cache::flush();
    }

    /**
     * Handle the Newcase "deleted" event.
     */
    public function deleted(Newcase $newcase): void
    {
        Cache::flush();
    }

    /**
     * Handle the Newcase "restored" event.
     */
    public function restored(Newcase $newcase): void
    {
        Cache::flush();
    }

    /**
     * Handle the Newcase "force deleted" event.
     */
    public function forceDeleted(Newcase $newcase): void
    {
        Cache::flush();
    }
}
