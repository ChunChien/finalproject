<?php

if (isset($_POST['check'])){
    if ($_POST['check']==$_COOKIE["check"]){
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('驗證失敗');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=forgetpsw.php'>";
        exit();
    }
}else{
    exit();
}
?>

<?php

require ("DBconnect.php");

$cookieid=$_COOKIE["email"];
$psw=$_POST["psw"];
$role=$_COOKIE["unit"];

if ($role=='1'){

    $SQL="UPDATE gov SET psw='$psw' WHERE email='$cookieid'";

    if(mysqli_query($link, $SQL)){
        echo "<script type='text/javascript'>";
        echo "alert('重設成功');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=hospitallogin.php'>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('重設失敗');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=hospitallogin.php'>";
    }
}else{
    $SQL="UPDATE hospital SET psw='$psw' WHERE email='$cookieid'";

    if(mysqli_query($link, $SQL)){
        echo "<script type='text/javascript'>";
        echo "alert('重設成功');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=hospitallogin.php'>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('重設失敗');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=hospitallogin.php'>";
    }
}





?>