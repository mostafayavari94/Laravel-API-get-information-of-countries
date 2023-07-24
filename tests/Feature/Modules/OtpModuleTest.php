<?php

namespace Tests\Feature\Modules;

use App\Classes\Otp;
use App\Classes\RandomGenerator;
use App\Interfaces\IEmailDrive;
use App\Models\Token;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use PharIo\Manifest\InvalidEmailException;
use Tests\TestCase;

class OtpModuleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @param $email
     * @param $random
     * @return void
     * @dataProvider otp_data
     */
    public function test_Otp_class_send_verify_email($email, $random): void
    {
        $emailDrive = Mockery::spy(IEmailDrive::class);

        $user = User::factory()->create([
            'email' => $email
        ]);

        $generator_stub = $this->createMock(RandomGenerator::class);

        $generator_stub->method('random')
            ->willReturn($random);

        $otp = new Otp($emailDrive, $generator_stub);

        $otp->sendVerifyEmail($user);

        $this->assertEquals(1,$user->otpTokens->count());

        $this->assertEquals($random,$user->otpTokens()->first()->token);

        $emailDrive->shouldHaveReceived('sendVerifyEmail')
            ->with($user->email, $random);
    }

    public function otp_data(): array
    {
        return[
            ["mya.ronin@gmail.com", "1234"],
            ["bla@gmail.com", "1238"],
            ["foo@gmail.com", "12378"],
            ["yalannan@gmail.com", "1249"],
        ];
    }


    /**
     * @param $email
     * @param $random
     * @return void
     * @dataProvider otp_data
     */
    public function test_Otp_class_check_token($email, $random) : void
    {
        $emailDrive = Mockery::spy(IEmailDrive::class);

        $user = User::factory()->create([
            'email' => $email
        ]);

        $generator_stub = $this->createMock(RandomGenerator::class);

        $generator_stub->method('random')
            ->willReturn($random);

        $otp = new Otp($emailDrive, $generator_stub);
        $otp->sendVerifyEmail($user);
        $otp->checkToken($user, $random);
        $this->assertDatabaseEmpty(Token::class);

    }

    /**
     * @return void
     */
    public function test_Otp_class_check_token_exception() : void
    {
        $this->expectException(ModelNotFoundException::class);

        (new Otp($this->createMock(IEmailDrive::class), new RandomGenerator()))->checkToken(new User(), 'fake');

    }


}
