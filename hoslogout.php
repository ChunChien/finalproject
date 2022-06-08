<?php
session_start();
session_destroy();
setcookie("uName",$uName,time()-36);
header('Location: hospitallogin.php');
?>