<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'pune.viewen.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'admin@biblichor.xyz';                 // SMTP username
    $mail->Password = 'hanan786@#$';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('admin@biblichor.xyz', 'Biblichor');
    $mail->addAddress('sharjeel654sm7@gmail.com', 'Hanan Muzaffar');     // Add a recipient
    $mail->addAddress('hananmuzaffar26@yahoo.com', 'Hanan Muzaffar');               // Name is optional
    $mail->addReplyTo('contact@hananmuzaffar.tk', 'Contact');
    $mail->addCC('');
    $mail->addBCC('');

    //Attachments
    $mail->addAttachment('');         // Add attachments
    $mail->addAttachment('');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'You got a message';
    $mail->Body    = 'Message from Contact page';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}