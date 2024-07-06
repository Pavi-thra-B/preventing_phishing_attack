<?php
session_start();
include("db1.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



if(isset($_GET['email']) && isset($_GET['voterid'])  ){
    
    $email = $_GET['email'];
    $voterid=$_GET['voterid'];
   // echo "Welcome, your email address is: " . htmlspecialchars($email);
    //echo "$voterid";
    $share1= generateRandomPassword();
    $share2=generateRandomPassword();
    $secret_pw=generatesecretpw($share1,$share2);

    //echo "$randomPassword";
   // $subject = "Your Registration Details";
    //$message = "Hello $voterid ,\n\n Here is your share1 password: $share1\n\nPlease keep it safe.";
    $message = "Hello $voterid,\n\nClick the below link to cast your vote. $secret_pw\n\n for vote casting\n\nPlease keep it safe.\n\n\n<a href='http://localhost/ovs_ism/ism/login.php'>http://localhost/ovs_ism/ism/login.php</a>";

    $mail=new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='ovsgproject@gmail.com';
    $mail->Password='vozifmqbfpbzunfu';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;

    $mail->setFrom('ovsgproject@gmail.com');

    $mail->addAddress($email);

    $mail->isHTML(true);

    $mail->Subject = isset($_POST["subject"]) ? $_POST["subject"] :'Registration successfull' ;

    // Set the message body from the form or a default value
      $mail->Body = !empty($_POST["message"]) ? $_POST["message"] : $message;

    $mail->send();

    $query = "INSERT INTO password_voter (voterid,share1,share2,secretpassword) 
  VALUES ('$voterid', '$share1', '$share2', '$secret_pw')";
   mysqli_query($conn, $query);
   
    
   
}

function generatesecretpw($share1,$share2)
{
    //$length=24;
    $randomShare = mt_rand(1000, 9999);
    $combinedShare = $share1 .  $randomShare . $share2;
    return $combinedShare;

}



function generateRandomPassword($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}

   



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>

    <style>
        #form {
            height: 200px;
            width: 600px;
            background-color: rgb(6, 240, 240);
            border-radius: 30px;
            border: 20px darkblue;
            padding: 60px;
            margin-top: 200px;
            margin-left: 100px;
        }

        #suc {
            color: green;
        }

        body {
            background-image: url("voting.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div id="form">
        <h1 id="suc">REGISTRATION SUCCESSFUL!!</h1>
        <h2>Secret password and Vote cast link was sent to your registered email</h2>
        <br>
        <a href="reg.php">Go back</a>
    </div>
</body>
</html>