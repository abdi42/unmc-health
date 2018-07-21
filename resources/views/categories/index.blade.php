@extends('layouts.master')

@section('content')

    @foreach($categories as $category)
        <p><b>Category Name:</b></p>
        <a href="/categories/{{ $category->id }}">{{ $category->category }}</a>

        <p style="align-r:right">   {{ $category->created_at->toFormattedDateString() }}</p>
     <hr>
    @endforeach

    @endsection