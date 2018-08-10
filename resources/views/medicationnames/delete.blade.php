@extends('layouts.master')

@section('content')
    <title>Confirm Delete</title>

    <br> <h1>Delete Medication Time</h1><br>

    <h3>Are you sure you want to delete?</h3>

    <p>{{ $medicationname->medication_name }}</p>

    <form action="{{'/medicationnames/'. $medicationname->id}}" method="post">

        {{csrf_field()}}

        {{method_field('DELETE')}}

        <br><a href="{{'/medicationnames/'.$medicationname->id}}"><button class="btn btn-primary">Delete</button></a>&nbsp;

        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/medicationnames/") }}'" />

    </form>

    <hr>



@endsection