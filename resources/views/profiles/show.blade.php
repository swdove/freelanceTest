@extends('layouts.master')

@section('content')
<div class="container">
    <div class="col-md-10 offset-md-1">
        <div class="page-header">
                <h1>
                    {{ $profileUser->name }}
                    <small>Since {{ $profileUser->created_at->diffForHumans() }}</small>
                </h1>
                @can ('update', $profileUser)
                    <form method="POST" action="{{ route('avatar', $profileUser) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="avatar">
                        <button type="submit" class="btn btn-default">Add Avatar</button>
                    </form>
                @endcan
                <img src="/storage/{{ $profileUser->avatar() }}" width="100" height="100">
            </div>
            @forelse ($activities as $date => $activity)
                <h3 class="page-header">{{ $date }}</h3>
                @foreach ($activity as $record)
                    @isset($record->subject)
                        @if (view()->exists("profiles.activities.{$record->type}"))
                            @include ("profiles.activities.{$record->type}",['activity' => $record])
                        @endif
                    @endif
                @endforeach
            @empty
                <p>There is no activity for this user yet.</p>
            @endforelse
            {{-- {{ $threads->links() }} --}}
    </div>
</div>
@endsection