@if (Auth::check() && Auth::user()->isAdmin)
<a class="linkCreate" href="{{ route('createEvent') }}">
<div class="containerNewEvent">
    <button class="buttonCreate">
        {{-- <a href="{{ route('createEvent') }}"> --}}
            <img src="img/buttonCreate2.png" class="imgButton" alt=""/> 
        {{-- </a> --}}
    </button>
    <p class="txtNewEvent">CREATE NEW EVENT</p>
</div>
</a>
@endif