{{-- @props (["events" => $events , "myeventuser" => $myeventuser]) --}}

    @foreach ($events as $event)
        @if ($event->date_time > now())
            <div class="line"></div>
            <article class="eventContainer">
                <div class="eventInfo">
                    <div class="dateAndUsers">
                        <p class="dateAndTime">{{$event->date_time}}  </p> 
                        {{-- $event->IamSuscripted --}}
                        <div class="usersAmount">
                        @foreach ($myeventuser as $myevent)
                            @if ($event->id === $myevent->id)
                                <p>✅</p>
                            @endif
                        @endforeach
                            <p>{{$event->users_max}} participantes</p>
                        </div>
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
                
                <?php
                    $inscription = false;
                ?>

                @foreach($myeventuser as $myevent)
                    @if($event->id === $myevent->id)
                        <?php 
                            $inscription = true 
                        ?>
                    @endif
                @endforeach

                @if($inscription === true) 
                    <button class="enrollBtn"><a href="{{ url('/cancelInscription', $event->id) }}">Cancel</a></button>
                @else
                    <button class="enrollBtn"><a href="{{ url('/inscribe', $event->id) }}">Inscribe</a></button>
                @endif

                <td>
                    <form class="adminButtons" action="{{ route('events.destroy',$event->id) }}" method="POST">
                        <a class="btn btn-sm btn-primary" href="{{ route('show.show', $event->id) }}"><i class="fa fa-fw fa-eye"></i>🏷️</a>
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
@endif 
@endforeach
