@extends('layouts.master')

@section('content')
    <title>Edit Reminders</title>




    <br><h1>Edit Reminder</h1><br>


    <form action="/reminders/{{$reminder->id}}" method="post">


        {{ csrf_field() }}

        {{method_field('PUT')}}

        <p>Select Subject</p>
        <select name="subject"  >
            @foreach($subjects as $subject)
                <option value="{{ $subject->subject }}" >{{ $subject->subject }}</option>
            @endforeach
        </select><br><br>

        <p>Edit title:</p>
        <input type="text" name="title" class="form-control" value="{{ $reminder->title }}" required><br>


        <p>Reminder Message:</p>
        <textarea name="body" placeholder="Enter your reminder message here" class="form-control" cols="30" rows="10" required>{{ $reminder->body }}</textarea><br><br>

        <br> <button type="submit" class="btn btn-primary">Update</button> &nbsp;
        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/reminders") }}'" />

    </form>

@endsection