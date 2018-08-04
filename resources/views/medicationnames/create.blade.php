@extends('layouts.master')


@section('content')

    <title>Medication Name</title>

    <br><h1>Add Medication Name</h1><br>


    <form action="/medicationnames" method="post">
        <div>
            {{ csrf_field() }}



            <p>Select Medication time here: </p>
            <select name="medicationslot_id">
                @foreach($medicationslots as $medicationslot)
                    <option value="{{ $medicationslot->id }} ">{{ $medicationslot->medication_time }}</option>
                @endforeach

            </select><br><br>

            <p>Enter Medication Name</p>
            <input type="text" name="medication_name" placeholder="Enter medication name here" class="form-control"><br><br>


            <br>  <button type="submit" class="btn btn-primary">Save</button>&nbsp;
            <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/medicationnames") }}'" />
        </div>
    </form>


@endsection
