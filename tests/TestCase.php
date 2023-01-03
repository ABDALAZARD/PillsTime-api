<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Hash;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    // public function cleanUsersTest() {
    //     $users = User::all();
    //     if($users->count() > 0) {
    //         foreach($users as $user) {
    //             $user->delete();
    //         }
    //     }
    //     return;
    // }

    // public function createRandomUser() {
    //     $rand = rand(1, 99999);

    //     $newUser = new User();
    //     $newUser->name = "Vinicius Jr nº $rand";
    //     $newUser->email = "vinijr$rand@teste.com";
    //     $newUser->password = Hash::make('12345');
    //     $newUser->save();

    //     return $newUser;
    // }
}
