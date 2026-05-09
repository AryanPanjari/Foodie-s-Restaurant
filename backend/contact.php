<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/db.php';

$name    = $_POST['name'] ?? '';
$email   = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

// Save to database
$stmt = $conn->prepare("INSERT INTO contacts(name, email, message) VALUES(?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);
$stmt->execute();

// Send reply email
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your-email@gmail.com'; // your gmail
    $mail->Password   = 'your-app-password';     // gmail app password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Reply to customer
    $mail->setFrom('your-email@gmail.com', 'Foodie\'s Restaurant');
    $mail->addAddress($email, $name);
    $mail->Subject = 'Thank you for contacting Foodie\'s Restaurant!';
    $mail->Body    = "Dear $name,\n\nThank you for reaching out! We have received your message and will get back to you shortly.\n\nYour message: $message\n\nWarm regards,\nFoodie's Restaurant Team";

    $mail->send();
} catch (Exception $e) {
    // Email failed but form still saved to DB
}

header('Location: ../contact/contact.html?status=success');
exit;
?>