<?php

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$email = new PHPMailer();
$email->isSMTP();
$email->Host = "smtp.gmail.com";
$email->SMTPAuth = "true";
$email->SMTPSecure = "tls";
$email->Port ="587";
$email->Username = "luisa.2021315963@aluno.iffar.edu.br";
$email->Password = "andrielly2005";
$email->Subject = "Email de teste from localhost";
$email->setFrom("raissa.2021319265@aluno.iffar.edu.br");
$email->Body = 'Este e um email de teste pelo localhost ';
$email->addAddress("raissa.2021319265@aluno.iffar.edu.br");
if($email->Send()){
    echo"Email envidado";
}else{
    echo "nao enviado".$email->ErrorInfo;
}
$email->smtpClose();