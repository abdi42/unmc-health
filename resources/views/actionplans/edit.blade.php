@extends('layouts.master')

@section('content')

 <title>Edit Action Plans</title>

 <br><h1>Edit Action Plan</h1><br>

 <form action="/actionplans/{{ $actionplans->id }}" method="post">
    {{ csrf_field() }}

    {{ method_field('PUT') }}

    <p>Edit the Action Plan:</p>
    <textarea name="actionplan" class="form-control" cols="30" rows="10" required>{{ $actionplans->actionplan }}</textarea>

 <br> <button type="submit" class="btn btn-primary">Update</button> &nbsp;
 <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/actionplans") }}'" />

 </form>
@endsection