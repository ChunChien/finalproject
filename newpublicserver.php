<?php

require("DBconnect.php");


$county=$_POST["county"];
$member=$_POST["member"];
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



$SQL="INSERT INTO public(county, member, date1, uName, gender, age, tel, place, height, uweight, date2, glucose, rice, drink, sugar, snack, cake, sport) 
VALUES ('$county', '$member', '$date1', '$uName', '$gender', '$age', '$tel', '$place', '$height', '$weight', '$date2', '$glucose', '$rice', '$drink', '$sugar', '$snack', '$cake', '$sport')";

if(mysqli_query($link, $SQL)){
    echo "<script type='text/javascript'>";
    echo "alert('填寫成功');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=newpublic.php'>";
}else{
    echo "<script type='text/javascript'>";
    echo "alert('填寫失敗');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=newpublic.php'>";
}


?>
