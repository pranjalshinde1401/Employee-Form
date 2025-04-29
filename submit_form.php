<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'C:\xampp\htdocs\EmployeeForm\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\EmployeeForm\PHPMailer\src\SMTP.php';
require 'C:\xampp\htdocs\EmployeeForm\PHPMailer\src\Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'pranjalshinde1401@gmail.com';                     //SMTP username
    $mail->Password   = 'fvdh bjro qpco idkh';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('pranjalshinde1401@gmail.com', 'pranjal');
    $mail->addAddress('sidshinde2901@gmail.com', 'sid');     //Add a recipient
   
  

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'employee data form';
    $mail->Body    = '';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
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

    // Detect operating system from user agent
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $os = "Unknown OS";

    if (preg_match('/linux/i', $userAgent)) $os = "Linux";
    elseif (preg_match('/macintosh|mac os x/i', $userAgent)) $os = "Mac";
    elseif (preg_match('/windows|win32/i', $userAgent)) $os = "Windows";

    // Email content
    $body = "
Employee Code: $emp_code
Employee Name: $emp_name
Department: $department

SAP Login IDs:
1. $sap_id1
2. $sap_id2
3. $sap_id3
4. $sap_id4
5. $sap_id5

Usage Type: $usage
Location: $location

Operating System: $os
User Agent: $userAgent
    ";
}

$headers = "From:pranjalshinde2901@gmail.com";
if (mail($to, $subject, $message, $headers)) {
    echo "Form submitted successfully. Email sent!";
} else {
    echo "There was a problem sending the email.";
}
 else {
echo "Invalid request.";
}
?>
