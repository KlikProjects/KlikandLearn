@extends('layouts.app')

@section('content')

<x-header />

<main class="slider">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

    <?php
    echo '<div class="carousel-inner" role="listbox">';
    $index = 1;
    foreach ($events as $event) {
    if ($event->carousel === 1 && $event->date_time > now()) {
    if ($index === 1) {
    echo '<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">';
        echo '<div class="carousel-inner">';
            echo '<div class="carousel-item active">';
                } else {
                echo '<div class="carousel-item">';
                    }
                    echo '<img class="slide-img" src="' . $event['image'] . '" />';
                    echo '<div class="carousel-caption d-flex">';
                        echo '<h5 class="title-slide"> <span class="div-title">' . $event['title'] . '</span> </h5>';
                        echo '<a class="btn btn-sm" href="' . route('show.show', $event->id) . '"><span class="more-info">More info</span></a>';
                        echo '</div>';
                    echo '</div>';
                    $index++;
    }
    }
?>
    </div>
{{--     <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button> --}}
</main>
<div>
    <ul class="nav nav-tabs" id="eventsNav">
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
    </ul>
</div>

<div class="container">
    <x-buttonCreate />
    <section class="allEvents">
        <x-allevents :events="$events" />
    </section>
    <section class="myEvents hide">
        <x-myevents :myeventuser="$myeventuser" />
    </section>
    <section class="pastEvents hide">
        <x-pastevents :events="$events" />
    </section>
</div>

@endsection
