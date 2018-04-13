@extends('layouts.master')

@section('content')
<div class="container">
    @forelse($threads as $thread)
    <div class="card mb-3">
        <div class="card-header">
            <div class="level">    
                <h4 class="flex">
                    <a href="{{ $thread->path() }}">
                        @if (auth()->check() && $thread->hasUpdatesFor(auth()->user()))
                            <strong>{{ $thread->title }} <span class="fa fa-commenting"></span></strong>
                        @else
                            {{ $thread->title }}
                        @endif
                    </a>                        
                </h4>                
                <a href="{{ $thread->path() }}">
                    <strong>{{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count )}}</strong>
                </a>
            </div>                       
        </div>                
        <div class="card-body">           
            <div class="card-body">
                <p class="card-text">{{ $thread->body }}</p>
            </div>    
        </div>                                
    </div>
    @empty
        <p>There are no relevant results</p>
    @endforelse
</div>
@endsection