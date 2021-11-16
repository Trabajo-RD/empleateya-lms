<?php

namespace App\Listeners\User;

use App\Events\User\UserRegisteringEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UserRegisteringListener
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
     * @param  UserRegisteringEvent  $event
     * @return void
     */
    public function handle(UserRegisteringEvent $event)
    {
        Log::info("[Registering event] Registrando usuario " . $event->user);
    }
}
