<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    private $path = '/api/users';

    public function test_show_user()
    {
        $user = User::factory()->create();

        $response = $this->getJson($this->path . '/' .  $user->getRouteKey());
        $response->assertOk();
        $response->assertJsonFragment($user->toArray());
    }

    public function test_update_user()
    {
        $user = User::factory()->create();
        $newDataUser = User::factory()->make();

        $response = $this->putJson($this->path . '/' . $user->getRouteKey(), $newDataUser->toArray());
        $response->assertOk();
        $response->assertJsonFragment($newDataUser->toArray());
    }

    public function test_list_user()
    {
        User::factory()->count(10)->create();

        $response = $this->get($this->path);
        $response->assertOk();
        $response->assertJsonCount(10);
    }

    public function test_delete_user()
    {
        $user = User::factory()->create();
        $this->delete($this->path . '/' . $user->getRouteKey())
            ->assertNoContent();

        $this->assertDatabaseCount('people', 0);
    }

}
