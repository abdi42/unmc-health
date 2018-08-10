@extends('layouts.master')


@section('content')

    <title>Action Plan</title>

    <br><h1>Add Action Plan</h1>


    <form action="/actionplans" method="post">
        <div>
            {{ csrf_field() }}

            <p>Select Subject ID</p>
            <select name="subject"  >
                @foreach($subjects as $subject)
                    <option value="{{ $subject->subject }}" >{{ $subject->subject }}</option>
                @endforeach
            </select><br><br>


            <p>Enter the Action Plan here: </p>
            <textarea name="actionplan" placeholder="Enter your action plan here" class="form-control" cols="30" rows="10" required></textarea><br><br>


            <br>  <button type="submit" class="btn btn-primary">Save</button>&nbsp;
            <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/actionplans") }}'" />
        </div>
    </form>


@endsection
