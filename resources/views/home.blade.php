@extends('layouts.app')

@section('content')

<x-header/>

<main class="slider">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Vaporwave-4K-Wallpapers.jpg/1200px-Vaporwave-4K-Wallpapers.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://i.blogs.es/cfa482/illusion_1440x900/1366_2000.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Vaporwave-4K-Wallpapers.jpg/1200px-Vaporwave-4K-Wallpapers.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
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

<div>
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">Active</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
  </ul>
</div>

<div class="container">
    <section class="allevents">

        @foreach ($events as $event)
            @if ($event->date_time > now())
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
                            <img class="imgEvents" src="{{$event->image}}" alt="">
                        </figure>
                        <button class="enrollBtn">Inscribirme</button>

                        <td>
                            <form action="{{ route('events.destroy',$event->id) }}" method="POST">
                                <a class="btn btn-sm btn-primary" href="{{ route('show.show',$event->id) }}"><i class="fa fa-fw fa-eye"></i>🏷️</a>
                                @if(Auth::check())
                                    @if (Auth::user()->isAdmin)
                                        <a class="btn btn-sm btn-success" href="{{ route('events.edit',$event->id) }}"><i class="fa fa-fw fa-edit"></i>✏️</a>
                                    
                                    @csrf
                                    
                                    @method('DELETE')
                                    
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>❌</button>    
                                    @endif
                                @endif
                                
                            </form>
                        </td>

                    </div>

                </article>
                
        <div class="line"></div>
        @endif
        @endforeach

    </section>
    <section class="asistiras"></section>
    <section class="pasados"></section>
</div>

@endsection