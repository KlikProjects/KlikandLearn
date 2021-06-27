@extends('layouts.app')

@section('content')
<x-header/>
<div class="containerCreate">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2 class="cardTitle">Create a new event</h2>
                    <form class="justify-content-center" action="{{route('events.store')}}" method="post">
                    @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                            <input type="text" name="newtitle" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="title">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">User max</span>
                            <input type="text" name="newusermax" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="user max">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Date/time</span>
                            <input class="form-control" id="newdatetime" type="datetime-local" value="now" name="newdatetime">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
                            <input type="text" name="newdescription" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="description">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Image</span>
                            <input type="text" name="newimage" class="form-control subirFoto" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="url image">
                            <input class="subirFoto2" type="file" name="" id="">
                        </div>

                        <div class="form-check form-switch sliderCB">
                            <input class="form-check-input" name="newcarousel" type="checkbox" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Carousel</label>
                        </div>

                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('home') }}">↩️</a>
                        </div>
                        
                        <div class="btnCreate">
                            <button type="submit" class="btn btn-outline-success" value="Create">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
