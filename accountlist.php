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

require("DBconnect.php");
$cookieID=$_COOKIE["county"];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="主選單" content="width=device-width, initial-scale=1.0">
        <title>管理醫療院所名單</title>
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
                <center>



<?php
$SQL="SELECT * FROM hospital WHERE county='$cookieID'";


echo "<h1>使用者列表</h1>";
if($result=mysqli_query($link,$SQL)){
    echo "<table border='1'>";
    echo "<tr>";
    echo "<td>No.</td><td>縣市</td><td>醫療院所</td><td>開通帳號</td><td>開通密碼</td><td>單位信箱</td><td>刪除</td><td>修改</td><td>重新寄發初始帳號信</td></tr>";
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row["uNo"]."</td><td>".$row["county"]."</td><td>".$row["uName"]."</td><td>".$row["account"]."</td><td>".$row["psw"]."</td><td>".$row["email"]."</td><td><a href='acc_delete.php?uNo=".$row["uNo"]."'>刪除</a></td><td><a href='acc_update.php?uNo=".$row["uNo"]."'>修改</a></td><td><a href='acc_resent.php?uNo=".$row["uNo"]."'>重新寄發初始帳號信</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
<br/>
<p>
</center>
            </div>
            </div>
        </div>
</html>