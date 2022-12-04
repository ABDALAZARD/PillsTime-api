<?php

namespace Tests\Feature\Users;

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

    public function register_test()
    {
        $rand = random_int(12, 12);
        dd($rand);
    }
}
