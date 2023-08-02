<!DOCTYPE html>
<html>
<head>
    <title>Exercise Registration</title>
</head>
<body>
    <h1>Exercise Registration</h1>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @elseif (session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif

    <form action="/exercise-registration" method="post">
        @csrf
        <label for="json_data">Paste the exercise JSON here:</label>
        <br>
        <textarea name="json_data" rows="10" cols="50"></textarea>
        <br>
        <button type="submit">Save Exercise</button>
    </form>
</body>
</html>
