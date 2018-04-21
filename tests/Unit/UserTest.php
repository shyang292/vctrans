<?php
namespace Tests\Unit;
use App\User;
use Tests\TestCase;
class UserTest extends TestCase
{
    public function test_model_configuration()
    {
        $this->runConfigurationAssertions(new User(), [
            'name', 'email', 'password',
        ], [
            'password', 'remember_token',
        ]);
    }
}