<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    // public function setup()
    // {
    //     parent::setUp();
    //     $this->withoutExceptionHandling();
    // }

    // public function logInUser()
    // {
    //     $user = User::factory()->create(); 
    //     $this->actingAs($user);
    // }

}
