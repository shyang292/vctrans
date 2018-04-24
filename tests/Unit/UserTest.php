<?php

namespace Tests\Unit;

use App\Notification;
use App\User;
use Tests\ModelTestCase;

class UserTest extends ModelTestCase
{

    public function test_model_configuration()
    {
        $this->runConfigurationAssertions(new User(), [
            'name', 'email', 'password',
        ], [
            'password', 'remember_token',
        ]);
    }

    public function test_user_relation()
    {
        $m = new User();
        $r = $m->notifications();
        $this->assertHasManyRelation($r, $m, new Notification());
    }
}
