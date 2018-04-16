<?php

namespace FreelanceTest\Providers;

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
        // 'FreelanceTest\Events\ThreadCreated' => [
        //     'FreelanceTest\Listeners\NotifySubscribers',
        //     'FreelanceTest\Listeners\CheckForSpam',
        // ],
        'FreelanceTest\Events\ThreadReceivedNewReply' => [
            'FreelanceTest\Listeners\NotifyMentionedUsers',
            'FreelanceTest\Listeners\NotifySubscribers'
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

        //
    }
}
