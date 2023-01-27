<?php

namespace App\Classes;

use App\Interfaces\IEmailDrive;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendActiveCode;

class LocalEmailDrive  implements IEmailDrive
{
    function __construct(){
        // Config::set('local.mail', 'mandrill');
        // (new Illuminate\Mail\MailServiceProvider(app()))->register();   
    }
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
