@extends('layouts.master')
@section('header')
    <link rel="stylesheet" href="/css/vendor/jquery.atwho.css">
@endsection
@section('content')
<thread-view :initial-replies-count="{{ $thread->replies_count }}" inline-template>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="card mb-3" style="width: 100%;">
                    <div class="card-header">
                        <div class="level">
                            <img src="{{ $thread->creator->avatar_path }}" width="75" height="75" class="mr-2">
                            <span class="flex">                                                              
                                <h3 class="card-title"><a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a> posted: {{ $thread->title }}</h3>
                            </span>
                            @can ('update', $thread)
                            <form action="{{ $thread->path() }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-link">Delete Thread</button>
                            </form>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $thread->body }}</p>
                    </div>
                </div>  
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">                      
                    <replies @removed="repliesCount--" @added="repliesCount++"></replies>
                </div> 
            </div>
        </div>  
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-text">This thread was published  {{ $thread->created_at->diffForHumans() }} by 
                    <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a> and currently has <span v-text="repliesCount"></span> comment.</p>
                    <subscribe-button :active="{{ json_encode($thread->isSubscribedTo) }}"></subscribe-button>
                </div>
            </div>           
        </div>
    </div>
</div>
</thread-view>
@endsection