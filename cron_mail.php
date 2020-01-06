<?php
require 'PHPMailer/PHPMailerAutoload.php';
date_default_timezone_set('Asia/Kolkata');
$date_time = date("F d, Y h:i:s A") ;
$date_time_12 = date("d-m-Y h:i:s A") ;
$date = date('d-m-Y H:i A');
$mail = new PHPMailer;

$mail->SMTPDebug = 0;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.notageeks.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'your_email_address';                 // SMTP username
$mail->Password = 'your_email_password';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->setFrom('bulkstudy@notageeks.com', 'Bulk Study');
$mail->addAddress('mohitchack255@gmail.com', 'Mohit25');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('mohitchack255@gmail.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Cron Job Mail send on '.$date_time_12;
$mail->Body    = 'This Mail is send from the cro job on <b>'.$date.'</b>';
$mail->AltBody = 'This is the body send on '.$date_time.' in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent on '.$date_time_12;
    echo 'Mailer Error : ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent on '.$date_time_12;
}
?>