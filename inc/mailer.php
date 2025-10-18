<?php
$MAIL_CFG = [
    'host' => 'smtp.example.com',
    'username' => 'you@example.com',
    'password' => 'your_smtp_password',
    'port' => 587,
    'secure' => 'tls',
    'from_email' => 'info@eliteserviceset.example',
    'from_name' => 'EliteServiceSet'
];
function send_site_mail($to, $subject, $body, $isHtml=false){
    global $MAIL_CFG;
    if(file_exists(__DIR__ . '/../vendor/autoload.php')){
        require_once __DIR__ . '/../vendor/autoload.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = $MAIL_CFG['host'];
            $mail->SMTPAuth = true;
            $mail->Username = $MAIL_CFG['username'];
            $mail->Password = $MAIL_CFG['password'];
            $mail->SMTPSecure = $MAIL_CFG['secure'];
            $mail->Port = $MAIL_CFG['port'];
            $mail->setFrom($MAIL_CFG['from_email'], $MAIL_CFG['from_name']);
            $mail->addAddress($to);
            $mail->isHTML($isHtml);
            $mail->Subject = $subject;
            $mail->Body = $body;
            if(!$isHtml) $mail->AltBody = $body;
            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log('PHPMailer Error: '.$mail->ErrorInfo);
        }
    }
    $headers = 'From: '.$MAIL_CFG['from_name'].' <'.$MAIL_CFG['from_email'].">\r\nReply-To: ".$MAIL_CFG['from_email']."\r\nX-Mailer: PHP/".phpversion();
    if($isHtml) $headers .= "\r\nMIME-Version: 1.0\r\nContent-type: text/html; charset=UTF-8\r\n";
    return @mail($to, $subject, $body, $headers);
}
