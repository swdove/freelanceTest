@extends('layouts.master')

@section('content')
<div class="container">
    <div class="col-md-10 offset-md-1">
        <div class="page-header">
                <h1>
                    {{ $profileUser->name }}
                    <small>Since {{ $profileUser->created_at->diffForHumans() }}</small>
                </h1>
            </div>
            @foreach ($activities as $date => $activity)
                <h3 class="page-header">{{ $date }}</h3>
                @foreach ($activity as $record)
                    @isset($record->subject)
                        @include ("profiles.activities.{$record->type}",['activity' => $record])
                    @endif
                @endforeach
            @endforeach
            {{-- {{ $threads->links() }} --}}
    </div>
</div>
@endsection