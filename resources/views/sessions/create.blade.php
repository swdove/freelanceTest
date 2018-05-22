@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Sign In</h1>
        <form method="POST" action="{{ url('login')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" class="form-control" required></input>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required></input>
            </div>                           
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            @include('layouts.errors')
        </form>
    </div>

@endsection