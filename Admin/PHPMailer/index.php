<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'hazratbilalghalib@gmail.com';                 // SMTP username
$mail->Password = 'Ghalib4255';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('hazratbilalghalib@gmail.com', "Census Website login");
echo $mail->addAddress($email, $name);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('hazratbilalghalib@gmail.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'login information';
$mail->Body    = '<font color="green">CNIC: Enter your own cnic'.'<br> PASSWORD:'.$password.'</font><br>http://localhost/CENSUS/Employee/index.php<br>If you any problem to login please contact us on email .send ur name cnic and email directly reply or http://localhost/CENSUS/contactus.php this '; 
$mail->AltBody = 'This is just for testing my website';

if(!$mail->send()) {
    echo "<script>alert('Message has not sent')</script>";
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo "<script>alert('Message has been sent')</script>
    ";
}