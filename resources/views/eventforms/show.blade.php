@extends('layouts.app')

@section('content')
<x-header/>
<div class="card-body">
    <div class="card" >
        <img class="card-img-top w-100"  src="{{$event->image}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$event->title}}</h5>
            <p class="card-text">{{$event->date_time}}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item cardDescriptionText">{{$event->description}}</li>
            <li class="list-group-item cardAttendees"><p>{{$event->users_max}} participantes</li>
        </ul>
        <div class="card-body">
            <a href="#" class="card-link btn-outline-success">Subscribe</a>
            <h5 class="card-title cardTitle">{{$event->title}}</h5>
            <p class="card-text cardDateText">{{$event->date_time}}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item cardDescriptionText">{{$event->description}}</li>
            <li class="list-group-item card cardAttendees">{{$event->users_max}} participantes</li>
        </ul>
        <div class="card-body">
            <a href="#" class="card-link">Subscribe</a>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('home') }}">↩️</a>
        </div>
    </div>
</div>

@endsection