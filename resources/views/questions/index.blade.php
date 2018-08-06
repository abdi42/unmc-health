@extends('layouts.master')

@section('content')

@foreach($questions as $question)

     <p>Question :</p>
    <a href="{{ '/questions/'.$question->id }}">{{ $question->question }}</a>

     <br> <p> <br>Question type:</p>
      {{ $question->question_type }}
    <hr>

@endforeach

@endsection