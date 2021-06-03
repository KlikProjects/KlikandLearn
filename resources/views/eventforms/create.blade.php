@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Aqui se crea un nuevo evento</p>
                    
                    <form class="justify-content-center" action="{{route('home')}}" method="post">
                    @csrf

                        <div class="form-group">
                            <span class="input-group-text">Date / Time</span>
                            <input class="form-control" type="datetime" name="newdatetime" required placeholder="Date / Time yyyy-mm-dd hh:mm">
                        </div>
                        
                        <div class="form-group">
                            <span class="input-group-text">Title</span>
                            <input class="form-control" type="text" name="newtitle" required placeholder="Title">
                        </div>

                        <div class="form-group">
                            <span class="input-group-text">Description</span>
                            <input class="form-control" type="text" name="newdescription" required placeholder="Description">
                        </div>


                        <div class="form-group">
                            <span class="input-group-text">Image</span>
                            <input class="form-control" type="text" name="newimage" required placeholder="url Image">
                        </div>
                        
                        <div class="form-group">
                            <span class="input-group-text">User Max</span>
                            <input class="form-control" type="int" name="newusermax" required placeholder="Max Users">
                        </div>
                        
                        <input class="btn-lg btn-outline-success go-add-task float" type="submit" value="Create">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection