<?php

namespace Tests\Feature\Api;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventListTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_CheckIfEventsAreListedInJsonFile()
    {
        $event = Event::factory(2)->create();

        $response = $this->get('/api/events');

        $response->assertStatus(200)
                ->assertJsonCount(2);
    }

    public function test_CheckIfSubscribedUsersAreListed()
    {
        $event = Event::factory()->create();
        $users = User::factory(2)->create();

        $event->user()->attach($users);

        $response = $this->get('/api/events/1/subscribers');
        
        $response->assertStatus(200)
                ->assertJsonCount(2);
    }
}
