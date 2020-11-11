<?php

namespace App\Providers;

use App\Events\NewsCreatedEvent;
use App\Events\ProductCreatedEvent;
use App\Listeners\NewsCreatedListener;
use App\Listeners\ProductCreatedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewsCreatedEvent::class => [
            NewsCreatedListener::class,
        ],
        ProductCreatedEvent::class => [
            ProductCreatedListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
