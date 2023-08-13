<?php

namespace App\Observers;

use App\Models\Donator;
use Illuminate\Support\Facades\Cache;

class DonatorObserver
{
    /**
     * Handle the Donator "created" event.
     */
    public function created(Donator $donator): void
    {
        Cache::flush();
    }

    /**
     * Handle the Donator "updated" event.
     */
    public function updated(Donator $donator): void
    {
        Cache::flush();
    }

    /**
     * Handle the Donator "deleted" event.
     */
    public function deleted(Donator $donator): void
    {
        Cache::flush();
    }

    /**
     * Handle the Donator "restored" event.
     */
    public function restored(Donator $donator): void
    {
        Cache::flush();
    }

    /**
     * Handle the Donator "force deleted" event.
     */
    public function forceDeleted(Donator $donator): void
    {
        Cache::flush();
    }
}
