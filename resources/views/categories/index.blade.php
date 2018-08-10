@extends('layouts.master')

@section('content')

    <title>Categories</title>
    <h1>Educational Categories</h1>
    @foreach($categories as $category)
       <br> <p><b>Category Name:</b></p>
        <a href="/categories/{{ $category->id }}">{{ $category->category }}</a>

        <p style="align-r:right">   {{ $category->created_at->toFormattedDateString() }}</p>
     <hr>
    @endforeach

    @endsection