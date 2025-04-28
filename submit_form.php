<?php
// submit_form.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $os = PHP_OS; // get OS name

    $to = "pranjalshinde1401@gmail.com"; // recipient (not working in localhost)
    $subject = "Employee Form Submission";
    $message = "Employee Code: $emp_code\nEmployee Name: $emp_name\nDepartment: $department\nSAP IDs: $sap_id1, $sap_id2, $sap_id3, $sap_id4, $sap_id5\nUsage: $usage\nLocation: $location\nOperating System: $os";

    $headers = "From: noreply@yourdomain.com\r\n";
    
    // Because mail() won't work in XAMPP, let's simulate success:
    $simulate_mail = false; // Change to false if you want real mail()

    if ($simulate_mail) {
        echo "✅ Form submitted successfully! (Simulated email sending)";
    } else {
        if (mail($to, $subject, $message, $headers)) {
            echo "✅ Form submitted successfully!";
        } else {
            echo "❌ Error sending email. Check mail server settings.";
        }
    }
} else {
    echo "Form not submitted.";
}
?>

