@extends('layouts.master')

@section('content')
    <title>Medication Time</title>
    <h1>Medication Time</h1>

    @for($i=0;$i<count($medicationslots);$i++)

        <p><b>Subject ID: </b> {{ $medicationslots[$i]['subject'] }}</p>


        <p><br><b>Medication Time: </b>   {{ $medicationslots[$i]['medication_time'] }}</p><br>

        <p><b>Medication Days: </b></p>     {{ $medicationslots[$i]['medication_day'] }}

        <p><br><b>Created On: </b>   {{ $medicationslots[$i]['created_at'] }}</p>

        <a href="{{'/medicationslots/'.$medicationslots[$i]['id'].'/edit'}}"><button class="btn btn-primary">Edit</button></a><br><br>

        <a href="{{'/medicationslots/'.$medicationslots[$i]['id'].'/delete'}}"><button class="btn btn-primary">Delete</button></a>
        <hr>

    @endfor

@endsection