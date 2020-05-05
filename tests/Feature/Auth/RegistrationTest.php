<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use WithFaker,
        RefreshDatabase;

    /** @test */
    public function guest_can_register()
    {
        $this->withoutExceptionHandling();
        $credentials = [
            'name' => 'Some Name',
            'email' => 'email@example.com',
            'password' => 'secret'
        ];
        $this->json('POST', '/api/register', $credentials);
        $this->assertDatabaseHas('users', ['email' => 'email@example.com']);
    }
}
