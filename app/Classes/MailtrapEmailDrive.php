<?php

namespace App\Classes;

use App\Interfaces\IEmailDrive;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendActiveCode;

class MailtrapEmailDrive  implements IEmailDrive
{

    public function sendVerifyEmail($email_address, $token, ...$data): void
    {
        Mail::mailer('mailtrap')
        ->to($email_address)
        ->queue(new SendActiveCode($token, Config::get('app.mailtrap_mail_from_address')));
    }

    public function sendEmail()
    {
        // should implement
    }
}
