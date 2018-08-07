@extends('layouts.master')

@section('content')

    @foreach($answers as $answer)

        <a href="/answers/{{ $answer->id }}">{{ $answer->answer }}</a>



        <hr>
    @endforeach

@endsection