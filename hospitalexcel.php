<?php

header("Pragma public");
header("Expires:0");
header('Cache-Control:must-revalidate,post-check');
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: inline; filename="applicant.xls";');
header('Content-Transfer-Encoding: binary');

echo "<table border='1'>";
echo "<tr>";
echo "<td>編號</td><td>縣市</td><td>醫療院所</td><td>收案日期</td><td>姓名</td><td>性別</td><td>年齡</td><td>聯絡電話</td><td>住址</td><td>身高</td><td>體重</td><td>血糖檢驗日期</td><td>血糖值</td><td>主食攝取</td><td>飲料習慣</td><td>飲料糖度</td><td>零食習慣</td><td>甜點習慣</td><td>運動習慣</td>";
echo "</tr>";

require("DBconnect.php");
$cookieID = $_COOKIE["uName"];

if (isset($_COOKIE["startdate"])&isset($_COOKIE["enddate"])){
    $start = $_COOKIE["startdate"];
    $end = $_COOKIE["enddate"];
    $SQL="SELECT * FROM public WHERE member='$cookieID' AND date1 BETWEEN '$start' AND '$end'";
}elseif(isset($_COOKIE["startdate"])){
    $start = $_COOKIE["startdate"];
    $SQL="SELECT * FROM public WHERE member='$cookieID' AND date1 >= '$start'";
}elseif(isset($_COOKIE["enddate"])){
    $end = $_COOKIE["enddate"];
    $SQL="SELECT * FROM public WHERE member='$cookieID' AND date1 <= '$end'";
}else{
    $SQL="SELECT * FROM public WHERE member='$cookieID'";
}

$result=mysqli_query($link,$SQL);

while($row=mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>".$row["uNo"]."</td><td>".$row["county"]."</td><td>".$row["member"]."</td><td>".$row["date1"]."</td><td>".$row["uName"]."</td><td>".$row["gender"]."</td><td>".$row["age"]."</td><td>".$row["tel"]."</td><td>".$row["place"]."</td><td>".$row["height"]."</td><td>".$row["uweight"]."</td><td>".$row["date2"]."</td><td>".$row["glucose"]."</td><td>".$row["rice"]."</td><td>".$row["drink"]."</td><td>".$row["sugar"]."</td><td>".$row["snack"]."</td><td>".$row["cake"]."</td><td>".$row["sport"]."</td>";
    echo "</tr>";
}
echo "</table>";
?>