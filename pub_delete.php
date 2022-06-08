<?php
require("DBconnect.php");
$uNo=$_GET["uNo"];
$SQL="DELETE FROM public WHERE uNo='$uNo'";

if(mysqli_query($link, $SQL)){
    echo "<script type='text/javascript'>";
    echo "alert('刪除成功');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=hospitallist.php'>";
}else{
    echo "<script type='text/javascript'>";
    echo "alert('刪除失敗');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=hospitallist.php'>";
}

?>