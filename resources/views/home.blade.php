@extends('layouts.app')

@section('content')
<div class="slider"></div>

<div class="container">
    <section class="allevents">

        @foreach ($events as $event)
        <article>
            <div>
                <div>
                    <p>{{$event->date_time}}</p>  
                    <p>{{$event->users_max}}</p>
                </div>
                
                <div>
                    <h3>{{$event->title}}</h3>
                    <p>{{$event->description}}</p>
                </div>
            </div>

            <div>
                <figure>
                    <img src="{{$event->image}}" alt="">
                </figure>
                <button></button>
            </div>
        </article>
        @endforeach

    </section>
    <section class="asistiras"></section>
    <section class="pasados"></section>
</div>
@endsection
