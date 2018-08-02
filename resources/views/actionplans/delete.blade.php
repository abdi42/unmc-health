@extends('layouts.master')

@section('content')
    <title>Confirm Delete</title>

    <br> <h1>Delete Action Plan</h1><br>

    <h3>Are you sure you want to delete?</h3>

    <p>{{ $actionplans->actionplan }}</p>

    <form action="{{'/actionplans/'. $actionplans->id}}" method="post">

        {{csrf_field()}}

        {{method_field('DELETE')}}

        <br><a href="{{'/actionplans/'.$actionplans->id}}"><button class="btn btn-primary">Delete</button></a>&nbsp;

        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/actionplans/") }}'" />

    </form>

    <hr>



@endsection