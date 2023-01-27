<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Classes\Otp;
use App\Classes\MailtrapEmailDrive;

class AuthController extends Controller
{
    public function getOTPToken(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
        ]);

        DB::beginTransaction();
        try {
            $user = User::firstOrCreate([
                'email' => $request->email
            ]);

            $otp = new Otp();
            $otp->sendVerifyEmail($user, new MailtrapEmailDrive());

            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => __('message.success_operation'),
            ]);
        } catch (\Throwable $th) {
            DB::rollback();

            return show_message($th);
        }
    }



    public function getAuthToken(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'token' => 'required|numeric|digits:4',
            'device_name' => 'required',
        ]);

        try {
            $user = User::where('email', $request->email)->firstOrFail();
            $otp = new Otp();
            $verification_status = $otp->checkToken($user, $request->token);

            $user->tokens()->delete();
            $token = $user->createToken($request->device_name)->plainTextToken;

            return response()->json([
                        'token' => $token,
                    ]);
        } catch (\Throwable $th) {
            return show_message($th, __("messages.invalid_verification_code_entered"));
        }
    }
}
