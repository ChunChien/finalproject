<?php
session_start();
session_destroy();
setcookie("county",$county,time()-36);
header('Location: hospitallogin.php');
?>