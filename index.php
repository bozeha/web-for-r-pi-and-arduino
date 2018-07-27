<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (($_SESSION["log"] == "true")&&(time() - $_SESSION['timeout'] < 1800) )
{

    include "content/index.php" ;
    
}
else
{
    include "content/main-login.php" ;
}
 ?>
