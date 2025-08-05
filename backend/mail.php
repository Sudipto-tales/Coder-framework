<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to      = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $body    = $_POST['message'] ?? '';

    if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
        exit('Invalid recipient email.');
    }

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'bcasudipta@gmail.com';     // your Gmail address
        $mail->Password   = 'cgcw bvfe jgqv jbsm';        // 16-char App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // From / To
        $mail->setFrom('bcasudipta@gmail.com', 'Sudipta');
        $mail->addAddress($to);

        // Content
        $mail->isHTML(false); // set true if you build HTML body
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        echo "Email sent successfully to $to!";
    } catch (Exception $e) {
        echo "Failed to send. Mailer Error: {$mail->ErrorInfo}";
    }
}
