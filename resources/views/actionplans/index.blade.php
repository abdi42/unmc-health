@extends('layouts.master')

@section('content')

    @foreach($actionplans as $actionplan)
        <p><b>Action Plan:</b></p>
        <a href="/actionplans/{{ $actionplan->id }}">{{ $actionplan->actionplan }}</a>


        <p style="align-r:right">   {{ $actionplan->created_at->toFormattedDateString() }}</p>
        <hr>
    @endforeach

@endsection