<?php

namespace App\Observers;

use App\Models\Sponsor;
use Illuminate\Support\Facades\Cache;

class SponsorObserver
{
    /**
     * Handle the Sponsor "created" event.
     */
    public function created(Sponsor $sponsor): void
    {
        Cache::flush();
    }

    /**
     * Handle the Sponsor "updated" event.
     */
    public function updated(Sponsor $sponsor): void
    {
        Cache::flush();
    }

    /**
     * Handle the Sponsor "deleted" event.
     */
    public function deleted(Sponsor $sponsor): void
    {
        Cache::flush();
    }

    /**
     * Handle the Sponsor "restored" event.
     */
    public function restored(Sponsor $sponsor): void
    {
        Cache::flush();
    }

    /**
     * Handle the Sponsor "force deleted" event.
     */
    public function forceDeleted(Sponsor $sponsor): void
    {
        Cache::flush();
    }
}
