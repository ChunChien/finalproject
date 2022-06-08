<html>

    <form action="" method="POST">
        請輸入信箱:<input type="text" name="email"><br/>
        請選擇身分:<input type="radio" name="unit" value="1">衛生局<input type="radio" name="unit" value="2">醫療院所
        <input type="submit" value="寄發驗證信">
    </form>

</html>

<?php

require("DBconnect.php");

if (isset($_POST['email'])){
    $email=$_POST['email'];
    $unit=$_POST['unit'];
    setcookie("unit",$unit,time()+17280);

    if ($unit==1){

        
        $SQL="SELECT*FROM gov WHERE email='$email'";
        $result=mysqli_query($link,$SQL);

        if(mysqli_num_rows($result)==1){
            setcookie("email",$email,time()+17280);
            header("Location:forget_send.php");
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('此email尚未註冊');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=forgetpsw.php'>";
        }
        }else{
            $SQL="SELECT*FROM hospital WHERE email='$email'";
            $result=mysqli_query($link,$SQL);

            if(mysqli_num_rows($result)>=1){
                setcookie("email",$email,time()+17280);
                header("Location:forget_send.php");
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('此email尚未註冊');";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0; url=forgetpsw.php'>";
            }
        }  
}



?>