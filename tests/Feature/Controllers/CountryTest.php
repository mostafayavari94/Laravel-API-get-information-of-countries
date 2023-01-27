<?php

namespace Tests\Feature\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Country;
use App\Models\User;
use Artisan;
use App\Http\Resources\CountryResource;

class CountryTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() :void
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }
    public function testGetCountry()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
 
        // dd(CountryResource::collection(Country::all())->toArray());
        // $countries = Country::all();
        // dd($countries);
        // $countries = "" ;
        
        $response = $this
        ->actingAs($user,'sanctum')
        ->getJson(
            route("country.list")
        );
        
        $response
        ->assertOk()
        ->assertJsonCount(Country::all()->count());
    }
}
