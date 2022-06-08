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

require('DBconnect.php');
$cookieID = $_COOKIE["uName"];

$SQL = "SELECT*FROM hospital WHERE uName='$cookieID'";

if($result=mysqli_query($link,$SQL)){
    while($row=mysqli_fetch_assoc($result)){
        $uName=$row['uName'];
        $county=$row['county'];
    }
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="問卷表單" content="width=device-width, initial-scale=1.0">
        <title>問卷表單</title>
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
            <center><h1>問卷調查</h1>
                <form action="newpublicserver.php" name="myForm" method="post">
                    <table align="center">
                        <tr>
                            <td><b>縣市：</b><?php echo $county;?><input type="hidden" name="county" value="<?php echo $county;?>"></td>
                        </tr>
                        <tr>
                            <td><b>就診醫院：</b><?php echo $uName;?><input type="hidden" name="member" value="<?php echo $uName;?>"></td>
                        </tr>
                        <tr>
                            <td><b>收案日期:</b></td>
                            <td><input type="date" name="date1"></td>
                        </tr>
                        <tr>
                            <td><b>您的姓名:</b></td>
                            <td><input type="text" name="uName" placeholder="您的大名"></td>
                        </tr>
                        <tr>
                            <td><b>您的性別:</b></td>
                            <td><input type="radio" name="gender" value="男">男性<input type="radio" name="gender" value="女">女性</td>
                        </tr>
                        <tr>
                            <td><b>您的年齡:</b></td>
                            <td><input type="number" name="age">歲</td>
                        </tr>
                        <tr>
                            <td><b>您的連絡電話:</b></td>
                            <td><input type="tel" name="tel"></td>
                        </tr>
                        <tr>
                            <td><b>您的連絡地址:</b></td>
                            <td><input type="text" name="place"></td>
                        </tr>
                        <tr>
                            <td><b>您的身高:</b></td>
                            <td><input type="number" name="height">cm</td>
                        </tr>
                        <tr>
                            <td><b>您的體重:</b></td>
                            <td><input type="number" name="weight">kg</td>
                        </tr>
                        <tr>
                            <td><b>您的血糖檢驗日期:</b></td>
                            <td><input type="date" name="date2"></td>
                        </tr>
                        <tr>
                            <td><b>您的空腹血糖檢驗值:</b></td>
                            <td><input type="number" name="glucose"></td>
                        </tr>
                        <tr>
                            <td><b>主食類是否攝取為一平碗:</b></td>
                            <td><input type="radio" name="rice" value="1">從不<input type="radio" name="rice" value="2">很少(1-2天/週)<input type="radio" name="rice" value="3">偶爾(3-5天/週)<input type="radio" name="rice" value="4">經常(5-7天/週)<input type="radio" name="rice" value="5">天天(7天/週)
                        </td>
                        </tr>
                        <tr>
                            <td><b>是否有喝飲料的習慣:</b></td>
                            <td><input type="radio" name="drink" value="1">從不<input type="radio" name="drink" value="2">很少(1-2天/週)<input type="radio" name="drink" value="3">偶爾(3-5天/週)<input type="radio" name="drink" value="4">經常(5-7天/週)<input type="radio" name="drink" value="5">天天(7天/週)
                        </td>
                        </tr>
                        <tr>
                            <td><b>飲料的甜度為何:</b></td>
                            <td><input type="radio" name="sugar" value="0">不喝飲料<input type="radio" name="sugar" value="1">無糖<input type="radio" name="sugar" value="2">微糖<input type="radio" name="sugar" value="3">半糖<input type="radio" name="sugar" value="4">少糖<input type="radio" name="sugar" value="5">全糖
                        </td>
                        </tr>
                        </tr>
                        <tr>
                            <td><b>是否有吃餅乾零食的習慣:</b></td>
                            <td><input type="radio" name="snack" value="1">從不<input type="radio" name="snack" value="2">很少(1-2天/週)<input type="radio" name="snack" value="3">偶爾(3-5天/週)<input type="radio" name="snack" value="4">經常(5-7天/週)<input type="radio" name="snack" value="5">天天(7天/週)
                        </td>
                        <tr>
                            <td><b>是否有吃蛋糕甜點的習慣:</b></td>
                            <td><input type="radio" name="cake" value="1">從不<input type="radio" name="cake" value="2">很少(1-2天/週)<input type="radio" name="cake" value="3">偶爾(3-5天/週)<input type="radio" name="cake" value="4">經常(5-7天/週)<input type="radio" name="cake" value="5">天天(7天/週)
                        </td>
                        <tr>
                            <td><b>平日是否有規律運動達30分鐘:</b></td>
                            <td><input type="radio" name="sport" value="1">從不<input type="radio" name="sport" value="2">很少(1-2天/週)<input type="radio" name="sport" value="3">偶爾(3-5天/週)<input type="radio" name="sport" value="4">經常(5-7天/週)<input type="radio" name="sport" value="5">天天(7天/週)
                        </td>


                    </table>
                    <center>
                    <input type="submit">
                    <input type="reset">
                    <input type="button" value="返回主選單" onclick="location.href='hospitalserver.php'">
                    </center> 
                    </form>
            </center>
        
</div>
</html>