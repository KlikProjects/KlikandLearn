@extends('layouts.app')

@section('content')

<div class="slider"></div>

<div class="container">
    <section class="allevents">
        
        dd({{ $slot }})

        @foreach ($events as $event)
        <article class="eventContainer">
            <div class="eventInfo">
                <div class="dateAndUsers">
                    <p>{{$event->date_time}}</p>  
                    <p>{{$event->users_max}} participantes</p>
                </div>
                
                <div class="titleAndDesc">
                    <h3 class="eventTitle">{{$event->title}}</h3>
                    <p class="eventDescription">{{$event->description}}</p>
                </div>
            </div>

            <div class="imgBtnContainer">
                <figure>
                    <img src="https://i1.wp.com/discordemoji.com/assets/emoji/3853_jerryEh.png{{-- {{$event->image}} --}}" alt="">
                </figure>
                <button class="enrollBtn">Inscribirme</button>
            </div>
        </article>
        <div class="line"></div>
        @endforeach

    </section>
    <section class="asistiras"></section>
    <section class="pasados"></section>
</div>

@endsection