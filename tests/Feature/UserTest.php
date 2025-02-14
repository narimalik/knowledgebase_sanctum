<?php

namespace Tests\Feature;

use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class UserTest extends TestCase
{
    
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_login_user()
    {
        $response = $this->postJson('/login', ["email" => "malikanwaar@gmail.com", "password" => "password"]);
        
        $this->withoutExceptionHandling(); // REMOVE THIS ONCE YOU FIGURE OUT WHAT THE ERROR IS

        $response->assertStatus(200);
    }
}
