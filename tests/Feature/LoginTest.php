<?php 

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseMigrations; //for temporary database 

     /**
     * A basic test example.
     *
     * @return void
     */
    public function test_after_login_user_can_not_access_home_page_until_verified() : void
    {
        // $user = factory(User::class)->create();
        $user = User::factory()->create();
        // $this->actingAs($user)
       $response =  $this->actingAs($user);
    //    $response->dump();
        $this->get('/home')->assertRedirect('/admin');
    }

     /**
     * A basic test example.
     *
     * @return void
     */
    public function test_after_login_user_can_access_home_page_if_verified() : void 
    {
        $user = User::factory()->create(['is_otp_verified' => 1]);
        $this->actingAs($user);

        $this->get('/home')->assertRedirect('/verifyOtp');
        // $this->get('/home')->assertStatus(200);
    }

    // public function test_an_action_that_requires_authentication(): void
    // {
    //     $user = User::factory()->create();
 
    //     $response = $this->actingAs($user)
    //                      ->withSession(['banned' => false])
    //                      ->get('/');

    //     $response->dd();
    // }

}



