@extends('layouts.dashboard')


@section('content')
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif

  <title>Content List</title>
  <h1>Educational Contents</h1>


  <div class="card mt-5">
    <div class="card-body">

      <div class="">

        <a href="{{'/contents/'.$content->id.'/delete'}}" class="float-right mr-4">
          <button class="btn btn-danger">Delete</button>
        </a>

        <a href="{{'/contents/'.$content->id.'/edit'}}" class="float-right">
          <button class="btn btn-primary">Edit</button>
        </a>

      </div>

      <br>
      <br>

      <p><b>Health Information Tips: </b></p> {{$content->content}}<br><br>

      <p><b>Educational Category: </b> {{$content->category->category}}</p> <br><br>


      @foreach($content->questions as $question)
        <br>
        <h4><b>Question: </b> {{$question->text}}</h4>
        <br>
        <h5>Possible Answers</h5>
        <ul class="list-group">
          @foreach($question->answers as $answer)
            <li class="list-group-item">
              <p>
                {{$answer->answer}}
                @if($answer->isAnswer)
                  (<b>Correct Answer</b>)
                @endif
              </p>

            </li>
          @endforeach
        </ul>
      @endforeach
      <br>


    </div>
  </div>


@endsection
