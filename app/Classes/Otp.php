<?php

namespace App\Classes;

use App\Interfaces\IEmailDrive;
use App\Models\Token;
use App\Models\User;
use Carbon\Carbon;

class Otp
{
    private $token;

    function __construct() {
        // $this->token = $this->generateToken();
    }

    private function generateToken()
    {
        $this->token = rand(1999, 9999);
    }

    public function sendVerifyEmail(User $user, IEmailDrive $driver)
    {
        
        $user->otpTokens()->delete();
        $this->generateToken();
        $token = new Token();
        $token->token = $this->token;
        $token->user_id = $user->id;
        $token->expires_at = Carbon::now()->addHour(1)->format('Y-m-d H:i:s');
        $token->save();

        $driver->sendVerifyEmail($user->email, $this->token);
    }    

    public function checkToken(User $user, $token)
    {
        $user->otpTokens()->where("token", $token)->whereDate('expires_at', '<', Carbon::now()->format('Y-m-d H:i:s'))->firstOrFail();
        $user->otpTokens()->delete();
    }
}