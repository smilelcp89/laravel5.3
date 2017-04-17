<?php

namespace app\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'app\Events\SomeEvent' => [
            'app\Listeners\EventListener',
        ],
        'app\Events\OrderSuccess' => [
            'app\Listeners\OrderSuccessListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        /*Event::listen('event.name', function ($foo, $bar) {
        //
        });*/
    }
}
