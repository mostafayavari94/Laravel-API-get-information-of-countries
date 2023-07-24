<?php

namespace Tests\Feature\Modules;

use App\Classes\MailtrapEmailDrive;
use App\Mail\SendActiveCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class MailtrapEmailIDriveTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @param $email
     * @param $token
     * @return void
     * @dataProvider simpleData
     */
    public function test_Mailtrap($email, $token): void
    {

        $this->withoutExceptionHandling();

        Mail::fake();

        $mailtrap = new MailtrapEmailDrive();

        $mailtrap->sendVerifyEmail($email, $token);

        Mail::assertQueued(function (SendActiveCode $mail) use ($token, $email) {
            return $mail->hasSubject('Send Active Code') && $mail->hasTo($email) && $mail->getToken() == $token;
        });

    }

    public function simpleData()
    {
        return[
            ['mya.ronin@gmail.com','1234'],
            ['foo@gmail.com','1356'],
            ['bar@gmail.com','2369'],
            ['john.doe@gmail.com','9764'],
            ['yalannan@gmail.com','7429'],
        ];
    }
}
