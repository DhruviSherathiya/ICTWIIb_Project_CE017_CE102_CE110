<?php
// Include config file
require_once "config.php";
session_start();

$id = $_SESSION['userid'];

$sql = "UPDATE user_in_role SET role_id ='2' where user_id='$id' ";

// Execute query
mysqli_query($link, $sql);
$_SESSION['role_id'] = 2 ;	
//header("location : vp.php");
header('location:vp.php');
?>
