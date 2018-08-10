@extends('layouts.master')

@section('content')
 <title>Motivational Tips</title>
 <h1>Motivational Tip</h1>
    @foreach($tips as $tip)
        <br><p><b>Motivational Tip</b></p>
        <a href="/tips/{{$tip->id}}">{{ $tip->content }}</a>
        <hr>
    @endforeach

    @endsection