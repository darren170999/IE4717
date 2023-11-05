<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'yqheng69@gmail.com'; // SMTP username
    $mail->Password = 'jjqahyadxrbyzyuq'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('yqheng69@gmail.com', 'Pureframes');
    $mail->addAddress('yqheng69+natalie@gmail.com', 'Natalie'); // Add a recipient

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Pureframes: Confirmation ID/Movie Tix (Quick Tix™)';

    // Assuming $path_to_qr_code is the filesystem path to the QR code image
    $path_to_qr_code = '../IE4717/assets/img/movie_qr.png';
    $mail->AddEmbeddedImage($path_to_qr_code, 'qr_code', 'qr-code-image.png');


    $mail->Body = '
    <html>
    <body>
        <p>This is your movie ticket. Scan the QR code below at the usher point for entry.</p>
        <div style="text-align: center;">
            <img src="cid:qr_code" alt="QR Code" style="width: 150px; height: 150px;">
        </div>
    </body>
    </html>';

    // Plain text body (for email clients that do not support HTML)
    $mail->AltBody = 'This is your movie ticket. Please use the attached QR code at the usher point for entry.';

    $mail->send();
    // Redirect to confirmation.php if the email is sent
    header('Location: confirmation.php');
    exit;
} catch (Exception $e) {
    // Log the error or notify someone that the email failed
    // Redirect to confirmation_fail.php if the email wasn't sent
    header('Location: confirmation_fail.php');
    exit;
}
?>

