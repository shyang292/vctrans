<?php

namespace Tests\Unit\Http\Controllers;

//use App\Events\CityShown;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\RedirectResponse;
use Mockery as m;
use App\TransactionLog;
use App\User;
use Illuminate\Database\Connection;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\ParameterBag;
use Tests\TestCase;
use Illuminate\Http\Request;
use App\Http\Controllers\TransactionLogController;

class TransactionLogControllerTest extends TestCase
{
    /**
     * @var \Mockery\Mock|\Illuminate\Database\Connection
     */
    protected $db;

    /**
     * @var \Mockery\Mock|App\City
     */
    protected $userMock;


    public function test_index_returns_view()
    {
        $controller = new TransactionLogController();
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $view = $controller->index();

        $this->assertEquals('backend.transferlog', $view->getName());
        $this->assertArrayHasKey('results', $view->getData());
    }



    public function test_it_stores_new_transactionLog()
    {
        $controller = new TransactionLogController();

        $data = [
            'sender' => ['name' => 'Allen'],
            'receiver' => ['grace', 'ethan'],
            'number'=> [2, 3],
        ];

        $response = $this->call('POST', 'transferlog', $data);
        $res = json_decode($response ->getContent(), true);

        $this->assertEquals(302, $response->getStatusCode());
        $this->followingRedirects();
    }

}
