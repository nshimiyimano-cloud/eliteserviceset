<?php
require 'inc/db.php';
require 'inc/mailer.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');
    if($name === '' || $email === '' || $message === ''){ header('Location: contact.php?error=1'); exit; }
    $attachmentPath = null;
    if(!empty($_FILES['attachment']['name'])){
        $uploadDir = __DIR__ . '/assets/uploads/';
        if(!is_dir($uploadDir)) mkdir($uploadDir,0755,true);
        $fname = time() . '_' . basename($_FILES['attachment']['name']);
        $target = $uploadDir . $fname;
        if(move_uploaded_file($_FILES['attachment']['tmp_name'], $target)) $attachmentPath = $fname;
    }
    $stmt = $pdo->prepare("INSERT INTO contacts (name,email,phone,message,attachment) VALUES (?,?,?,?,?)");
    $stmt->execute([$name,$email,$phone,$message,$attachmentPath]);
    $to = 'info@eliteserviceset.example';
    $subj = 'New contact from website';
    $body = "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>" . "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>" . "<p><strong>Phone:</strong> " . htmlspecialchars($phone) . "</p>" . "<p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>";
    send_site_mail($to,$subj,$body,true);
    header('Location: contact.php?sent=1'); exit;
}
header('Location: contact.php'); exit;