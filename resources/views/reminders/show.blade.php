@extends('layouts.master')

@section('content')

    @for($i=0;$i<count($reminders);$i++)
        <p><b>Reminder ID:</b></p> {{ $reminders[$i]['id'] }}

        <p><b>Reminder Title</b></p> {{ $reminders[$i]['title'] }} <br><br>
        <p><b>Reminder Message:</b></p> {{ $reminders[$i]['body'] }} <br><br>
        <p><b>Reminder Time(s)</b></p>  {{ $reminders[$i]['reminder_time1'] }} , {{ $reminders[$i]['reminder_time2'] }}, {{ $reminders[$i]['reminder_time3'] }}<br><br>

        <a href="{{'/reminders/'.$reminders[$i]['id'].'/edit'}}"><button class="btn btn-primary">Edit</button></a><br><br>

        <a href="{{'/reminders/'.$reminders[$i]['id'].'/delete'}}"><button class="btn btn-primary">Delete</button></a>
        <hr>
    @endfor

@endsection