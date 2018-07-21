@extends('layouts.master')

@section('content')

    @foreach($tips as $tip)
        <p><b>Motivational Tip</b></p>
        <a href="/tips/{{$tip->id}}">{{ $tip->content }}</a>

    @endforeach

    @endsection