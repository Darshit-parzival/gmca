<!DOCTYPE html>
<html>
<head>
    <title>Reply to Your Message</title>
</head>
<body>
    <h1>Hello {{ $name }},</h1>
    
    <p>Thank you for your message. Here's our reply to your message:</p>
    
    <h3>Your Original Message:</h3>
    <p>{{ $originalMessage }}</p>
    
    <h3>Our Reply:</h3>
    <p>{{ $replyMessage }}</p>

    <p>Best regards,<br>{{ config('app.name') }}</p>
</body>
</html>
