<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daily Messages</title>
</head>
<body>
<h1>Send Daily Notification</h1>
<form action="/sends" method="post">
    {{csrf_field()}}
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}"/>
    <label>
        Type your Message here:
    </label>
    <label>
        <textarea name="message" cols="30" rows="10"></textarea>
    </label>

    <input type="submit" value="Send">
</form>

</body>
</html>