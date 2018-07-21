@extends('layouts.master')

@section('content')

    @foreach($contents as $content)
        <p><b>Content:</b></p>
        <a href="/contents/{{ $content->id }}">{{ $content->title }}</a>


        <p style="align-r:right">   {{ $content->created_at->toFormattedDateString() }}</p>
        <hr>
    @endforeach

@endsection