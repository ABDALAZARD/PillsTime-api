<?php

namespace Tests;

use App\Models\User;
use Exception;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Hash;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $name;

    protected function createUser() {

        $rand = rand(1, 99999);

        $user = new User();
        $user->create([
            'name' => 'Testerson',
            'email' => 'Teste123@teste.com',
            'password' => Hash::make($rand),
        ]);
        $user->save();

        return $user;

    }

    protected function cleanUp() {
        $toClean = User::all();

        try {
            if($toClean->count() == 0) {
                $msg = null;
            }
        } catch (Exception $e) {
            foreach($toClean as $cleaned) {
                $cleaned->delete();
            }
            $msg = [
                'msg' => 'Limpo',
            ];
        }
    }
}
