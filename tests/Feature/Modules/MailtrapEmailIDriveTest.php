<?php

namespace Tests\Feature\Modules;

use App\Classes\MailtrapEmailDrive;
use App\Mail\SendActiveCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use PharIo\Manifest\InvalidEmailException;
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

        Mail::fake();

        (new MailtrapEmailDrive())->sendVerifyEmail($email, $token);

        Mail::assertQueued(function (SendActiveCode $mail) use ($token, $email) {
            return $mail->hasSubject('Send Active Code') && $mail->hasTo($email) && $mail->getToken() == $token;
        });

    }

    public function simpleData(): array
    {
        return[
            ['mya.ronin@gmail.com','1234'],
            ['foo@gmail.com','1356'],
            ['bar@gmail.com','2369'],
            ['john.doe@gmail.com','9764'],
            ['yalannan@gmail.com','7429'],
        ];
    }

    /**
     * @param $email
     * @return void
     * @dataProvider invalidEmail
     */
    public function test_Mailtrap_exception_validation($email) : void
    {

        $this->expectException(InvalidEmailException::class);
        (new MailtrapEmailDrive())->sendVerifyEmail($email, 'fake');

    }

    public function invalidEmail(): array
    {
        return[
            ['afdlsdfsdf'],
            ['ghjkhg'],
            ['fvbdf'],
        ];
    }
}
