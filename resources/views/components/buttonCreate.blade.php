@if (Auth::check() && Auth::user()->isAdmin)

<div class="containerNewEvent">
    <button class="buttonCreate">
        <a class="linkCreate" href="{{ route('createEvent') }}">
            <img src="img/buttonCreate2.png" class="imgButton" alt=""/> 
        </a>
    </button>
    <a class="linkCreate" href="{{ route('createEvent') }}">
        <p class="txtNewEvent">CREATE NEW EVENT</p>
    </a>
</div>
</a>
@endif