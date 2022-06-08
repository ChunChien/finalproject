<?php
require("DBconnect.php");
session_start();

if(isset($_SESSION['hos_login'])){
	if($_SESSION['hos_login']=="Yes"){
	}else{
		echo "非法進入系統";
		exit();
	}
}else{
	echo "非法進入系統";
	exit();
}

$cookieID=$_COOKIE["uName"];
$uNo=$_GET["uNo"];

$SQL="SELECT * FROM public WHERE uNo='$uNo'";

if($result=mysqli_query($link,$SQL)){
    while($row=mysqli_fetch_assoc($result)){
        $date1=$row["date1"];
        $uName=$row["uName"];
        $gender=$row["gender"];
        $age=$row["age"];
        $tel=$row["tel"];
        $place=$row["place"];
        $height=$row["height"];
        $weight=$row["uweight"];
        $date2=$row["date2"];
        $glucose=$row["glucose"];
        $rice=$row["rice"];
        $drink=$row["drink"];
        $sugar=$row["sugar"];
        $snack=$row["snack"];
        $cake=$row["cake"];
        $sport=$row["sport"];
    }
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="主選單" content="width=device-width, initial-scale=1.0">
        <title>民眾回答問卷修改</title>
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
            <center>

<h1>民眾回答問卷修改</h1>

<form action="" method="post">
User Number: <?php echo $uNo;?></br>
<input type="hidden" name ="uNo" value='<?php echo $uNo;?>'>
                <table>
                <tr>
                    <td><b>收案日期:</b></td>
                    <td><input type="date" name="date1" value="<?php echo $date1?>"></td>
                </tr>
                <tr>
                    <td><b>您的姓名:</b></td>
                    <td><input type="text" name="uName" value="<?php echo $uName?>"></td>
                </tr>
                <tr>
                    <td><b>您的性別:</b></td>
                    <td><?php
                        if($gender=='男'){
                            echo "男性<input type='radio' name='gender' value='男' checked> 女性<input type='radio' name='gender' value='女'></br>";
                        }else{
                            echo "男性<input type='radio' name='gender' value='男' > 女性<input type='radio' name='gender' value='女' checked></br>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><b>您的年齡:</b></td>
                    <td><input type="number" name="age" value="<?php echo $age?>">歲</td>
                </tr>
                <tr>
                    <td><b>您的連絡電話:</b></td>
                    <td><input type="tel" name="tel" value="<?php echo $tel?>"></td>
                </tr>
                <tr>
                    <td><b>您的連絡地址:</b></td>
                    <td><input type="text" name="place" value="<?php echo $place?>"></td>
                </tr>
                <tr>
                    <td><b>您的身高:</b></td>
                    <td><input type="number" name="height" value="<?php echo $height?>">cm</td>
                </tr>
                <tr>
                    <td><b>您的體重:</b></td>
                    <td><input type="number" name="weight" value="<?php echo $weight?>">kg</td>
                </tr>
                <tr>
                    <td><b>您的血糖檢驗日期:</b></td>
                    <td><input type="date" name="date2" value="<?php echo $date2?>"></td>
                </tr>
                <tr>
                    <td><b>您的空腹血糖檢驗值:</b></td>
                    <td><input type="number" name="glucose" value="<?php echo $glucose?>"></td>
                </tr>
                <tr>
                    <td><b>主食類是否攝取為一平碗:</b></td>
                    <td><?php
                        if($rice=='1'){
                            echo "<input type='radio' name='rice' value='1' checked>從不<input type='radio' name='rice' value='2'>很少(1-2天/週)<input type='radio' name='rice' value='3'>偶爾(3-5天/週)<input type='radio' name='rice' value='4'>經常(5-7天/週)<input type='radio' name='rice' value='5'>天天(7天/週)</br>";
                        }elseif($rice=='2'){
                            echo "<input type='radio' name='rice' value='1' >從不<input type='radio' name='rice' value='2' checked>很少(1-2天/週)<input type='radio' name='rice' value='3'>偶爾(3-5天/週)<input type='radio' name='rice' value='4'>經常(5-7天/週)<input type='radio' name='rice' value='5'>天天(7天/週)</br>";
                        }elseif($rice=='3'){
                            echo "<input type='radio' name='rice' value='1' >從不<input type='radio' name='rice' value='2'>很少(1-2天/週)<input type='radio' name='rice' value='3' checked>偶爾(3-5天/週)<input type='radio' name='rice' value='4'>經常(5-7天/週)<input type='radio' name='rice' value='5'>天天(7天/週)</br>";
                        }elseif($rice=='4'){
                            echo "<input type='radio' name='rice' value='1' >從不<input type='radio' name='rice' value='2'>很少(1-2天/週)<input type='radio' name='rice' value='3'>偶爾(3-5天/週)<input type='radio' name='rice' value='4' checked>經常(5-7天/週)<input type='radio' name='rice' value='5'>天天(7天/週)</br>";
                        }                     
                        else{
                            echo "<input type='radio' name='rice' value='1' >從不<input type='radio' name='rice' value='2'>很少(1-2天/週)<input type='radio' name='rice' value='3'>偶爾(3-5天/週)<input type='radio' name='rice' value='4'>經常(5-7天/週)<input type='radio' name='rice' value='5' checked>天天(7天/週)</br>";
                        }
                        ?>
                </td>
                </tr>
                <tr>
                    <td><b>是否有喝飲料的習慣:</b></td>
                    <td><?php
                        if($drink=='1'){
                            echo "<input type='radio' name='drink' value='1' checked>從不<input type='radio' name='drink' value='2'>很少(1-2天/週)<input type='radio' name='drink' value='3'>偶爾(3-5天/週)<input type='radio' name='drink' value='4'>經常(5-7天/週)<input type='radio' name='drink' value='5'>天天(7天/週)</br>";
                        }elseif($drink=='2'){
                            echo "<input type='radio' name='drink' value='1' >從不<input type='radio' name='drink' value='2' checked>很少(1-2天/週)<input type='radio' name='drink' value='3'>偶爾(3-5天/週)<input type='radio' name='drink' value='4'>經常(5-7天/週)<input type='radio' name='drink' value='5'>天天(7天/週)</br>";
                        }elseif($drink=='3'){
                            echo "<input type='radio' name='drink' value='1' >從不<input type='radio' name='drink' value='2'>很少(1-2天/週)<input type='radio' name='drink' value='3' checked>偶爾(3-5天/週)<input type='radio' name='drink' value='4'>經常(5-7天/週)<input type='radio' name='drink' value='5'>天天(7天/週)</br>";
                        }elseif($drink=='4'){
                            echo "<input type='radio' name='drink' value='1' >從不<input type='radio' name='drink' value='2'>很少(1-2天/週)<input type='radio' name='drink' value='3'>偶爾(3-5天/週)<input type='radio' name='drink' value='4' checked>經常(5-7天/週)<input type='radio' name='drink' value='5'>天天(7天/週)</br>";
                        }                     
                        else{
                            echo "<input type='radio' name='drink' value='1' >從不<input type='radio' name='drink' value='2'>很少(1-2天/週)<input type='radio' name='drink' value='3'>偶爾(3-5天/週)<input type='radio' name='drink' value='4'>經常(5-7天/週)<input type='radio' name='drink' value='5' checked>天天(7天/週)</br>";
                        }
                        ?>
                </td>
                </tr>
                <tr>
                    <td><b>飲料的甜度為何:</b></td>
                    <td><?php
                        if($sugar=='0'){
                            echo "<input type='radio' name='sugar' value='0' checked>不喝飲料<input type='radio' name='sugar' value='1'>無糖<input type='radio' name='sugar' value='2'>微糖<input type='radio' name='sugar' value='3'>半糖<input type='radio' name='sugar' value='4'>少糖<input type='radio' name='sugar' value='5'>全糖</br>";
                        }elseif($sugar=='1'){
                            echo "<input type='radio' name='sugar' value='0'>不喝飲料<input type='radio' name='sugar' value='1' checked>無糖<input type='radio' name='sugar' value='2'>微糖<input type='radio' name='sugar' value='3'>半糖<input type='radio' name='sugar' value='4'>少糖<input type='radio' name='sugar' value='5'>全糖</br>";
                        }elseif($sugar=='2'){
                            echo "<input type='radio' name='sugar' value='0'>不喝飲料<input type='radio' name='sugar' value='1'>無糖<input type='radio' name='sugar' value='2' checked>微糖<input type='radio' name='sugar' value='3'>半糖<input type='radio' name='sugar' value='4'>少糖<input type='radio' name='sugar' value='5'>全糖</br>";
                        }elseif($sugar=='3'){
                            echo "<input type='radio' name='sugar' value='0'>不喝飲料<input type='radio' name='sugar' value='1'>無糖<input type='radio' name='sugar' value='2'>微糖<input type='radio' name='sugar' value='3' checked>半糖<input type='radio' name='sugar' value='4'>少糖<input type='radio' name='sugar' value='5'>全糖</br>";
                        }elseif($sugar=='4'){
                            echo "<input type='radio' name='sugar' value='0'>不喝飲料<input type='radio' name='sugar' value='1'>無糖<input type='radio' name='sugar' value='2'>微糖<input type='radio' name='sugar' value='3'>半糖<input type='radio' name='sugar' value='4' checked>少糖<input type='radio' name='sugar' value='5'>全糖</br>";
                        }                                          
                        else{
                            echo "<input type='radio' name='sugar' value='0'>不喝飲料<input type='radio' name='sugar' value='1'>無糖<input type='radio' name='sugar' value='2'>微糖<input type='radio' name='sugar' value='3'>半糖<input type='radio' name='sugar' value='4'>少糖<input type='radio' name='sugar' value='5' checked>全糖</br>";
                        }
                        ?>
                </td>
                </tr>
                </tr>
                <tr>
                    <td><b>是否有吃餅乾零食的習慣:</b></td>
                    <td><?php
                        if($snack=='1'){
                            echo "<input type='radio' name='snack' value='1' checked>從不<input type='radio' name='snack' value='2'>很少(1-2天/週)<input type='radio' name='snack' value='3'>偶爾(3-5天/週)<input type='radio' name='snack' value='4'>經常(5-7天/週)<input type='radio' name='snack' value='5'>天天(7天/週)</br>";
                        }elseif($snack=='2'){
                            echo "<input type='radio' name='snack' value='1' >從不<input type='radio' name='snack' value='2' checked>很少(1-2天/週)<input type='radio' name='snack' value='3'>偶爾(3-5天/週)<input type='radio' name='snack' value='4'>經常(5-7天/週)<input type='radio' name='snack' value='5'>天天(7天/週)</br>";
                        }elseif($snack=='3'){
                            echo "<input type='radio' name='snack' value='1' >從不<input type='radio' name='snack' value='2'>很少(1-2天/週)<input type='radio' name='snack' value='3' checked>偶爾(3-5天/週)<input type='radio' name='snack' value='4'>經常(5-7天/週)<input type='radio' name='snack' value='5'>天天(7天/週)</br>";
                        }elseif($snack=='4'){
                            echo "<input type='radio' name='snack' value='1' >從不<input type='radio' name='snack' value='2'>很少(1-2天/週)<input type='radio' name='snack' value='3'>偶爾(3-5天/週)<input type='radio' name='snack' value='4' checked>經常(5-7天/週)<input type='radio' name='snack' value='5'>天天(7天/週)</br>";
                        }                     
                        else{
                            echo "<input type='radio' name='snack' value='1' >從不<input type='radio' name='snack' value='2'>很少(1-2天/週)<input type='radio' name='snack' value='3'>偶爾(3-5天/週)<input type='radio' name='snack' value='4'>經常(5-7天/週)<input type='radio' name='snack' value='5' checked>天天(7天/週)</br>";
                        }
                        ?>
                </td>
                <tr>
                    <td><b>是否有吃蛋糕甜點的習慣:</b></td>
                    <td><?php
                        if($cake=='1'){
                            echo "<input type='radio' name='cake' value='1' checked>從不<input type='radio' name='cake' value='2'>很少(1-2天/週)<input type='radio' name='cake' value='3'>偶爾(3-5天/週)<input type='radio' name='cake' value='4'>經常(5-7天/週)<input type='radio' name='cake' value='5'>天天(7天/週)</br>";
                        }elseif($cake=='2'){
                            echo "<input type='radio' name='cake' value='1' >從不<input type='radio' name='cake' value='2' checked>很少(1-2天/週)<input type='radio' name='cake' value='3'>偶爾(3-5天/週)<input type='radio' name='cake' value='4'>經常(5-7天/週)<input type='radio' name='cake' value='5'>天天(7天/週)</br>";
                        }elseif($cake=='3'){
                            echo "<input type='radio' name='cake' value='1' >從不<input type='radio' name='cake' value='2'>很少(1-2天/週)<input type='radio' name='cake' value='3' checked>偶爾(3-5天/週)<input type='radio' name='cake' value='4'>經常(5-7天/週)<input type='radio' name='cake' value='5'>天天(7天/週)</br>";
                        }elseif($cake=='4'){
                            echo "<input type='radio' name='cake' value='1' >從不<input type='radio' name='cake' value='2'>很少(1-2天/週)<input type='radio' name='cake' value='3'>偶爾(3-5天/週)<input type='radio' name='cake' value='4' checked>經常(5-7天/週)<input type='radio' name='cake' value='5'>天天(7天/週)</br>";
                        }                     
                        else{
                            echo "<input type='radio' name='cake' value='1' >從不<input type='radio' name='cake' value='2'>很少(1-2天/週)<input type='radio' name='cake' value='3'>偶爾(3-5天/週)<input type='radio' name='cake' value='4'>經常(5-7天/週)<input type='radio' name='cake' value='5' checked>天天(7天/週)</br>";
                        }
                        ?>
                </td>
                <tr>
                    <td><b>平日是否有規律運動達30分鐘:</b></td>
                    <td><?php
                        if($sport=='1'){
                            echo "<input type='radio' name='sport' value='1' checked>從不<input type='radio' name='sport' value='2'>很少(1-2天/週)<input type='radio' name='sport' value='3'>偶爾(3-5天/週)<input type='radio' name='sport' value='4'>經常(5-7天/週)<input type='radio' name='sport' value='5'>天天(7天/週)</br>";
                        }elseif($sport=='2'){
                            echo "<input type='radio' name='sport' value='1' >從不<input type='radio' name='sport' value='2' checked>很少(1-2天/週)<input type='radio' name='sport' value='3'>偶爾(3-5天/週)<input type='radio' name='sport' value='4'>經常(5-7天/週)<input type='radio' name='sport' value='5'>天天(7天/週)</br>";
                        }elseif($sport=='3'){
                            echo "<input type='radio' name='sport' value='1' >從不<input type='radio' name='sport' value='2'>很少(1-2天/週)<input type='radio' name='sport' value='3' checked>偶爾(3-5天/週)<input type='radio' name='sport' value='4'>經常(5-7天/週)<input type='radio' name='sport' value='5'>天天(7天/週)</br>";
                        }elseif($sport=='4'){
                            echo "<input type='radio' name='sport' value='1' >從不<input type='radio' name='sport' value='2'>很少(1-2天/週)<input type='radio' name='sport' value='3'>偶爾(3-5天/週)<input type='radio' name='sport' value='4' checked>經常(5-7天/週)<input type='radio' name='sport' value='5'>天天(7天/週)</br>";
                        }                     
                        else{
                            echo "<input type='radio' name='sport' value='1' >從不<input type='radio' name='sport' value='2'>很少(1-2天/週)<input type='radio' name='sport' value='3'>偶爾(3-5天/週)<input type='radio' name='sport' value='4'>經常(5-7天/週)<input type='radio' name='sport' value='5' checked>天天(7天/週)</br>";
                        }
                        ?>
                </td>

                    </table>
<input type="submit" value="更改"></br>
</form>


<?php

require("DBconnect.php");

if (isset($_POST["uNo"])){
    $uNo=$_POST["uNo"];
    $date1=$_POST["date1"];
    $uName=$_POST["uName"];
    $gender=$_POST["gender"];
    $age=$_POST["age"];
    $tel=$_POST["tel"];
    $place=$_POST["place"];
    $height=$_POST["height"];
    $weight=$_POST["weight"];
    $date2=$_POST["date2"];
    $glucose=$_POST["glucose"];
    $rice=$_POST["rice"];
    $drink=$_POST["drink"];
    $sugar=$_POST["sugar"];
    $snack=$_POST["snack"];
    $cake=$_POST["cake"];
    $sport=$_POST["sport"];

    $SQL="UPDATE public SET date1='$date1' , uName='$uName', gender='$gender' , age='$age', tel='$tel', place='$place', height='$height', uweight='$weight', date2='$date2', glucose='$glucose', rice='$rice', drink='$drink', sugar='$sugar', snack='$snack', cake='$cake', sport='$sport' WHERE uNo='$uNo'";

    if(mysqli_query($link, $SQL)){
        echo "<script type='text/javascript'>";
        echo "alert('更新成功');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=hospitallist.php'>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('更新失敗');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=hospitallist.php'>";
    }
}else{}


?>