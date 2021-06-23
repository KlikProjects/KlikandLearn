<?php

namespace Tests\Feature\events;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventsSubscriptionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_NpLoginUderCanNotInscription()
    {
        $event=Event::factory()->create();
        
        $response = $this->get(route('inscribe',$event->id));

        $response->assertStatus(302)
                ->assertRedirect("/login");
                


    public function test_UserAuthCanInscription()
    {
        $event=Event::factory()->create();
        $user=User::factory()->create();
        
        $this->actingAs($user);

        $response = $this->get(route('inscribe',$event->id));

        $this->assertEquals($user->id,$event->user[0]->id);

        
                
    public function test_NotLoggedUserCantInscribe()
    {
        $event = Event::factory()->create();
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
