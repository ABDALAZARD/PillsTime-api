<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
// use Lcobucci\JWT\Token;
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

        $this->cleanUp();
    }

    public function test_login() {

        $this->cleanUp();
        $rand = rand(1, 99999);
        $user = new User([
            'name' => 'Testerson',
            'email' => 'testerson@teste.com',
            'password' => Hash::make($rand),
        ]);
        $user->save();

        $data = [
            'email' => $user->email,
            'password' => $rand,
        ];

        $url = '/api/login';

        $response = $this->postJson($url, $data);

        $response->assertOk();
        $response->assertJson([
            'token' => $response['token'],
        ]);
    }
}
