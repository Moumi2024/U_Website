<?php
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$n = sanitize_input($_POST['name']);
$e = filter_var(sanitize_input($_POST['email']), FILTER_VALIDATE_EMAIL);
$s = sanitize_input($_POST['subject']);
$m = sanitize_input($_POST['message']);

if ($e === false) {
    echo "Invalid email address.";
    exit;
}

$email_from = 'info876543@gmail.com';
$email_subject = 'New Form Submission';
$email_body = "User Name: $n.\n".
              "User Email: $e.\n".
              "Subject: $s.\n".
              "User Message: $m.\n";

$to = "byaparimoumi@gmail.com";            
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $e \r\n";

if (mail($to, $email_subject, $email_body, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send email.";
}
?>
