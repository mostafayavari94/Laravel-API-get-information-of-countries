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
     * A basic feature test example.
     *
     * @return void
     */
    public function testInserUser()
    {
        $user = User::factory()->create();
        $this->assertModelExists($user);
        
    }

    public function testUserRelationWithToken()
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
