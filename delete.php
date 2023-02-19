<?php

session_start();
require_once('connection.php');

$userid =mysqli_real_escape_string($connection,$_GET['id']);
$query ="DELETE FROM shopping_user WHERE id={$userid} LIMIT 1";



$result = mysqli_query($connection,$query);

if($result){

   header('Location:post.php?deleted=success');
}

?>