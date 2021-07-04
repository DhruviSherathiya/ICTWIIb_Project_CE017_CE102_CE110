<?php
session_start();
include('config.php');

$name = $link->real_escape_string($_POST['username']);
$pswd = $link->real_escape_string($_POST['password']);
$s = "select * from login where username = '$name' && password = '$pswd' ";

$answer = mysqli_query($link,$s);
$num = mysqli_num_rows($answer);

if($num==1)
{
   if ($result = $link->query($s)) 
   {
      session_start();
      while ($row = $result->fetch_assoc())
      {
          $_SESSION['user'] = $row["username"];
          $_SESSION['userid'] = $row["id"];
          $_SESSION['image_id'] = $row["image_id"];
          header("Location:select_role.php");
      }
   }
}
else
{
   echo "<html><body><p style='color:white;font-size:30px;text-align:center;background-color:red;'>Sorry, Something went wrong.Try again!!</p>";
   echo "<a href='index.php'>Go to Login </a>";
}
?>