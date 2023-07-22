<?php

namespace App\Classes;

use App\Interfaces\IEmailDrive;
use App\Models\Token;
use App\Models\User;
use Carbon\Carbon;

class Otp
{
    private $token;
    private IEmailDrive $driver;

    function __construct(IEmailDrive $drive)
    {
        $this->driver = $drive;
    }

    public function sendVerifyEmail(User $user, IEmailDrive $driver = null): void
    {
        $user->otpTokens()->delete();
        $this->generateToken();
        $token = new Token();
        $token->token = $this->token;
        $token->user_id = $user->id;
        $token->expires_at = Carbon::now()->addHour(1)->format('Y-m-d H:i:s');
        $token->save();

        if ($driver)
            $driver->sendVerifyEmail($user->email, $this->token);
        else
            $this->driver->sendVerifyEmail($user->email, $this->token);
    }

    private function generateToken(): void
    {
        $this->token = rand(1999, 9999);
    }

    public function checkToken(User $user, $token): void
    {
        $user->otpTokens()->where("token", $token)->whereDate('expires_at', '<', Carbon::now()->format('Y-m-d H:i:s'))->firstOrFail();
        $user->otpTokens()->delete();
    }
}
