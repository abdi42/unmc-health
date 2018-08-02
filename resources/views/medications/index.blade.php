@extends('layouts.master')

@section('content')

    @foreach($subjects as $subject)

        <a href="/medications/{{ $subject->subject }}">{{ $subject->subject }}</a>



        <hr>
    @endforeach

@endsection