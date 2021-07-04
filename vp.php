<?php
// Include config file
require_once "config.php";
session_start();
static $i = 0;
$count = array();
$song_name = array();
$year = array();
$role_id = $_SESSION['role_id'];
$id = $_SESSION['userid'];
$username = $_SESSION["user"] ;
$user_id = $link -> real_escape_string($_SESSION['userid']);
$image_id = $link -> real_escape_string($_SESSION['image_id']);


$result = mysqli_query($link , "SELECT * FROM profile_images where id='$image_id'");
while($data = mysqli_fetch_array($result))
{
    $filename = $data['profile_image'];
}

if($role_id == 2){
 
  $sql2 = "SELECT * FROM upload_songs where user_id='$id'";
  $result2 = mysqli_query($link,$sql2);
  while($data2 = mysqli_fetch_array($result2)){
      $song_id = $data2['id'];
      $count[$i] = 0 ;
      $song_name[$i] = $data2['song_name']; 
      $year[$i]=$data2['year'];
      $sql3 = "SELECT * FROM like_songs where song_id='$song_id'";
      $result3 = mysqli_query($link,$sql3);
      while($row = mysqli_fetch_array($result3)){ 
          $count[$i]++; 
      }
      
       $i++;
  }  
  
  $i--;


}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php echo $username; ?> </title>
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="icon" href="img/logo/logo45.png" type="image/png">
        <script src="https://kit.fontawesome.com/06029fe747.js" crossorigin="anonymous"></script>
        
    <style>
       body {margin:0;padding:0;text-align:center;}
            .artist {display: flex;}
            .login-msg
            {
                background-color:#252c37;
                height:720px;
                width :20%;
            }
            .login-msg h1 {color:white;}
           .login-msg img {height:100px;width:100px;margin-top:10px;}
            .login-msg a { color:white;text-decoration:none;}
            .login-msg a:hover { color:rgb(230,0,0);}
            .display {width:80%;margin-top:2px;}
            .display h1 {color: #252c37;}
            .name{ font-size: 30px; font-family: 'Trebuchet MS', sans-serif; }
            .user{ font-size: 15px; margin-top: 50px;}
            .singer h3{ border-bottom: 2px solid rgba(0,0,0,0.4) ; margin-left: 450px; margin-right: 450px; padding-bottom: 2px;}
            .singer table{font-size: 20px; width:45%; margin-left: 30%; text-align: left;}
            .singer table th{ border-bottom: 1px solid black; padding-bottom: 5px;}
            .singer table td{ border-bottom: 0.5px solid rgba(0,0,0,0.3) ; padding-top: 5px;}
            .singer table a{color: black;}
            .singer table tr:hover{ background-color: rgba(0,0,0,0.2);  }
          
           
            
        
    </style>
    </head>
    <body>
    <div class="artist">
    <div class="login-msg">
        <img src="images/logo.png"><br>
        <h1> Keep Your Beat </h1>
        <br>
        <br><br><br>
        <a href="home.php"><i class="fa fa-eye" aria-hidden="true"></i> View Site </a> <br><br>
        <a href="edit.php"><span class="glyphicon glyphicon-edit" style="font-size: 15px;"></span> Edit</a><br><br>
        <a href="logout.php"> <i class="fa fa-sign-out"></i> Sign Out </a><br><br>
        <a href="viewlikesong.php"><i class="glyphicon glyphicon-thumbs-up"></i> Liked Songs</a><br><br>
        <?php if(!($role_id==3)){ ?> <a href="delete.php?id=<?php echo $id ?>"><i class="fa fa-trash"></i> Delete</a><br><br> <?php } ?>
        <?php if($role_id == 2){  ?> <a href="artist.php"><i class="fa fa-upload"></i> Upload Song</a> <?php } ?>
        <?php if($role_id == 3){ ?> <a href="userallprofile.php"><i class="fa fa-user"></i>  All User Profile</a> <?php  } ?>
        
        
    </div>
    <div class="display"><br>
    <h1><b style="font-family: Arial, sans-serif;"> Profile </b></h1>
        <div>
          <img src="profileimg/<?php echo $filename ?>" height="250" width="250" style="border-radius : 50%; box-shadow: 5px 5px 5px 5px rgba(0,0,0,0.8); border: solid 1px #555;  margin-top : 20px; ">
        </div><br>
        <div class="name"><strong>
          <?php echo $username ?></strong>
        </div>
        <div class="user">
          <?php if($role_id == 1){
            echo "You want to be singer ?? &nbsp; &nbsp;&nbsp; "; ?> <a href="mA.php">Yes</a><?php

          } ?>
        </div>
        <div class="singer">
          <?php if($role_id == 2){
             echo "<h3>Uploaded Songs</h3>";
            
             if(!empty($song_name)){
               echo "<table>";
               echo "<tr><th>#</th><th>Name</th><th>Year</th><th>liked</th></tr>";
               for(;$i > -1 ; $i--){
               static $k = 1; 
              echo "<tr>"; 
              echo "<td>";?><a href="veiwsong.php?id=<?php echo $i ?>"><?php echo $k; ?> </a><?php echo "</td><td>"?><a href="veiwsong.php?id=<?php echo $i ?>"><?php echo $song_name[$i] ; ?> </a><?php echo "</td><td>" ; ?><a href="veiwsong.php?id=<?php echo $i ?>"><?php echo $year[$i]; ?> </a><?php ; 
              echo "<td>"; echo $count[$i]; echo "</td>";
              echo "</tr>"; $k++;
            }  echo "</table>";

             }else{
               echo "<h4>none</h4>";
             }

          }
           ?>
        
        </div>




    </div>

    </div>
      
    </body>
</html>



        
