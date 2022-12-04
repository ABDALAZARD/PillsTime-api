<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_register()
    {
        $user = User::all();
        if( $user->count() > 0 ) {
            foreach($user as $usr) {
                $usr->delete();
            }
        }
        $data = [
            'name' => "Vinicius Jr",
            'email' => "vinijr@teste.com",
            'password' => '123456',
        ];

        $url = 'users.store';

        $response = $this->postJson($url, $data);

        $response->assertOk();

        // dd($user);
    }
}
