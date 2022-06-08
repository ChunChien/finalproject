<!DOCTYPE html>
<html>
<head>
	<title>糖尿病問卷系統--登入頁面</title>
	<link rel="stylesheet" type="text/css" href="hoslogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>

<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="" method="post">
					<label for="chk" aria-hidden="true">第一次登入</label>
					<input type="text" name="ini_acc" placeholder="初始帳號" required="">
					<input type="text" name="account" placeholder="更改帳號" required="">
					<input type="password" name="firstpsw" placeholder="初始密碼" required="">
					<input type="password" name="psw" placeholder="更改密碼" required="">
					
					<button>更改</button>
				</form>
			</div>

			<div class="login">
				<form action="hos_loginconfirm.php" method="post">
					<label for="chk" aria-hidden="true">非第一次登入</label>
					<input type="text" name="account" placeholder="帳號" required="">
					<input type="password" name="apsw" placeholder="密碼" required="">
					<table align="center">
					<tr><td>衛生局<input type="radio" name="role" value="admin"></td><td>醫療院所<input type="radio" name="role" value="hospital"></td></tr>
					</table>
					<center><a href="forgetpsw.php">忘記密碼</a></center>
					<button>登入</button>
				</form>
			</div>
	</div>
    
</body>


<?php

require('DBconnect.php');

if (isset($_POST["ini_acc"])){
    if ($_POST["ini_acc"]!=null){

        $ini_acc = $_POST["ini_acc"];
        $firstpsw = $_POST["firstpsw"];


        $SQL="SELECT*FROM hospital WHERE account='$ini_acc' AND psw='$firstpsw'";

        $result=mysqli_query($link,$SQL);

			if (mysqli_num_rows($result)==1){
				$account=$_POST["account"];
				$psw=$_POST["psw"];

				$SQL = "SELECT*FROM hospital WHERE account='$account'";

				$result=mysqli_query($link,$SQL);

				if (mysqli_num_rows($result)==1){
					echo "<script type='text/javascript'>";
					echo "alert('帳號已經存在，請設定其他帳號');";
					echo "</script>";
					echo "<meta http-equiv='Refresh' content='0; url=hospitallogin.php'>";
				}else{

				
				$SQL="UPDATE hospital SET account='$account' ,psw='$psw' WHERE account='$ini_acc'";
				
				if(mysqli_query($link, $SQL)){
					echo "<script type='text/javascript'>";
					echo "alert('更改密碼成功');";
					echo "</script>";
					echo "<meta http-equiv='Refresh' content='0; url=hospitallogin.php'>";
				}else{
					echo "<script type='text/javascript'>";
					echo "alert('更改密碼失敗');";
					echo "</script>";
					echo "<meta http-equiv='Refresh' content='0; url=hospitallogin.php'>";
				}
			}
			}else{
				echo "<script type='text/javascript'>";
				echo "alert('帳號密碼輸入錯誤');";
				echo "</script>";
				echo "<meta http-equiv='Refresh' content='0; url=hospitallogin.php'>";}
		
			

	}else{
		echo "您尚未輸入帳號或密碼";
	}
}else{

}




?>

</html>