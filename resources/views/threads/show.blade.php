@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card border-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $thread->title }}</h5>
                    <p class="card-text">{{ $thread->body }}</p>
                </div>
            </div>           
            
            @foreach ($replies as $reply)
                @include('threads.reply')
            @endforeach  
            
            {{ $replies->links() }}

            @if(auth()->check())
            <form method="POST" action="{{ $thread->path() . '/replies' }}"> 
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" id="body" class="form-control" placeholder="Whatcha thinkin'?" rows="5"></textarea>                
                </div>
                <button type="submit" class="btn btn-info">Post Reply</button>
            </form>
            @else
                <p class="text-center">Please <a href="{{ route('login' )}}">sign in</a> to participate in this discussion.</p>
            @endif
        </div>   
        <div class="col-md-4">
            <div class="card border-primary mb-3">
                <div class="card-body">
                    {{-- <h5 class="card-title"></h5> --}}
                    <p class="card-text">This thread was published  {{ $thread->created_at->diffForHumans() }} by 
                    <a href="#">{{ $thread->creator->name }}</a> and currently has {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count )}}.</p>
                </div>
                {{-- <div class="card-footer bg-transparent">
                </div> --}}
            </div>           
        </div>
    </div>
</div>
@endsection