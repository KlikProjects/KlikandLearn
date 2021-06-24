<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\Attributes\Node\Attributes;
use Facade\FlareClient\View;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $events = Event::all()
            ->sortBy('date_time');

        $myeventuser = [];    
            if (Auth::user()){
                $user=Auth::user();
                $myeventuser = $user->event;
            }
            
        $events = Event::totaluserInscript($events);
        $events = Event::ifSubscript($events,$myeventuser);
        
        //dd($events);
        return view('home', compact('events', 'myeventuser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventforms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        if ($request->newcarousel != 'on') {
            $request->newcarousel = "0";
        }
        if ($request->newcarousel == 'on') {
            $request->newcarousel = "1";
        }

        /* $request->ifSubscripted = "0"; */
        /* dd($request); */
    
        $event = Event::create([
            'date_time' => $request->newdatetime,
            'title' => $request->newtitle,
            'description' => $request->newdescription,
            'image' => $request->newimage,
            'users_max' => $request->newusermax,
            'carousel' => $request->newcarousel,
            'ifSubscripted' => $request->ifSubscripted,
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);

             $myeventuser = [];    
            if (Auth::user()){
                $user=Auth::user();
                $myeventuser = $user->event;
            }
     
        /* $event = Event::totaluserInscript($event); */
        /* $event = Event::ifSubscript($event,$myeventuser); */
        /* dd($event); */
        return view('eventforms.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
       

        return view('eventforms.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->newcarousel != 'on') {
            $request->newcarousel = "0";
        }
        if ($request->newcarousel == 'on') {
            $request->newcarousel = "1";
        }

        $event = Event::whereId($id);
        $event->update([
            'date_time' => $request->newdatetime,
            'title' => $request->newtitle,
            'description' => $request->newdescription,
            'image' => $request->newimage,
            'users_max' => $request->newusermax,
            'carousel' => $request->newcarousel,
        ]);

/*         $input = Input::all();
        $input['plannedTime'] = date('Y-m-d H:i:s', strtotime(Input::get('plannedTime'))); */

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $event = Event::find($id)->delete();

        return redirect()->route('home')
            ->with('success', 'Event deleted successfully');
    }

    public function inscribe($id)
    {
        $user = User::find(Auth::id());
        $event = Event::find($id);
        $inscribed = Event::checkInscription($user, $event);
        $usercount = Event::checkEventVacancy($event);
        
        if ($usercount < $event->users_max && $inscribed === false) {
            $user->event()->attach($event);
        }
        
        return redirect()->route('home');
    }

    public function cancelInscription($id)
    {
        $user = User::find(Auth::id());
        $event = Event::find($id);
        
        $user->event()->detach($event);
        
        return redirect()->route('home');
    }

 /*    public function viewSignedUp()
    {
        $user=Auth::user();

        $myeventuser = $user->event;

        return view('home', ['event_user' => $myeventuser]);
    }
 */


}
