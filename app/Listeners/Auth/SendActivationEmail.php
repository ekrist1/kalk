<?php

namespace App\Listeners\Auth;

use App\Events\Auth\UserRequestActivationEmail;
use App\Mail\Auth\ActivationEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;


class SendActivationEmail
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
     * @param  UserRequestActivationEmail  $event
     * @return void
     */
    public function handle(UserRequestActivationEmail $event)
    {
        if ($event->user->active) {
            return;
        }
        Mail::to($event->user->email)
            ->send(new ActivationEmail($event->user, $event->lastVisited));
    }
}
