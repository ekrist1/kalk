<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;


class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ByttPassord($token));
    }
}

class ByttPassord extends ResetPassword
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Du mottar denne e-posten siden du har bedt om å få laget nytt passord på kontoen din.')
            ->action('Lag nytt passord', url(config('app.url') . route('password.reset', $this->token, false)))
            ->line('Ikke bedt om nytt passord? Vennligst ta kontakt med oss gjennom kontaktskjemaet på nettsiden vår.');
    }
}