<?php

namespace App\Listeners\User;

use App\Events\User\UserConnectingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UserConnectingListener
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
     * @param  UserConnectingEvent  $event
     * @return void
     */
    public function handle(UserConnectingEvent $event)
    {
        Log::info("[Logging event] Iniciando sesión " . $event->user);
    }
}
