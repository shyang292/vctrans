<?php

namespace Tests\Unit;

use App\Notification;
use App\TransactionLog;
use Tests\ModelTestCase;

class TransactionLogTest extends ModelTestCase
{

    public function test_model_configuration()
    {
        $this->runConfigurationAssertions(new TransactionLog(), [
            'sender', 'receiver', 'number',
        ]);
    }

}
