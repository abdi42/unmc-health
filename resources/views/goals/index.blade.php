@extends('layouts.master')

@section('content')

    @foreach($subjects as $subject)

        <a href="/goals/{{ $subject->subject }}">{{ $subject->subject }}</a>



        <hr>
    @endforeach

@endsection