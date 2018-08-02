@extends('layouts.master')

@section('content')

    <title>Edit Medications</title>

    <br><h1>Edit Medication</h1>

    <form action="/medications/{{ $medications->id }}" method="post">
        {{ csrf_field() }}

        {{ method_field('PUT') }}


        <p>Enter the Medication name and time here: </p>

        <input type="text" name="medication_name1" placeholder="Enter your Medication" value="{{ $medications->medication_name1 }}" required> &nbsp;
        <input type="time" name="medication_time" placeholder="Enter your Medication time here" value="{{ $medications->medication_time }}" required> <br> <br>


        <input type="text" name="medication_name2" placeholder="Enter your Medication" value="{{ $medications->medication_name2 }}" > <br><br>

        <input type="text" name="medication_name3" placeholder="Enter your Medication" value="{{ $medications->medication_name3 }}"> <br><br>

        <br>  <p>Select Day(s) to take medication</p>
        <input type="checkbox" name="day[]"  value="Sunday" > Sunday &nbsp;&nbsp;
        <input type="checkbox" name="day[]"  value="Monday"> Monday&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="day[]"  value="Tuesday"> Tuesday &nbsp;&nbsp;
        <input type="checkbox" name="day[]"  value="Wednesday"> Wednesday &nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="day[]"  value="Thursday"> Thursday &nbsp;&nbsp;
        <input type="checkbox" name="day[]"  value="Friday"> Friday &nbsp;&nbsp;
        <input type="checkbox" name="day[]"  value="Saturday"> Saturday &nbsp;
        &nbsp;<br>
        <br> <button type="submit" class="btn btn-primary">Update</button> &nbsp;
        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/medications") }}'" />

    </form>
@endsection