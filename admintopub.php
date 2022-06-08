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

$hos="SELECT*FROM hospital WHERE county='$cookieID'";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="主選單" content="width=device-width, initial-scale=1.0">
        <title><?php echo "$cookieID";?>民眾填答狀況</title>
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

    <form action="" method="POST">

        
        查詢收案期間資料:<input type="date" name="start">~<input type="date" name="end">
        篩選合作醫療院所:<select name="hos"><option value="all">全部
        <?php
        if ($result=mysqli_query($link,$hos)){
            while($row=mysqli_fetch_assoc($result)){
                echo "<option value=";
                echo "'".$row['uName']."'>";
                echo $row['uName'];   
        }
    }
        ?>
        </select>
        <input type="submit" value="查詢">
    </form>
    <div class="container"><br/>
</html>
<?php
if (isset($_POST["start"])){
    $start = $_POST["start"];
    $end = $_POST["end"];
    $hospital=$_POST["hos"];
    setcookie("startdate",$start,time()+17280);
    setcookie("enddate",$end,time()+17280);
    setcookie("hospital",$hospital,time()+17280);
}else{
    echo "請選擇起始日期";
    exit();
}

if ($hospital=='all'){
    if($start!=null & $end!=null){
        $SQL="SELECT * FROM public WHERE county='$cookieID' AND date1 BETWEEN '$start' AND '$end'";
    }elseif($start!=null & $end==null){
        $SQL="SELECT * FROM public WHERE county='$cookieID' AND date1 >='$start'";
    }elseif($start==null & $end!=null){
        $SQL="SELECT * FROM public WHERE county='$cookieID' AND date1 <='$end'";
    }else{
        $SQL="SELECT * FROM public WHERE county='$cookieID'";
    }
    
}else{
    if($start!=null & $end!=null){
        $SQL="SELECT * FROM public WHERE county='$cookieID' AND member='$hospital' AND date1 BETWEEN '$start' AND '$end'";
    }elseif($start!=null & $end==null){
        $SQL="SELECT * FROM public WHERE county='$cookieID' AND member='$hospital' AND date1 >='$start'";
    }elseif($start==null & $end!=null){
        $SQL="SELECT * FROM public WHERE county='$cookieID' AND member='$hospital' AND date1 <='$end'";
    }else{
        $SQL="SELECT * FROM public WHERE county='$cookieID' AND member='$hospital'";
    }
    
}


echo "<h1>".$cookieID."民眾填答狀況</h1>";
if($result=mysqli_query($link,$SQL)){
    echo "<table border='1'>";
    echo "<tr>";
    echo "<td>編號</td><td>縣市</td><td>醫療院所</td><td>收案日期</td><td>姓名</td><td>性別</td><td>年齡</td><td>聯絡電話</td><td>住址</td><td>身高</td><td>體重</td><td>血糖檢驗日期</td><td>血糖值</td><td>主食攝取</td><td>飲料習慣</td><td>飲料糖度</td><td>零食習慣</td><td>甜點習慣</td><td>運動習慣</td>";
    echo "</tr>";
    while($row=mysqli_fetch_assoc($result)){
        
        echo "<tr>";
        echo "<td>".$row["uNo"]."</td><td>".$row["county"]."</td><td>".$row["member"]."</td><td>".$row["date1"]."</td><td>".$row["uName"]."</td><td>".$row["gender"]."</td><td>".$row["age"]."</td><td>".$row["tel"]."</td><td>".$row["place"]."</td><td>".$row["height"]."</td><td>".$row["uweight"]."</td><td>".$row["date2"]."</td><td>".$row["glucose"]."</td><td>".$row["rice"]."</td><td>".$row["drink"]."</td><td>".$row["sugar"]."</td><td>".$row["snack"]."</td><td>".$row["cake"]."</td><td>".$row["sport"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
}



?>

<html>
<br/>
<input type="button" value="匯出Excel" onclick="location.href='adminexcel.php'">
<br/>
</html>