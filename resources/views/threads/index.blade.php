@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
                @include('threads._list')

                {{ $threads->render() }}
        </div>
        <div class="col-md-4">
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
        </div>
    </div>
</div>
@endsection