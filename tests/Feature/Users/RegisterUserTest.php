<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_user_register()
    {

        $rand = rand(1, 99999);
        $data = [
            'name' => "Vinicius Jr nº $rand",
            'email' => "vinijr$rand@teste.com",
            'password' => Hash::make($rand),

        ];
        $url = '/api/register';

        $response = $this->postJson($url, $data);

        $response->assertOk();

    }

    public function test_user_email_invalid()
    {

        $rand = rand(1, 99999);
        $data = [
            'name' => "Vinicius Jr nº $rand",
            'email' => "vinijr$rand",
            'password' => Hash::make($rand),

        ];
        $url = '/api/register';

        $response = $this->postJson($url, $data);

        $response->assertForbidden();
    }

    public function test_password()
    {
        $rand = rand(1, 99999);
        $data = [
            'name' => "Vinicius Jr nº $rand",
            'email' => "vinijr$rand@gmail.com",
            'password' => '',

        ];
        $url = '/api/register';

        $response = $this->postJson($url, $data);

        $response->assertForbidden();
    }
}
