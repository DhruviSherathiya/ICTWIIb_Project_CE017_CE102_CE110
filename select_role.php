<?php

require_once "config.php";
session_start();

if (isset($_SESSION['user']))
{
	$name = $_SESSION['user'];
	$id = $_SESSION['userid'];
	$sql = "Select role_id from user_in_role where user_id='$id'";

	if ($result = $link->query($sql))
	{
		while ($row = $result->fetch_assoc())
		{
			$role_id = $row['role_id'];
			$_SESSION['role_id']= $role_id;
			$sql1 = "Select rolename from roles where id='$role_id'";
			$result1 = $link->query($sql1);

			while ($row1 = $result1->fetch_assoc())
            {
				$user_role = $row1['rolename'];
				
				if ($user_role == "admin") 
                {
					header('location:home.php');
				} 
                else if ($user_role == "artist")
                {
					// echo "You have access of $user_role";
					header('location:home.php');
				} 
                else
                {
					header('location:home.php');
				}
			}
		}
	}
	else
	{
		echo "Sorry";
	}
}
else
{
    echo "Something went wrong.";
}