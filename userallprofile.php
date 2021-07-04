<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="icon" href="img/logo/logo45.png" type="image/png">

    <!-- Styles -->
	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Animate CSS -->
	<link href="css/animate.min.css" rel="stylesheet">
	<!-- Basic stylesheet -->
	<link rel="stylesheet" href="css/owl.carousel.css">
	<!-- Font awesome CSS -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/style.css" rel="stylesheet">
	<link href="css/style-color.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/06029fe747.js" crossorigin="anonymous"></script>

    <style>
        body{text-align: center;align-items: center;}
        h1{font-size:50px;color:rgb(230,0,0);}
        h2{color:#252c37;}
        table{align-items: center;}
        table th{font-size:30px;text-align: center;}
        table td{font-size:20px;}
        .edit{color:green;}
        .delete {color:rgb(230,0,0);}
    </style>
</head>
<body>
<center><h1 id="myHeader" style="color: black;"><img src="http://localhost/KeepYourBeat/images/logo.png" height="85" width="85" > Keep Your Beat</h1></center>
      <br>
      <h2 style="text-align: center; font-size: 35px; border-bottom: 1px solid black; margin: 0px 550px ; padding-bottom: 3px;">USER DETAILS</h2>
      
    <br><br>
    <?php 
    include("config.php");
    session_start();
   
    $sql = "SELECT * FROM login";

    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
    ?><table class="table table-bordered">
        <tr>
            <th>ID NO.</th>
            <th>USERNAME</th>
            <th>ROLE</th>
            <th>VEIW</th>
            <th>DELETE</th>
        </tr>
        <?PHP while($row = mysqli_fetch_array($result)){
            $id = $row['id']; ?>
        <tr>
            <td><?PHP echo $row['id']; ?></td>
            <td><?PHP echo $row['username']; ?></td>
            <td><?php  $SQL1 = "SELECT * FROM user_in_role WHERE user_id=$id ";
                  $result1 = mysqli_query($link, $SQL1);
                  if($row1 = mysqli_fetch_array($result1)){
                      $role = $row1['role_id'];
                      $result2 = mysqli_query($link,"select * from roles where id=$role");
                      if($row2 = mysqli_fetch_assoc($result2)){
                          echo $row2['rolename'];
                      }
                  }
             ?></td>
            <td ><a href="veiwuser.php?id=<?php echo $id; ?>" class="edit"><i class="far fa-eye"></i> Veiw</a></td>
            <td><a href="delete.php?id=<?php echo $id; ?>"  class="delete"><i class="fas fa-trash-alt"></i> Delete</a></td>
        </tr>
        <?php } 
        } 
    }?>
    </table><br><br>

    <footer>
			<!-- copy right -->
			<p class="copy-right" style="font-size: 20px;">&copy; copyright by Keep Your Beat, All rights are reserved.
			</p>
	</div>
	</footer>

</body>
</html>