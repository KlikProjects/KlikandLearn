{{-- @props (["myeventuser" => $myeventuser])  --}}


    @foreach ($myeventuser as $event)
        @if ($event->date_time > now())
            <div class="line"></div>
            <article class="eventContainer">
                <div class="eventInfo">
                    <div class="dateAndUsers">
                        <p>{{$event->date_time}}  </p>  
                        <p>✅</p>
                        @if ($event->user_count === $event->users_max)
                            <p danger>COMPLETE</p>
                        @else
                            <p>{{$event->users_max-$event->user_count}}/{{$event->users_max}} free</p>
                        @endif
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
                    <button class="enrollBtn"><a href="{{ url('/cancelInscription', $event->id) }}">Cancel</a></button>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('events.show',$event->id) }}"><i class="fa fa-fw fa-eye"></i>🏷️</a>
                    </td>

                </div>

            </article>
        @endif 
    @endforeach