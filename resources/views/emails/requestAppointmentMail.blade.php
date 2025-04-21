<!DOCTYPE html>
<html>

<head>
    <title>Upcoming Appointment</title>
</head>

<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>Hello {{ $mentee->fname }},</h2>

    <p>This is a notice that your next appointment with your mentor has been scheduled.</p>
    <p><strong>Your UID:</strong> {{ $mentee->uid }}</p>
    <p><strong>Date:</strong> {{ $date }}</p>
    <p><strong>Time:</strong> {{ $time }}</p>
    <p><strong>Mentor's Mobile Number:</strong> {{ $mentor_mobile }}</p>


    <p>Please be prepared and join on time. If you have any issues or need to reschedule, reach out to your mentor in advance.</p>

    <p>Looking forward to a productive session!</p>

    <br>
    <p>Warm regards,</p>
    <p><strong>The Mentorship Team</strong></p>
</body>

</html>