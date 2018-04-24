@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
                @include('threads._list')

                {{ $threads->render() }}
        </div>
        <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-header">
                    Search
                </div>
                <div class="card-body">
                    <form method="GET" action="/threads/search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search here" name="q">                            
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>            
            @if (count($trending))
            <div class="card">
                <div class="card-header">
                    Trending Threads
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($trending as $thread)                    
                            <li class="list-group-item">
                                <a href="{{ url($thread->path) }}">
                                    {{ $thread->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection