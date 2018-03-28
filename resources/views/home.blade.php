@extends('layouts.master')

@section('content')
<div class="col-sm-8 blog-main">
    <div class="card">
        <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if (Auth::check())
                You are logged in!
                @else
                You are not logged in.
                @endif
            </div>
    </div>
</div>
@endsection
