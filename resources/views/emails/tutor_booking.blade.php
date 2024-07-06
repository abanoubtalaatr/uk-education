<!DOCTYPE html>
<html>
<head>
    <title>New Booking Notification</title>
</head>
<body>
    <h2>New Booking Notification</h2>
    <p>Hello {{ $bookingDetails['tutor']->name }},</p>
    <p>You have a new booking request:</p>
    <ul>
        <li>Student: {{ $bookingDetails['user']->name }}</li>
        <li>Date: {{ $bookingDetails['date'] }}</li>
        
        <li>Course: {{ $bookingDetails['course_name'] }}</li>
    </ul>
    {{-- <p>Please confirm or contact the student as soon as possible.</p> --}}
</body>
</html>
