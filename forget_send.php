<?php

    require("DBconnect.php");

    $cookieid=$_COOKIE['email'];

    $bytes = openssl_random_pseudo_bytes(3);
    $check = bin2hex($bytes);
    setcookie("check",$check,time()+17280);
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'ssl://smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'chienforgame@gmail.com';                     //SMTP username
        $mail->Password   = 'jglycwchjpgbphzk';                               //SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;
        $mail-> SMTPSecure = 'ssl';                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('chienforgame@gmail.com', 'admin');
        $mail->addAddress($cookieid);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "=?UTF-8?B?".base64_encode("忘記密碼驗證信")."?=";
        $message="您好，您的糖尿病問卷平台重設密碼之驗證碼為".$check;
        $mail->Body    = $message;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo "<script type='text/javascript'>";
        echo "alert('成功寄出初始帳號密碼信件');";
        echo "</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    ?>
<html>
    <form action="resetpsw.php" method="POST">
    請輸入驗證碼:<input type="text" name="check"><br/>
    重設密碼:<input type="psw" name="psw"><br/>
    <input type="submit" value="重設">
    </form>
</html>

