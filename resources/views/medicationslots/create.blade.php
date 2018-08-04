@extends('layouts.master')


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


            <p>Enter the Medication time here: </p>

            <input type="time" name="medication_time" placeholder="Enter your Medication time here"  required> <br>



            <br>  <p>Select Day(s) to take medication</p>
            <input type="checkbox" name="day[]"  value="Sunday" checked="checked"> Sunday &nbsp;&nbsp;
            <input type="checkbox" name="day[]"  value="Monday"> Monday&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="day[]"  value="Tuesday"> Tuesday &nbsp;&nbsp;
            <input type="checkbox" name="day[]"  value="Wednesday"> Wednesday &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="day[]"  value="Thursday"> Thursday &nbsp;&nbsp;
            <input type="checkbox" name="day[]"  value="Friday"> Friday &nbsp;&nbsp;
            <input type="checkbox" name="day[]"  value="Saturday"> Saturday &nbsp;&nbsp; <br><br>


            <br>  <button type="submit" class="btn btn-primary">Save</button>&nbsp;
            <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/medicationslots") }}'" />
        </div>
    </form>


@endsection