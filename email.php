<?php
  // $admin_email = "calebq2010@gmail.com";
  // mail($admin_email, "$subject", $comment, "From:" . $email);
  require('PHPMailer/PHPMailerAutoload.php');

define('GUSER', 'pushrepair@gmail.com'); // GMail username
define('GPWD', '4x4comeback'); // GMail password

function smtpmailer($from, $from_name, $body) { 
  global $error;
  $mail = new PHPMailer();  // create a new object
  $mail->IsSMTP(); // enable SMTP
  $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
  $mail->SMTPAuth = true;  // authentication enabled
  $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 465; 
  $mail->Username = GUSER;  
  $mail->Password = GPWD;           
  $mail->SetFrom($from, $from_name);
  $mail->Subject = "Push Electronics Contact";
  $mail->Body = $body;
  $mail->AddAddress(GUSER);
  if(!$mail->Send()) {
    $error = 'Mail error: '.$mail->ErrorInfo;
    echo $error;
    return false;
  } else {
    $error = 'success';
    echo $error;
    return true;
  }
}

smtpmailer($_POST['email'], $_POST['name'], $_POST['message']);

?>