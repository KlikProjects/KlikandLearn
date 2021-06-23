<?php

namespace Tests\Feature\events;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeListEventTest extends TestCase
{
    //vaciar todas las db primero
    use RefreshDatabase;

    public function test_AnyUserCanSeeListEventsFutur()
    {

        //crear 2 Eventos en la db con factoria
        $events=Event::factory(2)->create();
        
        //when SUT llamar una ruta (web.php)
        $response = $this->get(route('home'));

        //then
        $response->assertStatus(200)
                 ->assertViewIs('home')
                    ->assertSee($events[0]->title)
                    ->assertSee($events[1]->title);

    }
}
