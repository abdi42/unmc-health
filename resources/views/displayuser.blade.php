
@extends('layouts.layout')
<!DOCTYPE html>
<html>
<head>
    <title>Weight Information</title>
</head>

<body>

<p>Weight Information</p>
@foreach($musers as $user)


    <li>

        <a href="/weights/{{$user->userid}}">{{$user->userid}}</a></li>

@endforeach





</body>
</html>