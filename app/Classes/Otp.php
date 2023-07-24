<?php

namespace App\Classes;

use App\Interfaces\IEmailDrive;
use App\Models\Token;
use App\Models\User;
use Carbon\Carbon;

class Otp
{
    private IEmailDrive $driver;
    private RandomGenerator $generator;
    private int $token;

    function __construct(IEmailDrive $drive, RandomGenerator $generator)
    {
        $this->generator = $generator;
        $this->driver = $drive;
    }

    public function sendVerifyEmail(User $user, IEmailDrive $driver = null): void
    {
        $user->otpTokens()->delete();
        $token = new Token();
        $this->token = $this->generator->random();
        $token->token = $this->token;
        $token->user_id = $user->id;
        $token->expires_at = Carbon::now()->addHour(1)->format('Y-m-d H:i:s');
        $token->save();

        if ($driver) {
            $driver->sendVerifyEmail($user->email, $this->token);
        } else {
            $this->driver->sendVerifyEmail($user->email, $this->token);
        }
    }

    public function checkToken(User $user, $token): void
    {
        $user->otpTokens()->where("token", $token)->whereDate('expires_at', '<', Carbon::now()->format('Y-m-d H:i:s'))->firstOrFail();
        $user->otpTokens()->delete();
    }
}
