<?php

namespace App\Observers;

use App\Models\Available;
use Illuminate\Support\Facades\Cache;

class AvailableObserver
{
    /**
     * Handle the Available "created" event.
     */
    public function created(Available $available): void
    {
        Cache::flush();
    }

    /**
     * Handle the Available "updated" event.
     */
    public function updated(Available $available): void
    {
        Cache::flush();
    }

    /**
     * Handle the Available "deleted" event.
     */
    public function deleted(Available $available): void
    {
        Cache::flush();
    }

    /**
     * Handle the Available "restored" event.
     */
    public function restored(Available $available): void
    {
        Cache::flush();
    }

    /**
     * Handle the Available "force deleted" event.
     */
    public function forceDeleted(Available $available): void
    {
        Cache::flush();
    }
}
