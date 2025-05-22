<!DOCTYPE html>
<html>

<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>Dear Admin,</h2>

    <p>This is to formally request a password reset for my mentorship account.</p>
    <p><strong>UID:</strong> {{ $mentor->uid }}</p>
    <p><strong>Mobile Number:</strong> {{ $mentor->mobile }}</p>
    <p><strong>University Email:</strong> {{ $mentor->email }}</p>
    <br>
    <p>Thank you for your assistance.</p>
    <p>Sincerely,</p>
    <p><strong>{{ $mentor->fname }} {{ $mentor->lname }}</strong></p>
    <p><strong>Faculty of: </strong> {{ $mentor->school }}</p>
    
</body>

</html>