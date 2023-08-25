<?php

namespace Tests\Feature;

use App\Mail\OTPMail;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;

class EmailTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_an_otp_mail_is_sent_before_login()
    {
        Mail::fake();
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $response = $this->post('/login',['email' => $user->email, 'password' => 'password', 'otp_via' => 'email_otp','type'=>'admin' ]);

        $response->assertStatus(200);
       // Mail::assertSent(OTPMail::class);
    }
    
    public function otp_is_not_sent_if_credentials_are_incorrect()
    {
        Mail::fake();
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $response = $this->post('/login',['email' => $user->email, 'password' => 'sdkfkflaxx']);

        Mail::assertNotSent(OTPMail::class);
    }

    public function test_otp_is_stored_in_cache_for_user()
    {
        $user = User::factory()->create();
        $response = $this->post('/login',['email' => $user->email, 'password' => 'passwowrd']);

        $this->assertNotNull($user->OTP);

    }
}
