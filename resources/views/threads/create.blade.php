@extends('layouts.master')

@section ('header')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')
<div class="container">
    <h2>Create a New Thread</h2>
    <div>
        <form method="POST" action="/threads">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="channel_id">Choose a Channel</label>
                <select class="form-control" name="channel_id" id="channel_id" required>
                    <option value="">Choose one...</option>
                    @foreach ($channels as $channel)
                        <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : ''}}>{{ $channel->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title')}}" required>
            </div>
            <div class="form-group">
                <label for="body">Body:</label>
                <textarea class="form-control" id="body" name="body" placeholder="Body" rows="8" value="{{ old('body')}}" required></textarea>
            </div>
            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6Lcgj1QUAAAAABNUYEO1e1RBI3AWQvi8rScLNqcF"></div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info">Publish</button>              
            </div>
        </form>
        @if(count($errors))
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
@endsection