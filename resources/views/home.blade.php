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
                echo '</div>';//Caption
            echo '</div>';//ITEM
            $index++;
            }
        } 


    ?>
    <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
</div>

</main>

<?php

$show = null;

?>

<div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" wire:click="$set('show', 1)" href="#">Next events</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" wire:click="$set('show', 2)" href="#">My events</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" wire:click="$set('show', 3)" href="#">Past events</a>
        </li>
    </ul>
</div>

<div class="container">
    
    @if ($show == null || $show === 1)
        <x-allevents :events="$events"/>
    @endif

    @if ($show === 2)
        <x-myevents/>
    @endif
    
    @if ($show === 3)
        <x-pastevents/>
    @endif
    
    <section class="asistiras"></section>
    <section class="pasados"></section>
</div>

@endsection