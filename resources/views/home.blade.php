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

<div>
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">Next events</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="#">My events</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Past events</a>
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
                            
                            <p>{{$event->users_max}} max users</p>
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