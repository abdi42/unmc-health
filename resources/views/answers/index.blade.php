@extends('layouts.master')

@section('content')
    <title>Answers</title>
    <h1>Answers</h1>
    @foreach($answers as $answer)

        <a href="/answers/{{ $answer->id }}">{{ $answer->answer }}</a>



        <hr>
    @endforeach

@endsection