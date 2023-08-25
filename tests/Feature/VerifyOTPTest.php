<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class VerifyOTPTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_user_can_submit_otp_and_get_verified()
    {
       $this->withoutExceptionHandling();
    //    $otp = rand(100000,999999);
    //    Cache::put(['OTP' => $otp], now()->addSeconds(20));
       $user = User::factory()->create(); 
       $this->actingAs($user);
       $otp = auth()->user()->cacheTheOTP();

       $this->post('/verifyOTP',['OTP' => $otp])->assertStatus(302);
       $this->assertDatabaseHas('users',['is_otp_verified' => 1]);
    }

    public function test_user_can_see_otp_verify_page()
    {
        $user = User::factory()->create(); 
        $this->actingAs($user,'web');
        $this->get('/verifyOtp')
        ->assertStatus(200)
        ->assertSee("Enter Your OTP");

    }

    public function test_invalid_otp_returns_error_message()
    {
        $user = User::factory()->create(); 
        $this->actingAs($user);
        $this->post('/verifyOTP',['OTP' => 'invalid otp'])->assertSessionHasErrors();
    }

    public function test_if_no_otp_is_given_then_it_returns_with_error()
    {
        $this->withExceptionHandling();

        $user = User::factory()->create(); 
        $this->actingAs($user);
        $this->post('/verifyOTP',['OTP' => null ])->assertSessionHasErrors(['OTP']);
    }

}
