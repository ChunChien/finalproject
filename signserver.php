<?php
require("DBconnect.php");

$uName=$_POST["uName"];
$county=$_POST["county"];
$email=$_POST["email"];

//尋找是否註冊過
$SQL="SELECT * FROM hospital WHERE uName = '$uName' AND county='$county'";
$result=mysqli_query($link,$SQL);

if (mysqli_num_rows($result)==1){
    echo "<script type='text/javascript'>";
    echo "alert('$uName.帳號已存在');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=signup.php'>";
    exit();
}else{
}

    $bytes = openssl_random_pseudo_bytes(3);
    $bytes2 = openssl_random_pseudo_bytes(4);
    $ini_acc = bin2hex($bytes);
    $ini_psw = bin2hex($bytes2);

    $query="INSERT INTO hospital (account,psw,county,uName,email) VALUES ('$ini_acc','$ini_psw','$county','$uName','$email')";


    if(mysqli_query($link, $query)){
        echo "<script type='text/javascript'>";
        echo "alert('註冊成功');";
        echo "</script>";

    }else{
        echo "<script type='text/javascript'>";
        echo "alert('註冊失敗');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=signup.php'>";
    }


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
        $mail->addAddress($email, $uName);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "=?UTF-8?B?".base64_encode("糖尿病系統帳號開通通知")."?=";
        $message=$uName."您好，您的帳號資訊如下:<br/>單位:".$uName."<br/>初始帳號:".$ini_acc."<br/>初始密碼:".$ini_psw."<br/>請盡快於登入頁面重新設定您的帳號密碼";
        $mail->Body    = $message;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo "<script type='text/javascript'>";
        echo "alert('成功寄出初始帳號密碼信件');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=signup.php'>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }



//隨機生成帳號

?>