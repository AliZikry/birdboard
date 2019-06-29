<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null)
    {
        //sign a user ..and if there is no one just create one
        $this->actingAs($user ?: factory('App\User')->create());
    }
}
