<?php
session_start();
require("DBconnect.php");

if(isset($_POST["account"])){
	if($_POST["account"]!=null){
		$uId=$_POST["account"];
		$uPwd=$_POST["apsw"];
		$role=$_POST["role"];

		if ($role=="hospital"){
			$SQL="SELECT * FROM hospital WHERE account='$uId' AND psw='$uPwd'";

			$result=mysqli_query($link,$SQL);

			if(mysqli_num_rows($result)==1){
				$_SESSION["hos_login"]="Yes";
				$row=mysqli_fetch_assoc($result);
				$uName=$row["uName"];
				setcookie("uName",$uName,time()+17280);
				header('Location: hospitalserver.php');
			}else{
				echo "<script type='text/javascript'>";
				echo "alert('帳號密碼輸入錯誤');";
				echo "</script>";
				echo "<meta http-equiv='Refresh' content='0; url=hospitallogin.php'>";
				exit();
			}
		}else{
			$SQL="SELECT * FROM gov WHERE account='$uId' AND psw='$uPwd'";

			$result=mysqli_query($link,$SQL);

			if(mysqli_num_rows($result)==1){
				$_SESSION["admin_login"]="Yes";
				$row=mysqli_fetch_assoc($result);
				$county=$row["county"];
				setcookie("county",$county,time()+17280);
				header('Location: adminserver.php');
			}else{
				echo "<script type='text/javascript'>";
				echo "alert('帳號密碼輸入錯誤');";
				echo "</script>";
				echo "<meta http-equiv='Refresh' content='0; url=hospitallogin.php'>";
				exit();
			}
		}
		
    }else{
		echo "<script type='text/javascript'>";
        echo "alert('您尚未輸入密碼');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=hospitallogin.php'>";
		exit();
	}
}else{
	echo "<script type='text/javascript'>";
    echo "alert('請輸入帳號密碼');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=hospitallogin.php'>";
	exit();;
}


?>