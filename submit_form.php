<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit']))
{
    $emp_code = $_POST['emp_code'];
    $emp_name = $_POST['emp_name'];
    $department = $_POST['department'];
    $sap_id1 = $_POST['sap_id1'];
    $sap_id2 = $_POST['sap_id2'];
    $sap_id3 = $_POST['sap_id3'];
    $sap_id4 = $_POST['sap_id4'];
    $sap_id5 = $_POST['sap_id5'];
    $usage = $_POST['usage'];
    $location = $_POST['location'];
  
    $os_id = php_uname(); // Returns the operating system name (e.g., Linux, Windows NT)

    

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'C:\xampp\htdocs\EmployeeForm\PHPMailer\PHPMailer.php';
require 'C:\xampp\htdocs\EmployeeForm\PHPMailer\SMTP.php';
require 'C:\xampp\htdocs\EmployeeForm\PHPMailer\Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'pranjalshinde1401@gmail.com';                     //SMTP username
    $mail->Password   = 'fvdh bjro qpco idkh';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('pranjalshinde1401@gmail.com', 'pranjal');
    $mail->addAddress('pranjalshinde1401@gmail.com', 'sid');     //Add a recipient
   
  

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'employee data form';
    $mail->Body    = "Employee Code - $emp_code <br> Employee Name - $emp_name <br> Department - $department<br> SAP Id1 - $sap_id1<br> SAP Id2 - $sap_id2<br> SAP Id3 - $sap_id3<br>SAP Id4 - $sap_id4<br>SAP Id5 - $sap_id5<br> 
    Usage - $usage <br> Location - $location <br> Operationg system - $os_id";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}




}

