@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div class="card">
                <div class="card-header">Forum Threads</div>   
                @foreach($threads as $thread)
                <div class="card-body">
                    <div class="level">    
                        <h4 class="flex">
                            <a href="{{ $thread->path() }}">
                                {{ $thread->title }}
                            </a>                        
                        </h4>                
                        <a href="{{ $thread->path() }}">
                            <strong>{{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count )}}</strong>
                        </a>
                    </div>              
                    <div class="card-body">
                        <p class="card-text">{{ $thread->body }}</p>
                    </div>    
                </div>
                @endforeach                     
            </div>
        </div>
    </div>
</div>
@endsection