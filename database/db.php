<?php 
session_start();
$conn = mysqli_connect(
    'localhost','root','','php_mysql_crud_lixy'
) or die(mysql_error($mysqli)); 
?>