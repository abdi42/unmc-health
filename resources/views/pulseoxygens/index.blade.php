@extends('layouts.master')

<!DOCTYPE html>
<html>
<head>
    <title>Pulse Oxygen Information</title>
</head>

<body>

<p>Pulseox Information</p>
@foreach($subjects as $subject)


    <li>

        <a href="/pulseoxygens/{{$subject->userid}}">{{$subject->userid}}</a></li>

@endforeach


</body>
</html>