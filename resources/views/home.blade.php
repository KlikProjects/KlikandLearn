@extends('layouts.app')

@section('content')

<x-header/>

<main class="slider"></div>

<div class="container">
    <section class="allevents">

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
                    <img src="{{$event->image}}" alt="">
                </figure>
                <button class="enrollBtn">Inscribirme</button>

                <td>
                    <form action="{{ route('events.destroy',$event->id) }}" method="POST">
                        <a class="btn btn-sm btn-primary" href="{{ route('events.show',$event->id) }}"><i class="fa fa-fw fa-eye"></i>Show</a>
                        <a class="btn btn-sm btn-success" href="{{ route('events.edit',$event->id) }}"><i class="fa fa-fw fa-edit"></i>Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>X</button>
                    </form>
                </td>

            </div>
        </article>
        <div class="line"></div>
        @endforeach

    </section>
    <section class="asistiras"></section>
    <section class="pasados"></section>
</div>

@endsection