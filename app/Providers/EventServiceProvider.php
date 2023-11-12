<?php

namespace App\Providers;

use App\Models\Activity;
use App\Models\Available;
use App\Models\Beneficiary;
use App\Models\Donator;
use App\Models\Newcase;
use App\Models\Plan;
use App\Models\Sponsor;
use App\Models\User;
use App\Models\Volunteer;
use App\Observers\ActivityObserver;
use App\Observers\AvailableObserver;
use App\Observers\BeneficiaryObserver;
use App\Observers\DonatorObserver;
use App\Observers\NewcaseObserver;
use App\Observers\PlanObserver;
use App\Observers\SponsorObserver;
use App\Observers\UserObserver;
use App\Observers\VolunteerObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    protected $observers = [
        Beneficiary::class =>[BeneficiaryObserver::class],
        Donator::class =>[DonatorObserver::class],
        Newcase::class =>[NewcaseObserver::class],
        Sponsor::class =>[SponsorObserver::class],
        Plan::class =>[PlanObserver::class],
        Available::class =>[AvailableObserver::class],
        Volunteer::class =>[VolunteerObserver::class],
        User::class => [UserObserver::class],
        Activity::class =>[ActivityObserver::class],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
