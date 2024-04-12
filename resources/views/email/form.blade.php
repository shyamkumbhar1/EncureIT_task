<!DOCTYPE html>
<html>
<head>
    <title>Send Email</title>
</head>
<body>
    <h2>Send Email</h2>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <form method="post" action="/send-email">
        @csrf
        <div>
            <label for="email">Recipient Email:</label><br>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message"></textarea>
        </div>
        <button type="submit">Send Email</button>
    </form>
</body>
</html>
