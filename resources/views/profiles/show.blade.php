@extends('layouts.master')

@section('content')
<div class="container">
    <div class="col-md-8 offset-md-2">
        <div class="page-header">
                <h1>
                    {{ $profileUser->name }}
                    <small>Since {{ $profileUser->created_at->diffForHumans() }}</small>
                </h1>
            </div>
            @foreach($threads as $thread)
            <div class="card border-primary mb-3">
                <div class="card-header">
                    <div class="level">
                        <span class="flex">
                            <h4 class="card-title">
                                <a href="{{ $thread->path() }}">{{ $thread->title }}</a>
                            </h4>                            
                        </span>
                        <span>
                            {{ $thread->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $thread->body }}</p>
                </div>
            </div>   
            @endforeach
            {{ $threads->links() }}
    </div>
</div>
@endsection