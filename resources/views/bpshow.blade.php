@extends('layouts.layout')

<!DOCTYPE html>
<html>
<head>
    <title>Blood Pressure Information</title>
</head>

<body>

<p>BP Information</p>
@foreach($musers as $user)


    <li>

        <a href="/bps/{{$user->userid}}">{{$user->userid}}</a></li>

@endforeach





</body>
</html>