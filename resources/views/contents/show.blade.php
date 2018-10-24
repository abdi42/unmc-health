@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'HINTS' => '/contents',
    'Review' => null
  ]
])

@section('content')
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif

  <title>Review HINT</title>
  <h2 class="sub-header">HINT {{$content->category->category}} #{{$content->id}}</h2>


  <div class="card mt-5">
    <div class="card-body">

      <div class="">

        <a href="{{'/contents/'.$content->id.'/delete'}}" class="float-right ml-5">
          <button class="btn btn-danger">Delete</button>
        </a>

        <a href="{{'/contents/'.$content->id.'/edit'}}" class="float-right">
          <button class="btn btn-primary">Edit</button>
        </a>

      </div>

      <br>
      <br>

      <p><b>Health Information Tip: </b></p> {{$content->content}}<br><br>

      <p><b>Category: </b> {{$content->category->category}}</p> <br><br>


      @foreach($content->questions as $k=>$question)
        <br>
        <h4><b>Question {{$k+1}}: </b> {{$question->text}}</h4>
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
