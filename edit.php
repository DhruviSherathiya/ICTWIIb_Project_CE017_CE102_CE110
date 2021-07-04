<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Profile </title>
<link rel="icon" href="http://localhost/KeepYourBeat/images/logo.png" type="image/png">
<style>
	body{ background: url("images/back.jfif") no-repeat;
    background-size: cover;}
	.all{ border: 1px solid black; border-radius: 5%; box-shadow: 0px 1px 8px 3px palevioletred;
		 text-align: center; margin: 200px 400px; padding: 30px 30px; font-size: 20px; background-color: white;}
	.all h3{font-size: 30px;}
</style>
</head>
<body><div class="all"><h3>Edit Profile</h3>
<form method="POST" action="upload.php" method="post" enctype="multipart/form-data">
   
   Username : <input type="text" name="username" value="<?php echo $_SESSION['user'] ?>"><br><br>
	<input type="file" name="uploadfile" value=""/><br>
	
	<div style="margin-top: 10px;">
		<button type="submit" name="upload" >Done</button>
		</div>
</form></div>

</body>
</html>
