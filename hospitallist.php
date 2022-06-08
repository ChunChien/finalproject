<?php
require("DBconnect.php");
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

$cookieID=$_COOKIE["uName"];




?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="填答狀況" content="width=device-width, initial-scale=1.0">
        <title><?php echo "$cookieID";?>民眾填答狀況</title>
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
                
                查詢收案期間資料:<input type="date" name="start">~<input type="date" name="end">
                <input type="submit" value="查詢">
            </form>
            <br/>
          
</html>
<?php

if (isset($_POST["start"])){
    $start = $_POST["start"];
    $end = $_POST["end"];
    setcookie("startdate",$start,time()+17280);
    setcookie("enddate",$end,time()+17280);
}else{
    exit();
}

if($start!=null & $end!=null){
    $SQL="SELECT * FROM public WHERE member='$cookieID' AND date1 BETWEEN '$start' AND '$end'";
}elseif($start!=null & $end==null){
    $SQL="SELECT * FROM public WHERE member='$cookieID' AND date1 >='$start'";
}elseif($start==null & $end!=null){
    $SQL="SELECT * FROM public WHERE member='$cookieID' AND date1 <='$end'";
}else{
    $SQL="SELECT * FROM public WHERE member='$cookieID'";
}

echo "<h1>".$cookieID."民眾填答狀況</h1>";

if($result=mysqli_query($link,$SQL)){
    echo "<table>";
    echo "<tr>";
    echo "<td>編號</td><td>縣市</td><td>醫療院所</td><td>收案日期</td><td>姓名</td><td>性別</td><td>年齡</td><td>聯絡電話</td><td>住址</td><td>身高</td><td>體重</td><td>血糖檢驗日期</td><td>血糖值</td><td>主食攝取</td><td>飲料習慣</td><td>飲料糖度</td><td>零食習慣</td><td>甜點習慣</td><td>運動習慣</td>";
    echo "</tr>";
    while($row=mysqli_fetch_assoc($result)){  
        echo "<tr>";
        echo "<td>".$row["uNo"]."</td><td>".$row["county"]."</td><td>".$row["member"]."</td><td>".$row["date1"]."</td><td>".$row["uName"]."</td><td>".$row["gender"]."</td><td>".$row["age"]."</td><td>".$row["tel"]."</td><td>".$row["place"]."</td><td>".$row["height"]."</td><td>".$row["uweight"]."</td><td>".$row["date2"]."</td><td>".$row["glucose"]."</td><td>".$row["rice"]."</td><td>".$row["drink"]."</td><td>".$row["sugar"]."</td><td>".$row["snack"]."</td><td>".$row["cake"]."</td><td>".$row["sport"]."</td>";
        echo "<td><a href='pub_delete.php?uNo=".$row["uNo"]."'>刪除</a></td>";
        echo "<td><a href='pub_update.php?uNo=".$row["uNo"]."'>更改</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}


?>


<html>
<br/>
<input type="button" value="匯出Excel" onclick="location.href='hospitalexcel.php'">
</center>

            </div>
                    </div>
</html>
