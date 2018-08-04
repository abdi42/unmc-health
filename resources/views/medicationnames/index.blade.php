@extends('layouts.master')

@section('content')

    @foreach($medicationnames as $medicationname)

        <a href="/medicationnames/{{ $medicationname->id }}">{{ $medicationname->medication_name }}</a>



        <hr>
    @endforeach

@endsection