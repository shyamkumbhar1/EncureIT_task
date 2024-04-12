<!DOCTYPE html>
<html>
<head>
    <title>Demo Form</title>
</head>
<body>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<form method="post" action="/demo">
    @csrf
    <label for="first_name">First Name:</label><br>
    <input type="text" id="first_name" name="first_name"><br>
    <label for="last_name">Last Name:</label><br>
    <input type="text" id="last_name" name="last_name"><br><br>
    <button type="submit">Submit</button>
</form>

</body>
</html>
