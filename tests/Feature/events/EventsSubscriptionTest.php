<?php

namespace Tests\Feature\events;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;

class EventsSubscriptionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_NotLoggedUserCantInscribe()
    {
        $event = Event::factory()->create();
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
