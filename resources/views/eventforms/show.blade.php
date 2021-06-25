@extends('layouts.app')

@section('content')
<x-header/>
{{-- @dd($event) --}}
<div class="card-body">
    <div class="card" >
        <img class="card-img-top w-100"  src="{{$event->image}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$event->title}}</h5>
            <p class="card-text">{{$event->date_time}}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item cardDescriptionText">{{$event->description}}</li>
            <li class="list-group-item cardAttendees"><p>
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
        <div class="card-body">
            {{-- <a href="#" class="card-link btn-outline-success">Subscribe</a> --}}
            @if ($event->date_time > now())
                @if ($event->ifSubscripted === "1")
                    <button class="enrollBtn"><a href="{{ url('/cancelInscription', $event->id) }}">Cancel</a></button>
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