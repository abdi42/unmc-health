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

        <p><br><b>To achieve my goal I will need to</b></p>
        <p>How much:</p>
        {{ $actionplans[$i]['how_much'] }}

        <p><br>When?</p>
        {{ $actionplans[$i]['when'] }}

        <p><br>How Often?</p>
        {{ $actionplans[$i]['how_often'] }}

        <p><br><b>This is how sure I am that I will be able to do my action plan</b></p>

        @if($actionplans[$i]['action_sureness'] == 10)
            <p>Very Sure</p>
            @endif
        @if($actionplans[$i]['action_sureness'] == 5)
            <p>Somewhat sure</p>
            @endif
        @if($actionplans[$i]['action_sureness'] == 0)
            <p>Not sure at all</p>
            @endif

        <p><br><b>Possible barriers to my goal</b></p>
        {{ $actionplans[$i]['barriers'] }}

        <p><br><b>How I can avoid barriers</b></p>
        {{ $actionplans[$i]['avoid_barriers'] }}

        <p><br><b>How well did I meet my goal</b></p>
        {{ $actionplans[$i]['goal'] }}

        <p><br><b>Created On: </b>   {{ $actionplans[$i]['created_at'] }}</p>

        <a href="{{'/actionplans/'.$actionplans[$i]['id'].'/edit'}}"><button class="btn btn-primary">Edit</button></a><br><br>

        <a href="{{'/actionplans/'.$actionplans[$i]['id'].'/delete'}}"><button class="btn btn-primary">Delete</button></a>
        <hr>

    @endfor

@endsection