<?php

session_start();

$_SESSION= array();

if(isset($_COOKIE[session_name()])){
    setcookie(session_name(),'',time()-84000*7, '/');
}
session_destroy();
header('Location:logte.php?logout=success');
?>