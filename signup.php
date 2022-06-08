<?php
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
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="主選單" content="width=device-width, initial-scale=1.0">
        <title>新增醫療院所</title>
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
                <li><a href="adminreset.php">帳戶設定</a></li>
                <li><a href="adminlogout.php">登出</a></li>
            </ul>
            </div>

            <div class="content">
                <div class="container">
					<form action="signserver.php" method="post">

					單位:<input type="text" name="uName" required="required">
					縣市:<?php echo $cookieID;?>
					<input type="hidden" name ="county" value='<?php echo $cookieID;?>'>
					信箱:<input type="email" name="email" required="required">

					<input type="submit" value="寄送email">
					</form>
					<br/>
					
				</div>
			</div>
		</div>
</html>