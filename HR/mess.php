<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST['send'])) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'abigailmills0554@gmail.com';
    $mail->Password = 'uivsqhxqffohgtjy';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('abigailmills0554@gmail.com');
    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['body'];

    $mail->send();

    header('location:/sem/hr/send.php');
}
