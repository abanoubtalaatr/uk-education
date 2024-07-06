<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <h2>Booking Confirmation</h2>
    <p>Dear {{ $bookingDetails['user']->name }},</p>
    <p>Your booking details are as follows:</p>
    <ul>
        <li>Tutor: {{ $bookingDetails['tutor_name'] }}</li>
        <li>Date: {{ $bookingDetails['date'] }}</li>
        <li>Course: {{ $bookingDetails['course_name'] }}</li>
        <li>Link : {{ $bookingDetails['link'] }}</li>
    </ul>
    <p>Thank you for booking with us.</p>
</body>
</html>
