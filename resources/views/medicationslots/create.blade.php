@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    'ID' => url()->previous(),
    "Create" => null
  ]
])

@section('content')

    <title>Medication Time</title>

    <br><h1>Add Medication Time</h1><br>


    <form action="/medicationslots" method="post">
        <div>
            {{ csrf_field() }}

            <p>Select Subject ID</p>
            <select name="subject"  >
                @foreach($subjects as $subject)
                    <option value="{{ $subject->subject }}" >{{ $subject->subject }}</option>
                @endforeach
            </select><br><br>

            <p>Enter Medication Name</p>
            <input type="text" name="medication_name" placeholder="Enter medication name here" class="form-control" required><br><br>


            <p>Enter the Medication time here: </p>

            <input type="time" name="medication_time" placeholder="Enter your Medication time here"  required> <br>



            <br>  <p>Select Day(s) to take medication</p>
            <input type="checkbox" name="day[sunday]"  value="Sunday" checked> Sunday &nbsp;&nbsp;
            <input type="checkbox" name="day[monday]"  value="Monday"> Monday&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="day[tuesday]"  value="Tuesday" > Tuesday &nbsp;&nbsp;
            <input type="checkbox" name="day[wednesday]"  value="Wednesday" > Wednesday &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="day[thursday]"  value="Thursday" > Thursday &nbsp;&nbsp;
            <input type="checkbox" name="day[friday]"  value="Friday" > Friday &nbsp;&nbsp;
            <input type="checkbox" name="day[saturday]"  value="Saturday"> Saturday &nbsp;
            &nbsp;<br>

            <br>  <button type="submit" class="btn btn-primary">Save</button>&nbsp;
            <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/medicationslots") }}'" />
        </div>
    </form>


@endsection
