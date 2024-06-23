<!DOCTYPE html>
<html>
<head>
    <title>Program Registration Confirmation</title>
</head>
<body>
    <h1>Thank you for registering, {{ $registration->name }}!</h1>
    <p>You have successfully registered for the program:</p>
    <ul>
        <li>Title: {{ $program->title }}</li>
        <li>Day: {{ $program->day }}</li>
        <li>Time: {{ $program->time }}</li>
        <li>Stage: {{ $program->stage }}</li>
    </ul>
    <p>We look forward to seeing you there!</p>
</body>
</html>
