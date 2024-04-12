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
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Execution Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->first_name }}</td>
                <td>{{ $row->last_name }}</td>
                <td>{{ $row->execution_time }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
