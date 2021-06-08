@extends('layouts.app')



@section('content')

<div class="card" style="width: 50rem;">
    <img class="card-img-top" src="{{$event->image}}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">{{$event->title}}</h5>
        <p class="card-text">{{$event->date_time}}</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">{{$event->description}}</li>
        <li class="list-group-item">{{$event->users_max}} participantes</li>
    </ul>
    <div class="card-body">
        <a href="#" class="card-link">Inscribirse</a>
    </div>
    <div class="float-right">
        <a class="btn btn-primary" href="{{ route('home') }}">↩️</a>
    </div>
</div>

@endsection