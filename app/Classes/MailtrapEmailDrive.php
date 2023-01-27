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
        ->queue(new SendActiveCode($token, env('MAILTRAP_MAIL_FROM_ADDRESS')));
    }

    public function sendEmail()
    {
        // should implement 
    }
}
