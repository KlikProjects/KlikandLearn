{{-- @props (["events" => $events , "myeventuser" => $myeventuser]) --}}

    @foreach ($events as $event)
        @if ($event->date_time > now())
            <article class="eventContainer">
                <div class="eventInfo">
                    <div class="dateAndUsers">
                        <p>{{$event->date_time}}  </p> 
                        

                        @if ($event->ifSubscripted === "1")
                            <p>✅</p>
                        @endif
                        
                        @if ($event->user_count === $event->users_max)
                            <p class="text-danger fw-bold">COMPLETE</p>
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
                
                @if ($event->ifSubscripted === "1" )
                    <button class="enrollBtn"><a href="{{ url('/cancelInscription', $event->id) }}">Cancel</a></button>
                @else
                    @if($event->user_count != $event->users_max)
                        <button class="enrollBtn"><a href="{{ url('/inscribe', $event->id) }}">Inscribe</a></button>
                    @endif
                @endif

                <td>
                    <form action="{{ route('events.destroy',$event->id) }}" method="POST">
                        <a class="btn btn-sm btn-primary" href="{{ route('show.show', $event->id) }}"><i class="fa fa-fw fa-eye"></i>🔍</a>
                        @if(Auth::check())
                            @if (Auth::user()->isAdmin)
                                <a class="btn btn-sm btn-success" href="{{ route('events.edit', $event->id) }}"><i class="fa fa-fw fa-edit"></i>✏️</a>
                            
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
