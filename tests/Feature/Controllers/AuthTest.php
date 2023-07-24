<?php

namespace Tests\Feature\Controllers;

use App\Classes\Otp;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\PersonalAccessToken;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @param $email
     * @return void
     * @dataProvider getInvalidEmail
     * @group get_otp_token
     */
    public function test_get_otp_token_validation_valid_email_address($email): void
    {
        $response = $this
            ->PostJson(
                route("get.token"),
                [
                    'email' => $email
                ]);

        $response->assertJsonValidationErrors(
            [
                'email' => "The email must be a valid email address."
            ]
        );
    }

    /**
     * @group get_otp_token
     */
    public function test_get_otp_token_validation_required_email_address(): void
    {

        $response = $this
            ->PostJson(
                route("get.token"));

        $response->assertJsonValidationErrors(
            [
                'email' => "The email field is required."
            ]
        );
    }

    /**
     * @param $email
     * @return void
     * @dataProvider getValidEmail
     * @group get_otp_token
     */
    public function test_get_otp_token($email): void
    {

        $this->instance(
            Otp::class,
            Mockery::mock(Otp::class, function (MockInterface $mock) use ($email) {
                $mock->shouldReceive('sendVerifyEmail')
                    ->with(Mockery::on(function ($user) use ($email) {
                        return $user->email == $email;
                    }))
                    ->once();
            })
        );

        $response = $this
            ->PostJson(
                route("get.token"),
                [
                    'email' => $email,
                ]
            );

        $response
            ->assertOk()
            ->assertJson(
                [
                    'status' => 200,
                    'message' => __('message.success_operation'),
                ]
            );
    }


    public function getValidEmail(): array
    {
        return [
            ['mya.ronin@gmail.com'],
            ['test@mail.com']
        ];
    }

    public function getInvalidEmail(): array
    {
        return [
            ['blabla'],
            ['yalannan']
        ];
    }


    /**
     * @return void
     * @group get_auth_token
     */
    public function test_get_auth_token_validation_required(): void
    {
        $response = $this->PostJson(route("validate.token"));

        $response->assertJsonValidationErrors([
            'email' => ["The email field is required."],
            'token' => ["The token field is required."],
            'device_name' => ["The device name field is required."],

        ]);
    }

    /**
     * @param $email
     * @param $token
     * @param $device_name
     * @return void
     * @group get_auth_token
     * @dataProvider auth_toke_info
     */
    public function test_get_auth_token($email, $token, $device_name): void
    {
        $user = User::factory()->create(
            [
                'email' => $email,
            ]
        );

        $otp_double = Mockery::spy(Otp::class);

        $this->swap(Otp::class, $otp_double);

        $response = $this->PostJson(route("validate.token"),
            [
                'email' => $email,
                'token' => $token,
                'device_name' => $device_name
            ]);

        $otp_double->shouldHaveReceived("checkToken")
            ->once()
            ->with(Mockery::on(function ($_user) use ($user) {
                return $_user->email == $user->email;
            }), $token);

        $tokens = $user->tokens;

        $this->assertTrue($tokens->count() == 1);

        [$id, $token] = explode('|', $response['token'], 2);

        $this->assertTrue(hash_equals(PersonalAccessToken::find($id)->token, hash('sha256', $token)));

    }

    public function auth_toke_info(): array
    {
        return [
            ["mya.ronin@gmail.com", "1235", "blabla"]
        ];
    }


}
