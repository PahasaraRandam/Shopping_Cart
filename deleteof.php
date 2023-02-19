<?php

session_start();
require_once('connection.php');

$userid =mysqli_real_escape_string($connection,$_GET['user_id']);
$query ="DELETE FROM cmp_user WHERE id={$userid} LIMIT 1";



$result = mysqli_query($connection,$query);

if($result){

   header('Location:office.php?deleted=success');
}

?>