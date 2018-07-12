<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Send Email</h1>
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}"/>
<form action="/send" method="post">
    {{csrf_field()}}
    <label>
    To:
    </label>
    <label><input type="text" name="to"></label>
    <label>
    Subject:
    </label>
    <label><input type="text" name="subject"></label>
    <label>
    Message:
    </label>
    <label><textarea name="message" cols="30" rows="10"></textarea></label>
    <input type="submit" value="Send">
</form>

</body>
</html>