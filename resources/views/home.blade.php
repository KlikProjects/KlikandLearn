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
                echo '<div class="carousel-item active">';
            } else {
                echo '<div class="carousel-item">';
            }
            echo '<img class="d-block w-100" src="' . $event["image"] . '"/>';
                echo '<div class="carousel-caption" >';
                        echo '<h5 class="text-dark" >' . $event["title"] . '</h5>';
                        echo '<a class="btn btn-sm btn-primary" href="' . route('show.show',$event->id) . '"><i class="fa fa-fw fa-eye"></i>🏷️ SHOW 🏷️</a>';
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

<div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link allEv-link active" aria-current="page" href="#">Next events</a>
        </li>
        <li class="nav-item">
            <a class="nav-link myEv-link" href="#">My events</a>
        </li>
        <li class="nav-item">
            <a class="nav-link pastEv-link" href="#">Past eventss</a>
        </li>
    </ul>
</div>



<div class="container">
    <section class="allEvents">
        <x-allevents :events="$events"/>
    </section>
    <section class="myEvents">
        <x-myevents/>
    </section>
    <section class="pastEvents">
        <x-pastevents :events="$events" />
    </section>
</div>

@endsection