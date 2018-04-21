<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\UserController;
class ExampleTest extends TestCase
{


    public function testRootPath(){
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testUnAuthAdminPath()
    {
        $response = $this->get('/home');
        $response->assertStatus(302);

        $response = $this->get('/transferVC');
        $response->assertStatus(302);

        $response = $this->get('/transferlog');
        $response->assertStatus(302);

        $response = $this->post('/transferlog');
        $response->assertStatus(302);
    }

    public function testAuthAdminPath(){
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get('/')
            ->assertSuccessful();

        $response = $this->actingAs($user)
            ->get('/home')
            ->assertSuccessful();

        $response = $this->actingAs($user)
            ->get('/transferVC')
            ->assertSuccessful();

        $response = $this->actingAs($user)
            ->get('/transferlog')
            ->assertSuccessful();

        $response = $this->actingAs($user)
            ->post('/transferlog')
            ->assertStatus(302);
    }





}
