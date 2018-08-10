@extends('layouts.master')

@section('content')
    <title>Medication</title>
    <h1>Medication</h1>

     <br><p>Subject ID:</p> {{ $medicationnames['medicationslot']['subject'] }}<br>


     <br><p>Medication Name</p> {{ $medicationnames['medication_name'] }}<br>

     <br> <p>Medication Slot</p> {{ $medicationnames['medicationslot']['medication_time'] }}<br><br>

     <a href="{{'/medicationnames/'.$medicationnames['id'].'/edit'}}"><button class="btn btn-primary">Edit</button></a><br><br>

     <a href="{{'/medicationnames/'.$medicationnames['id'].'/delete'}}"><button class="btn btn-primary">Delete</button></a>
     <hr>

   

@endsection