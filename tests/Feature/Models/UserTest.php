<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Tests\TestCase;
use App\Models\User;
use App\Models\Token;

class UserTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_insert_user(): void
    {
        $user = User::factory()->create();
        $this->assertCount(1,User::all());
        $this->assertModelExists($user);

    }

    public function test_user_relation_with_token()
    {
        $user = User::factory()
        ->hasOtpTokens(1)
        ->create();

        $all_tokens = Token::all();

        $this->assertEquals($all_tokens,$user->otpTokens);
        $this->assertTrue($all_tokens->first() instanceof Token);
        $this->assertInstanceOf(HasMany::class, $user->otpTokens());

    }
}
