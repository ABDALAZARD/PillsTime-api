<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
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

        $response->assertStatus(200);

        $this->cleanUsersTest();

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

        $response->assertStatus(403);

        $this->cleanUsersTest();
    }
}
