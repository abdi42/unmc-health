@extends('layouts.master')

@section('content')

    <title>Edit Medication Name</title>

    <br><h1>Edit Medication Name</h1>

    <form action="/medicationnames/{{ $medicationnames->id }}" method="post">
        {{ csrf_field() }}

        {{ method_field('PUT') }}

        <p>Select Medication time here: </p>

        <select name="medicationslot_id">
            @foreach($medicationslots as $medicationslot)
                <option value="{{ $medicationslot->id }} ">{{ $medicationslot->medication_time }}</option>
            @endforeach

        </select><br><br>



        <p>Edit the Medication Name here </p>
        <input type="text" name="medication_name" class="form-control" value="{{ $medicationnames->medication_name }}" required><br>



        <br>  <p>Select Day(s) to take medication</p>
        <input type="checkbox" name="day[]"  value="Sunday" checked="checked"> Sunday &nbsp;&nbsp;
        <input type="checkbox" name="day[]"  value="Monday"> Monday&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="day[]"  value="Tuesday"> Tuesday &nbsp;&nbsp;
        <input type="checkbox" name="day[]"  value="Wednesday"> Wednesday &nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="day[]"  value="Thursday"> Thursday &nbsp;&nbsp;
        <input type="checkbox" name="day[]"  value="Friday"> Friday &nbsp;&nbsp;
        <input type="checkbox" name="day[]"  value="Saturday"> Saturday &nbsp;
        &nbsp;<br>
        <br> <button type="submit" class="btn btn-primary">Update</button> &nbsp;
        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("medicationnames") }}'" />

    </form>
@endsection