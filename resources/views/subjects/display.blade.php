@extends('layouts.master')

@section('content')
    <title>Subjects</title>
    <h1>Subjects</h1>

    @foreach($subjects as $subject)
     <a href="/subjects/{{$subject->subject}}">{{ $subject->subject }}</a>
        <hr>
    @endforeach

@endsection