<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $data = [
            'name' => 'Teste',
            'email' => 'teste@teste.com',
            'password' => '12345',
        ];

        $url = $this->postJson('/api/register', $data);

        $response = $this->assertTrue(true);

    }
}
