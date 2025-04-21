<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
</head>
<body>
    <h2>Update Your Password</h2>
    <form action="{{ route('mentee.save-password') }}" method="POST">
        @csrf
        <label for="password">New Password:</label>
        <input type="password" name="password" required>
        
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit">Update Password</button>
    </form>
</body>
</html>
