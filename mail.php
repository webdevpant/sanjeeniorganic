<?php
//get data from form  
$name = $_POST['name'];
$phone=$_POST['phone'];
$email= $_POST['email'];
$services=$_POST['services'];
$message= $_POST['message'];

$to = "agrosanjeevni@gmail.com";

$subject = "Mail From website";
$txt ="Name = ". $name . "\r\n Number=". $phone ." \r\n Email = " . $email . "\r\n Services=". $services ." Message =" . $message;
$headers = "From: agrosanjeevni@gmail.com" . "\r\n" .
"CC: agrosanjeevni@gmail.com";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:thank-you.php");
?>