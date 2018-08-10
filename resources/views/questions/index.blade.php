@extends('layouts.master')

@section('content')
<title>Questions</title>
<h1>Questions</h1>
@foreach($questions as $question)

     <p>Question :</p>
    <a href="{{ '/questions/'.$question->id }}">{{ $question->question }}</a>

     <br> <p> <br>Question type:</p>
      {{ $question->question_type }}
    <hr>

@endforeach

@endsection