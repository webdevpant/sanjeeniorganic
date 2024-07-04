<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])) {
  $fullname = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication

    $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Username = '';                     //SMTP username
    $mail->Password = 'gsnhsgjvriprgcch';                               //SMTP password

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('', 'User');
    $mail->addAddress('sales@sanjeevaniagrofoods.com', 'Mailer');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'New Enquiry';
    $mail->Body = '<h3>New enquiry</h3>
  <h4>Full Name:' . $fullname . '</h4>
  <h4>Mobile Number:'.$phone.'</h4>
  <h4>Email:' . $email . '</h4>
  <h4>Message :' . $message . '</h4>
  ';
    if ($mail->send()) {
      $_SESSION['status'] = "Thanks you contact us";
      header("Location:{$_SERVER["HTTP_REFERER"]}");
      exit(0);
    } else {
      $_SESSION['status'] = "Message could not be sent.Mailer Error:{$mail->ErrorInfo}";
      header("Location:{$_SERVER["HTTP_REFERER"]}");
      exit(0);
    }


  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
} else {
  header('Location:index.php');
  exit(0);
}
?>