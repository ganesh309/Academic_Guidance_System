<!DOCTYPE html>
<html>

<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>Dear Admin,</h2>

    <p>This is to formally request a password reset for my mentee account.</p>
    <p><strong>UID:</strong> {{ $mentee->uid }}</p>
    <p><strong>Mobile Number:</strong> {{ $mentee->mobile }}</p>
    <p><strong>University Email:</strong> {{ $mentee->email }}</p>
    <p><strong>Student of: </strong> {{ $mentee->school_name }} in {{$mentee->degree_name}}</p>
    <p><strong>Semester: </strong> {{ $mentee->semester_name }}</p>
    <p><strong>Batch: </strong> {{ $mentee->batch_name }}</p>
    
    <br>
    <p>Thank you for your assistance.</p>
    <p>Sincerely,</p>
    <p><strong>{{ $mentee->fname }} {{ $mentee->lname }}</strong></p>
    
    
</body>

</html>