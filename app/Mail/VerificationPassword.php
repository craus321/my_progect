<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $activation_token = $this->user->activation_token;

        return $this->
        from(env('MAIL_USERNAME'), 'Придумай название магазину')->
        view('emails.verification_password')

            ->subject('Востановление пароля');


    }

}
