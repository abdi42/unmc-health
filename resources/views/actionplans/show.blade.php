@extends('layouts.master')

@section('content')
    <title>Action Plan</title>

    <h1>Action Plan</h1>

    @for($i=0;$i<count($actionplans);$i++)

        <p><b>Subject ID: </b> {{ $actionplans[$i]['subject'] }}</p>

        <p><b>To be more physically active</b></p>
        <p>My goal is:</p>
        {{ $actionplans[$i]['physically_active'] }}

        <p><br><b>To take my medications</b></p>
        <p>My goal is:</p>
        {{ $actionplans[$i]['medications'] }}

        <p><br><b>To improve my food choices</b></p>
        <p>My goal is:</p>
        {{ $actionplans[$i]['food_choices'] }}

        <p><br><b>To reduce my stress</b></p>
        <p>My goal is:</p>
        {{ $actionplans[$i]['stress'] }}

        <p><br><b>To learn about my health problems</b></p>
        <p>My goal is:</p>
        {{ $actionplans[$i]['health_problems'] }}
        <p><br><b>Action Plan:</b></p>  {{ $actionplans[$i]['actionplan'] }}

        <p><br><b>Created On: </b>   {{ $actionplans[$i]['created_at'] }}</p>

        <a href="{{'/actionplans/'.$actionplans[$i]['id'].'/edit'}}"><button class="btn btn-primary">Edit</button></a><br><br>

        <a href="{{'/actionplans/'.$actionplans[$i]['id'].'/delete'}}"><button class="btn btn-primary">Delete</button></a>
        <hr>

    @endfor

@endsection