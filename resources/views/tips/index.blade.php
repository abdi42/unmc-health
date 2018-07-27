@extends('layouts.master')

@section('content')

    @foreach($tips as $tip)
        <br><p><b>Motivational Tip</b></p>
        <a href="/tips/{{$tip->id}}">{{ $tip->content }}</a>
        <hr>
    @endforeach

    @endsection