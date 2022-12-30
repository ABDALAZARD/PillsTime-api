<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_login_email_invalid() {

        $newUser = new User();
        $newUser->name = "Vinicius Jr";
        $newUser->email = "vinijr@teste.com";
        $newUser->password = Hash::make('12345');
        $newUser->save();


        $data = [
            "email" => 'vinijr',
            "password" => '12345',
        ];

        $response = $this->postJson('/api/login', $data);

        $response->assertStatus(422);
    }

    public function test_login_password_invalid() {

        $newUser = new User();
        $newUser->name = "Vinicius Jr";
        $newUser->email = "vinijr@teste.com";
        $newUser->password = Hash::make('12345');
        $newUser->save();

        $data = [
            'email' => 'vinijr@teste.com',
            'password' => '123',
        ];

        $response = $this->postJson('/api/login', $data);
        $response->assertStatus(422);

    }

    public function test_login_successful() {

        $newUser = new User();
        $newUser->name = "Vinicius Jr";
        $newUser->email = "vinijr@teste.com";
        $newUser->password = Hash::make('123456');
        $newUser->save();

        $data = [
            'email' => 'vinijr@teste.com',
            'password' => '123456',
        ];

        $response = $this->postJson('/api/login', $data);
        $response->assertSuccessful();

    }
}
