@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    strtoupper($medicationslots->subject) => "/subjects/" . $medicationslots->subject,
    "Medication(". $medicationslots->medication_name .")" => null
  ]
])

@section('content')

    <title>Edit Medications</title>

    <br><h1>Edit Medication</h1>

    <form action="/medicationslots/{{ $medicationslots->id }}" method="post">
        {{ csrf_field() }}

        {{ method_field('PUT') }}


        <p>Enter Medication Name</p>
        <input type="text" name="medication_name" placeholder="Enter medication name here" value="{{ $medicationslots->medication_name }}" class="form-control" required><br><br>


        <p>Enter the Medication name and time here: </p>


        <input type="time" name="medication_time" placeholder="Enter your Medication time here" value="{{ $medicationslots->medication_time }}" required> <br>


        <br>  <p>Select Day(s) to take medication</p>
        <input type="checkbox" name="day[sunday]"  value="Sunday" {{ $medicationslots->sunday ? 'checked' : '' }}> Sunday &nbsp;&nbsp;
        <input type="checkbox" name="day[monday]"  value="Monday" {{ $medicationslots->monday ? 'checked' : '' }}> Monday&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="day[tuesday]"  value="Tuesday" {{ $medicationslots->tuesday ? 'checked' : '' }}> Tuesday &nbsp;&nbsp;
        <input type="checkbox" name="day[wednesday]"  value="Wednesday" {{ $medicationslots->wednesday ? 'checked' : '' }}> Wednesday &nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="day[thursday]"  value="Thursday" {{ $medicationslots->thursday ? 'checked' : '' }}> Thursday &nbsp;&nbsp;
        <input type="checkbox" name="day[friday]"  value="Friday" {{ $medicationslots->friday ? 'checked' : '' }}> Friday &nbsp;&nbsp;
        <input type="checkbox" name="day[saturday]"  value="Saturday" {{ $medicationslots->saturday ? 'checked' : '' }}> Saturday &nbsp;
        &nbsp;<br>
        <br> <button type="submit" class="btn btn-primary">Update</button> &nbsp;
        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("medicationslots") }}'" />

    </form>
@endsection
