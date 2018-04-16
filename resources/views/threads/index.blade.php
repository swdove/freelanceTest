@extends('layouts.master')

@section('content')
<div class="container">
    @include('threads._list')

    {{ $threads->render() }}
</div>
@endsection