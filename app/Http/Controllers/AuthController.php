<?php

namespace App\Http\Controllers;

use App\Classes\Otp;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getOTPToken(Request $request, Otp $otp)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
        ]);

        DB::beginTransaction();
        try {
            $user = User::firstOrCreate([
                'email' => $request->email
            ]);

            $otp->sendVerifyEmail($user);

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


    public function getAuthToken(Request $request, Otp $otp)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'token' => 'required|numeric|digits:4',
            'device_name' => 'required',
        ]);

        try {
            $user = User::where('email', $request->email)->firstOrFail();

            $otp->checkToken($user, $request->token);

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
