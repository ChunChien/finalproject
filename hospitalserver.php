<?php
session_start();

if(isset($_SESSION['hos_login'])){
	if($_SESSION['hos_login']=="Yes"){
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

if(isset($_COOKIE["uName"])){
	$cookieID=$_COOKIE["uName"];
}else{ 
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
                <li1><a href="hospitalserver.php">首頁</a></li1>
                <li><a href="newpublic.php">問卷表單</a></li>
                <li><a href="hospitallist.php">填答狀況</a></li>
                <li><a href="hoschart.php">圖表分析</a></li>
                <li><a href="hosreset.php">更改帳戶設定</a></li>
                <li><a href="hoslogout.php">登出</a></li>
            </ul>
            </div>
            <div class="content">
            <div class="container">
                <center>
                    <h1>歡迎使用糖尿病問卷系統</h1>
                </center>
            </div>
            </div>
        </div>
    </body>
</html>