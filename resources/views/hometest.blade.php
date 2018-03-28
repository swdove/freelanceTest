@extends('layouts.app')

@section('content')
<h1>Home</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi perferendis, maxime quas cumque ipsam accusantium voluptas unde rem doloribus explicabo iste quo! Mollitia, asperiores quaerat excepturi dolore incidunt corrupti quia.</p>
@endsection

@section('sidebar')
    @parent
    <p>This is appended to the sidebar.</p>
@endsection