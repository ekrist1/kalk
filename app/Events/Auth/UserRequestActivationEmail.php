<?php

namespace App\Events\Auth;

use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;


class UserRequestActivationEmail
{
    use Dispatchable, SerializesModels;

    public $user;
    public $lastVisited;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, $lastVisited)
    {
        $this->user = $user;
        $this->lastVisited = $lastVisited;
    }

}
