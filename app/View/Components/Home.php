<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Event;

class Home extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $events = Event::all()
            ->sortBy('date_time');

        return view('components.home', ['events' => $events]);
    }
}
