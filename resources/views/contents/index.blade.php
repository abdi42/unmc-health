@extends('layouts.dashboard')

@section('content')
  <title>Contents</title>
  <a href="{{ url("/contents/create") }}" class="btn btn-success float-right px-4 py-2" role="button">
    <i class="fas fa-plus"></i>
    New Educational Content
  </a>
  <br>
  <br>
  <h2 class='sub-header'>Educational Contents</h2>

  @foreach($contents as $content)
    <p><b>Content:</b></p>
    <a href="/contents/{{ $content->id }}">{{ $content->content }}</a>


    <p style="align:right">   {{ $content->created_at->toFormattedDateString() }}</p>
    <hr>
  @endforeach

@endsection
