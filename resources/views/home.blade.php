@extends('layouts.app')

@section('content')

<x-header />

<main class="slider">
    <div id="carousel-exampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <?php
            echo '<div class="carousel-inner" role="listbox">';
            $index = 1;
            foreach ($events as $event) {
                if ($event->carousel === 1 && $event->date_time > now()) {
                    if ($index === 1) {
                        echo '<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">';
                            echo '<div class="carousel-inner innerNewSize">';
                            echo '<div class="carousel-item active">';
                    } 
                    else 
                    {
                        echo '<div class="carousel-item">';
                    }
                    echo '<img class="slide-img" src="' . $event['image'] . '" />';
                    echo '<div class="carousel-caption">';
                    echo '<h5 class="title-slide">' . $event['title'] . '</h5>';
                    echo '<a class="btn btn-sm more" role="button" href="' . route('show', ['id'=>$event->id, 'user_count'=>$event->user_count, 'ifSubscripted'=>$event->ifSubscripted]) . '">More info</a>';
                    
                    echo '</div>';
                    echo '</div>';
                    $index++;
                }
            }
        ?>
    </div>
</main>
<div>
    <ul class="nav nav-pills mb-3 mt-3 eventsNav" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link botonNav allEv-link active" id="pills-home-tab " data-bs-toggle="pill" data-bs-target="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Next Events</a>
        </li>
        
        <li class="nav-item myEv-link" role="presentation">
            @if (Auth::user())
                <a class="nav-link botonNav" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">My Events</a>
            @endif
        </li>
        
        <li class="nav-item" role="presentation">
            <a class="nav-link botonNav pastEv-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Past Events</a>
        </li>
    </ul>
</nav>

<div class="container">
    <x-buttonCreate />
    <section class="allEvents">
        <x-allevents :events="$events" :myeventuser="$myeventuser"/>
    </section>
    <section class="myEvents hide">
        <x-myevents :events="$events" :myeventuser="$myeventuser"/>
    </section>
    <section class="pastEvents hide">
        <x-pastevents :events="$events" :myeventuser="$myeventuser"/>
    </section>
</div>

<x-footer />

@endsection
