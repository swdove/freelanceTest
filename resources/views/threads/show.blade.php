@extends('layouts.master')
@section('header')
    <link rel="stylesheet" href="/css/vendor/jquery.atwho.css">
    <script>
        window.thread = <?= json_encode($thread); ?>
    </script>
@endsection
@section('content')
<thread-view :thread="{{ $thread }}" inline-template>
<div class="container">
    <div class="row">
        <div class="col-md-8" v-cloak>
            <div class="row">
                @include ('threads._question')
            </div>
            <div class="row">
                <div class="col-md-12">                      
                    <replies @removed="repliesCount--" @added="repliesCount++"></replies>
                </div> 
            </div>
        </div>  
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-text">This thread was published  {{ $thread->created_at->diffForHumans() }} by 
                    <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a> and currently has <span v-text="repliesCount"></span> comments.</p>
                    <subscribe-button :active="{{ json_encode($thread->isSubscribedTo) }}" v-if="signedIn"></subscribe-button>
                    <button class="btn btn-default" v-if="authorize('isAdmin')" @click="toggleLock" v-text="locked ? 'Unlock' : 'Lock'">Lock</button>
                </div>
            </div>           
        </div>
    </div>
</div>
</thread-view>
@endsection