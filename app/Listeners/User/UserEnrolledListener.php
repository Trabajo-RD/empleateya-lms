<?php

namespace App\Listeners\User;

use App\Events\User\UserEnrolledEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UserEnrolledListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserEnrolledEvent  $event
     * @return void
     */
    public function handle(UserEnrolledEvent $event)
    {
        Log::info("[Enrolled event] Usuario enrolado " . $event->user);
    }
}
