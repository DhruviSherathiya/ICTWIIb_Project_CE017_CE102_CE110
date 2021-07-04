<?php
error_reporting(0);
?>
<?php

// Include config file
require_once "config.php";
session_start();
$msg = "";
$user_id = $_SESSION['userid'];
echo $user_id;

// If upload button is clicked ...
if (isset($_POST['upload'])) {
    
	$user = $_POST['username'];

	$sql2= "UPDATE login SET username='$user' where id='$user_id' ";

	// Execute query
	mysqli_query($link, $sql2);
	$_SESSION['user']=$_POST['username'];

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];


	if(isset($filename)){
	     if(!empty($filename)){
		$folder = "profileimg/".$filename;
		
	
		// Get all the submitted data from the form
		$sql = "INSERT INTO profile_images (profile_image) VALUES ('$filename')";

		// Execute query
		mysqli_query($link , $sql);
		
		// Now let's move the uploaded image into the folder: image
		if (move_uploaded_file($tempname, $folder)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
	}

	$result = mysqli_query($link, "SELECT * FROM profile_images where profile_image='$filename'");
if($data = mysqli_fetch_array($result))
{
	$id = $data["id"]; echo $id;
	
    $sql1 = "UPDATE login SET image_id='$id' where id='$user_id' ";

	// Execute query
	mysqli_query($link, $sql1);

	$_SESSION['image_id']=$data["id"];

}

}
	}
header("Location:vp.php");	
}


?>