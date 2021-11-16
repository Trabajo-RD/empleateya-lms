<?php

namespace App\Listeners\User;

use App\Events\User\UserConnectedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UserConnectedListener
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
     * @param  UserConnectedEvent  $event
     * @return void
     */
    public function handle(UserConnectedEvent $event)
    {
        Log::info("[Logged event] Usuario conectado " . $event->user);
    }
}
