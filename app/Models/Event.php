<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_time',
        'title',
        'image',
        'users_max',
        'description',
        'carousel',
        'ifSubscripted'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    static function ifSubscript($events, $myeventuser)
    {
        foreach ($events as $event) {
            foreach ($myeventuser as $myevent){

                if ($event->id === $myevent->id){
                    $event->ifSubscripted = "1";
                }
            }    
        }
        return ($events);
    }

    static function totaluserInscript($events)
    {
        $events=Event::withCount('user')->get();
        
        return ($events);
    }

    static function checkEventVacancy($event) {
        
        $usercount = Event::totaluserInscript($event);

        foreach ($usercount as $item) {

            if ($item->id === $event->id) {                
                $usercount = $item->user_count;
                return $usercount;
            }
        }
    }

    static function checkInscription($user, $event) {

        foreach ($user->event as $inscribedEvent) {

            if ($event->id === $inscribedEvent->id) {
                $inscribed = true;
                return $inscribed;
            }
        }
    }
}
