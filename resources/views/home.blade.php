@extends('layouts.app')

@section('content')

<x-header/>

<main class="slider">

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->

    <?php
        echo '<div class="carousel-inner" role="listbox">';

        $index=1;
        foreach ($events as $event){
            if ($event->carousel === 1 && $event->date_time > now()){

            
            if ($index === 1) {
                echo '<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">';
                    echo '<div class="carousel-inner">';
                        echo '<div class="container carousel-item active">';
            } else {
                echo '<div class="container carousel-item">';
            }
            echo '<img class="slide-img" src="' . $event["image"] . '"/>';
                echo '<div class="carousel-caption" >';
                    echo '<h5 class="title-slide"> <span class="div-title">' . $event["title"] . '</span> </h5>';
                    echo '<a class="btn btn-sm btn-light" href="' . route('show.show',$event->id) . '"><i class="fa fa-fw fa-eye"></i>🏷️CLICK TO SHOW 🏷️</a>';
                    echo '</div>';
                echo '</div>';
            $index++;
        
            }
        } 
    ?>
    <!-- Controls -->
{{--         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button> --}}
</div>

</main>

<nav>
    {{-- <ul class="nav nav-tabs" id="eventsNav">
        <li class="nav-item">
            <a class="nav-link allEv-link active" aria-current="page" href="#eventsNav">Next events</a>
        </li>
        @if (Auth::user())
            <li class="nav-item">
                <a class="nav-link myEv-link" href="#eventsNav">My events</a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link pastEv-link" href="#eventsNav">Past events</a>
        </li>
    </ul> --}}

    <ul class="nav nav-pills mb-3 mt-3 eventsNav" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link allEv-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Next Events</a>
        </li>
        
        <li class="nav-item myEv-link" role="presentation">
            @if (Auth::user())
                <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">My Events</a>
            @endif
        </li>
        
        <li class="nav-item" role="presentation">
            <a class="nav-link pastEv-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Past Events</a>
        </li>
    </ul>
</nav>

<div class="container">
    <x-buttonCreate/> 
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

@endsection