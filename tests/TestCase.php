<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function cleanUsersTest() {
        $users = User::all();
        if($users->count() > 0) {
            foreach($users as $user) {
                $user->delete();
            }
        }

    }
}
