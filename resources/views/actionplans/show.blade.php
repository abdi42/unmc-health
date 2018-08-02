@extends('layouts.master')

@section('content')

@for($i=0;$i<count($actionplans);$i++)

    <p><b>Subject ID: </b> {{ $actionplans[$i]['subject'] }}</p>

    <p><br><b>Action Plan:</b></p>  {{ $actionplans[$i]['actionplan'] }}

    <p><br><b>Created On: </b>   {{ $actionplans[$i]['created_at'] }}</p>

 <a href="{{'/actionplans/'.$actionplans[$i]['id'].'/edit'}}"><button class="btn btn-primary">Edit</button></a><br><br>

    <a href="{{'/actionplans/'.$actionplans[$i]['id'].'/delete'}}"><button class="btn btn-primary">Delete</button></a>
    <hr>

@endfor

@endsection