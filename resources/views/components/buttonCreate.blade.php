@if (Auth::check() && Auth::user()->isAdmin)
<div class="containerNewEvent">
    <button class="buttonCreate">
        <a href="{{ route('createEvent') }}">
            <img src="img/buttonCreate2.png" class="imgButton" alt=""/> 
        </a>
    </button>
    <p class="txtNewEvent">CREATE NEW EVENT</p>
</div>
<div class="line"></div>
@endif