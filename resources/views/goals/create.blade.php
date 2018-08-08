@extends('layouts.master')

<title>Create Goals</title>


@section('content')
    <form action="/goals" method="post">
        <div>
          <br>  <h1>Create a Goal</h1>
            {{ csrf_field() }}

            <br><p>Select Subject ID</p>
            <select name="subject"  >
                @foreach($subjects as $subject)
                    <option value="{{ $subject->subject }}" >{{ $subject->subject }}</option>
                @endforeach
            </select><br><br>


            <p>Enter your Goal here: </p>
            <textarea name="goal" placeholder="Enter your goal here" class="form-control" cols="30" rows="10" required></textarea><br><br>


            <br>  <button type="submit" class="btn btn-primary">Save</button>&nbsp;
            <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/goals") }}'" />
        </div>
    </form>


@endsection