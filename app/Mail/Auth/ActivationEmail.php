<?php

namespace App\Mail\Auth;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $lastVisited;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $lastVisited)
    {
        $this->user = $user;
        $this->lastVisited = $lastVisited;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.auth-activation')->subject('Heisann - du må aktivere kontoen din');
    }
}
