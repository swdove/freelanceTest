@extends ('layouts.master')

@section('content')
    <div class="col-sm-8">
        <h1>Create Post</h1>
        <form method="POST" action="{{ url('posts')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>
            @include('layouts.errors')
        </form>
    </div>
@endsection