@extends('layouts.master')

@section('content')
<div class="container">
    <div class="col-md-10 offset-md-1">
        <div class="page-header">
            <avatar-form :user="{{ $profileUser }}"></avatar-form>
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