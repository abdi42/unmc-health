@extends('layouts.layout')

<!DOCTYPE html>
<html>
<head>
    <title>Pulse Oxygen Information</title>
</head>

<body>

<p>Pulseox Information</p>
@foreach($musers as $user)


    <li>

        <a href="/pulseox/{{$user->userid}}">{{$user->userid}}</a></li>

@endforeach


</body>
</html>