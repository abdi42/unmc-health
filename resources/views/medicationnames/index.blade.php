@extends('layouts.master')

@section('content')
<title>Medication Names</title>
<h1>Medication Names</h1>
    @foreach($medicationnames as $medicationname)

        <a href="/medicationnames/{{ $medicationname->id }}">{{ $medicationname->medication_name }}</a>



        <hr>
    @endforeach

@endsection