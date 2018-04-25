<?php

namespace Tests\Unit\Http\Controllers;

//use App\Events\CityShown;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\RedirectResponse;
use Mockery as m;
use App\Notification;
use App\User;
use Illuminate\Database\Connection;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\ParameterBag;
use Tests\TestCase;
use Illuminate\Http\Request;
use App\Http\Controllers\NotificationController;

class NotificationControllerTest extends TestCase
{
    /**
     * @var \Mockery\Mock|\Illuminate\Database\Connection
     */
    protected $db;

    /**
     * @var \Mockery\Mock|App\City
     */
    protected $userMock;



    public function test_it_stores_new_notification()
    {
        $controller = new NotificationController();

        $data = [
            'user_id' => 1,
            'message' => 'grace send Allen 10 vc',
            'number'=> 10,
        ];

        $response = $this->call('POST', 'notification', $data);
        $res = json_decode($response ->getContent(), true);

        $this->assertEquals(302, $response->getStatusCode());
        $this->followingRedirects();
    }

}
