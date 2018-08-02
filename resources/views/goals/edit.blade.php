@extends('layouts.master')

@section('content')

    <title>Edit Goals</title>

    <br><h1>Edit Goal</h1>

    <form action="/goals/{{ $goals->id }}" method="post">
        {{ csrf_field() }}

        {{ method_field('PUT') }}

        <p>Edit the Action Plan:</p>
        <textarea name="goal" class="form-control" cols="30" rows="10" required>{{ $goals->goal }}</textarea>

        <br> <button type="submit" class="btn btn-primary">Update</button> &nbsp;
        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/goals") }}'" />

    </form>
@endsection