<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

$mail = new PHPMailer(true);

if(isset($_POST['send'])){
    $to=$_POST['email'];

    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='yourgmail@gmail.com';
    $mail->Password='your_app_password';
    $mail->SMTPSecure='tls';
    $mail->Port=587;

    $mail->setFrom('yourgmail@gmail.com');
    $mail->addAddress($to);

    $mail->Subject='Password Reset';
    $mail->Body='Click here to reset password...';

    $mail->send();
    echo "Mail Sent!";
}
?>

<form method="post">
<input type="email" name="email" placeholder="Enter email">
<button name="send">Send Mail</button>
</form>
