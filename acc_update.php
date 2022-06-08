<?php
require("DBconnect.php");
session_start();

if(isset($_SESSION['admin_login'])){
	if($_SESSION['admin_login']=="Yes"){
	}else{
		echo "<script type='text/javascript'>";
        echo "alert('您尚未登入');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=hospitallogin.php'>";
		exit();
	}
}else{
	echo "<script type='text/javascript'>";
        echo "alert('您尚未登入');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=hospitallogin.php'>";
	exit();
}

$cookieID=$_COOKIE["county"];
$uNo=$_GET["uNo"];

$SQL="SELECT * FROM hospital WHERE uNo='$uNo'";

if($result=mysqli_query($link,$SQL)){
    while($row=mysqli_fetch_assoc($result)){
        $uName=$row['uName'];
        $account=$row['account'];
        $psw=$row['psw'];
        $email=$row['email'];
    }
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="主選單" content="width=device-width, initial-scale=1.0">
        <title>主選單</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <div class="wrap">
            <div class="sidebar">

            <ul class="menu">
                <li1><a href="signup.php">新增醫療院所</a></li1>
                <li><a href="accountlist.php">管理醫療院所名單</a></li>
                <li><a href="admintopub.php"><?php echo $cookieID?>民眾填答狀況</a></li>
                <li><a href="adminchart.php">圖表分析</a></li>
                <li><a href="adminlogout.php">登出</a></li>
            </ul>
            </div>

            <div class="content">
            <div class="container">
                <center>

<h1>使用者更新</h1>

<form action="" method="post">
User Number: <?php echo $uNo;?></br>
<input type="hidden" name ="uNo" value='<?php echo $uNo;?>'>
單位:<input type="text" name="uName" value='<?php echo $uName;?>'></br>
縣市:<?php echo $cookieID;?></br>
帳號:<input type="text" name="account" value='<?php echo $account;?>'></br>
密碼:<input type="text" name="psw" value='<?php echo $psw;?>'></br>
信箱:<input type="text" name="email" value='<?php echo $email;?>'></br>


<input type="submit" value="更改"></br>
</form>

<?php

require("DBconnect.php");

if (isset($_POST["uNo"])){
    $uNo=$_POST["uNo"];
    $uName=$_POST["uName"];
    $account=$_POST["account"];
    $psw=$_POST["psw"];
    $email=$_POST["email"];

    $SQL="UPDATE hospital SET uName='$uName' , account='$account',psw='$psw' , email='$email' WHERE uNo='$uNo'";

    if(mysqli_query($link, $SQL)){
        echo "<script type='text/javascript'>";
        echo "alert('更新成功');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=accountlist.php'>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('更新失敗');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=accountlist.php'>";
    }
}else{}


?>