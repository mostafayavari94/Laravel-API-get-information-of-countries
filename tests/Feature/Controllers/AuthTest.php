<?php

namespace Tests\Feature\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class authTest extends TestCase
{
    use RefreshDatabase;

    public function testGetOtpTokenValidation()
    {
        // $this->withoutExceptionHandling();

        $response = $this
        ->PostJson(
            route("get.token"),
            []
        );

        $response->assertJsonValidationErrors(
            [
            'email' => "The email field is required."
            ]
        );
    }

    public function testGetOtpToken()
    {
        $user = User::factory()->create();

        $response = $this
        ->PostJson(
            route("get.token"),
            [
                'email' => "mya.ronin@gmail.com",
            ]
        );

        $response
        ->assertOk();
    }
}
