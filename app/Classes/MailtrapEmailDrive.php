<?php

namespace App\Classes;

use App\Interfaces\IEmailDrive;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendActiveCode;
use Config;

class MailtrapEmailDrive  implements IEmailDrive
{

    public function sendVerifyEmail($email_address, $token, ...$data)
    {
        Mail::mailer('mailtrap')
        ->to($email_address)
        ->queue(new SendActiveCode($token, 'mailtrap@mostafayavari.ir'));
    }

    public function sendEmail()
    {
        // should implement 
    }
}
