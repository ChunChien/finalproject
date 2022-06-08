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

require("DBconnect.php");
$SQL="SELECT*FROM hospital WHERE uName='$cookieID'";

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
        <title>更改帳戶設定</title>
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
                    <form action="" method="POST">
                        醫療院所: <?php echo $uName;?>
                        <input type="hidden" name="uName" value="<?php echo $uName;?>"><br/>
                        帳號:<input type="text" name="account" value="<?php echo $account;?>"><br/>
                        密碼:<input type="text" name="psw" value='<?php echo $psw;?>'></br>
                        信箱:<input type="text" name="email" value='<?php echo $email;?>'></br>


                        <input type="submit" value="更改"></br>
                    </form>

                    <?php
                    
                    if (isset($_POST["uName"])){
                        $uName=$_POST["uName"];
                        $account=$_POST["account"];
                        $psw=$_POST["psw"];
                        $email=$_POST["email"];

                        $SQL="UPDATE hospital SET account='$account',psw='$psw',email='$email' WHERE uName='$uName'";

                        if(mysqli_query($link, $SQL)){
                            echo "<script type='text/javascript'>";
                            echo "alert('更新成功');";
                            echo "</script>";
                            echo "<meta http-equiv='Refresh' content='0; url=hospitalserver.php'>";
                        }else{
                            echo "<script type='text/javascript'>";
                            echo "alert('更新失敗');";
                            echo "</script>";
                            echo "<meta http-equiv='Refresh' content='0; url=hospitalserver.php'>";
                        }
                    }else{}
                    
                    ?>


                </center>