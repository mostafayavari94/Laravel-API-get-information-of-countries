<?php

namespace App\Classes;

use App\Interfaces\IEmailDrive;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendActiveCode;

class MailgunEmailDrive  implements IEmailDrive
{
    public function sendVerifyEmail($email_address, $token, ...$data)
    {
        Mail::to($email_address)
            ->queue(new SendActiveCode($token));
    }

    public function sendEmail()
    {
        // should implement 
    }
}
