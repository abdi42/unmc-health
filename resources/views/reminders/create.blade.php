@extends('layouts.master')


@section('content')

    <title>Create Reminder</title>

    <br><h1>Add Reminder</h1>


    <form action="/reminders" method="post">
        <div>
            {{ csrf_field() }}

            <p>Select Subject ID</p>
            <select name="subject"  >
                @foreach($subjects as $subject)
                    <option value="{{ $subject->subject }}" >{{ $subject->subject }}</option>
                @endforeach
            </select><br><br>


            <p>Reminder Title: </p>
            <input type="text" name="title" placeholder="Enter Reminder title here" class="form-control" required><br>

            <p>Reminder Message:</p>
            <textarea name="body" placeholder="Enter your reminder message here" class="form-control" cols="30" rows="10" required></textarea><br><br>


            <br>  <button type="submit" class="btn btn-primary">Save</button>&nbsp;
            <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/reminders") }}'" />
        </div>
    </form>


@endsection