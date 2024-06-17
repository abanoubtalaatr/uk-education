<!DOCTYPE html>
<html>
<head>
    <title>Reply to Your Message</title>
</head>
<body>
    <h1>Reply to Your Message</h1>
    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Message Type:</strong> {{ $contact->message_type }}</p>
    <p><strong>Message:</strong> {{ $contact->message }}</p>
    <hr>
    <p><strong>Reply:</strong></p>
    <p>{{ $replyMessage }}</p>
</body>
</html>
