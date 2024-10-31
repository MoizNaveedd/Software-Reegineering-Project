<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Assuming you have retrieved the necessary details from the form
$cName = $_POST['name'];
$cEmail = $_POST['email'];
$service = $_POST['service'];

// Compose the email content
$subject = "Service Details";
$message = "Dear $cName,\n\nThank you for choosing our service. Here are the details:\n\nService: $service\n\nWe will contact you shortly to discuss further arrangements.\n\nRegards,\nYour Company";

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Set up SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';  // Your SMTP host
    $mail->SMTPAuth = true;
    $mail->Username = 'sarahsk002@gmail.com';  // Your SMTP username
    $mail->Password = 'nxqyplvnwdsildln';  // Your SMTP password
    $mail->SMTPSecure = 'tls';  // Enable TLS encryption
    $mail->Port = 587;  // Your SMTP port number

    // Set up email content and recipient
    $mail->setFrom('sarahsk002@gmail.com' ,'Sarah');  // Sender's email and name
    $mail->addAddress($cEmail, $cName);  // Recipient's email and name
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send the email
    $mail->send();
    echo 'Email sent successfully!';
} catch (Exception $e) {
    echo "Email sending failed: {$mail->ErrorInfo}";
}
?>