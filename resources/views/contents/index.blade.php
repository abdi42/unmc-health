@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'HINTS' => null,
  ]
])

@section('content')

  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif


  <title>HINTS</title> <!-- todo: you can't have a title here! -->
  <a href="{{ url("/contents/create") }}" class="btn btn-success float-right px-4 py-2" role="button">
    <i class="fas fa-plus"></i>
    New HINT
  </a>
  <br>
  <br>
  <h2 class='sub-header'>HINTS</h2>

  @foreach($contents as $content)
    <p class="m-0"><b>Category:</b> <span>{{$content->category->category}}</span></p>
    <a href="/contents/{{ $content->id }}">{{ $content->content }}</a>
    <p style="text-align:right"> <em>Last updated  {{ $content->updated_at->toFormattedDateString() }} </em></p>
    <hr>
  @endforeach

@endsection
