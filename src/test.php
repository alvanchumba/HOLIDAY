<?php
$to = "alvanchumba@gmail.com";
$subject = "Test Email";
$body = "This is a test email.";
$headers = "From: test@example.com";

if (mail($to, $subject, $body, $headers)) {
    echo "Test email sent successfully!";
} else {
    echo "Failed to send test email.";
}
?>

