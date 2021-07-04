<?php
session_start();
include('config.php');

$name = $_POST['username'];
$pswd = $_POST['password'];
$cpswd = $_POST['cpassword'];

if($pswd == $cpswd)
{
    $c = "select * from login where username = '$name'";

    $result = mysqli_query($link,$c);
    $num = mysqli_num_rows($result);

    if($num==1)
    {
        echo "<html><body><p style='color:white;font-size:30px;text-align:center;background-color:red;'>Username already taken.</p>";
        exit();
    }
    else
    {
        $reg="insert into login(username,password) values('$_POST[username]','$_POST[password]')";
        mysqli_query($link,$reg);

        $sql1 = "Select * from login where username = '$name'";
        $result1 = mysqli_query($link , $sql1);
        while($row = mysqli_fetch_array($result1)){
            $id = $row['id'];
        $sql2 = "insert into user_in_role(user_id) values ('$id')";
         mysqli_query($link, $sql2);
        
            header("location:index.php");
        
       
    }
   
    }
}
?>