<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['send'])) {
    $message = $_POST['message'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'vishalsaini94847@gmail.com';           // SMTP username
        $mail->Password   = 'wfhuslgycbvuduul';                     // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
        $mail->Port       = 587;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom('vishalsaini94847@gmail.com', 'Vishal');
        $mail->addAddress('vishalsaini94847@gmail.com', 'Vishal');  // Add a recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'New enquiry - Here is the subject';
        $mail->Body    = "<h3>Hello! Vishal Saini new enquiry</h3>
        <h4>message: $message</h4>
        <h4>Name: $name</h4>
        <h4>Email: $email</h4>
        <h4>subject: $subject</h4>";

        // Send email
        if ($mail->send()) {
            $_SESSION['status'] = "Thank you for contacting us - Team Book Shop Member";
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit(0);
        } else {
            $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            header('Location: index.php');
            exit(0);
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    header('Location: index.php');
    exit(0);
}
