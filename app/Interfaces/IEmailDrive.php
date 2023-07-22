<?php

namespace App\Interfaces;

interface IEmailDrive
{
    public function sendEmail();
    public function sendVerifyEmail($email_address, $token, ...$data): void;
}
