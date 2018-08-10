@extends('layouts.master')

@section('content')
       <title>Answer</title>
       <h1>Answer</h1>

@for($i=0;$i<count($answers);$i++)
       <p><b>Answer ID:</b></p> {{ $answers['id'] }}

      <p><b>Question</b></p> {{ $answers['question']['question'] }}<br><br>



       <p><b>Answer</b></p> {{ $answers['answer'] }} <br><br>

       <a href="{{'/answers/'.$answers['id'].'/edit'}}"><button class="btn btn-primary">Edit</button></a><br><br>

       <a href="{{'/answers/'.$answers['id'].'/delete'}}"><button class="btn btn-primary">Delete</button></a>
@endfor

@endsection