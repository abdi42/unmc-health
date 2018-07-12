<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<body>

<p>Pulseox Information</p>
@foreach($musers as $user)


    <li>

        <a href="/pulseox/{{$user->userid}}">{{$user->userid}}</a></li>

@endforeach


</body>
</html>