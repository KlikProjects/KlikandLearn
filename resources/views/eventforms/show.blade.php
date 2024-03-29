@extends('layouts.app')

@section('content')
<x-header/>
<div class="card-body">
    <div class="card" >
        <img class="card-img-top imgShow"  src="{{$event->image}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title titulo">{{$event->title}}</h5>
            <div class="line"></div>
            <p class="card-text date">{{$event->date_time}}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item cardDescriptionText">{{$event->description}}</li>
            <li class="list-group-item cardAttendees">
                        @if ($event->ifSubscripted === "1")
                            <p>✅ Subscripted</p>
                        @endif
                        @if ($event->user_count == $event->users_max)
                            <p class="text-danger fw-bold">EVENT FULL</p>
                        @else
                            <p>{{$event->users_max-$event->user_count}}/{{$event->users_max}} free</p>
                        @endif
                        </li>
        </ul>
        <div class="card-body buttonShow">
            @if ($event->date_time > now())
                @if ($event->ifSubscripted === "1")
                    <button class="enrollBtn"><a href="{{ url('/cancelInscription', $event->id) }}">Unsubscribe</a></button>
                @else
                    <button class="enrollBtn"><a href="{{ url('/inscribe', $event->id) }}">Inscribe</a></button>
                @endif

            @endif
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('home') }}">↩️</a>
        </div>
    </div>
</div>

@endsection