<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once "config.php";
    session_start();

    $id = $_GET['id'];
    $song_name = array();
    $i = 0 ;

    $sql = "SELECT * FROM login where id='$id'";
    $result = mysqli_query($link,$sql);
    while($data = mysqli_fetch_array($result)){
        $username = $data['username'];
        $image_id = $data['image_id'];

        $sql1 = "SELECT * FROM user_in_role where user_id='$id'";
        $result1 = mysqli_query($link,$sql1);
        while($data1 = mysqli_fetch_array($result1)){
              $role = $data1['role_id'];
        }

    }

    $sql1 = "SELECT * FROM profile_images where id=$image_id";
    $result1 = mysqli_query($link,$sql1);
    while($data1 = mysqli_fetch_array($result1)){
        $image_file = $data1['profile_image'];
    }

    if($role == 2){
        $rolename = "Aritist";

        $sql2 = "SELECT * FROM upload_songs where user_id='$id'";
        $result2 = mysqli_query($link,$sql2);
        while($data2 = mysqli_fetch_array($result2)){
            $song_name[$i] = $data2['song_name']; $i++;
        }  
        
        $i--;

    }

    if($role == 1){
        $rolename = "user";
    }

    if($role == 3){
        $rolename = "admin";
    }

    

}else{
    // Check existence of id parameter
    if(empty(trim($_GET["id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Veiw Record</title>
        <link rel="icon" href="img/logo/logo45.png" type="image/png">
        <style>
            body{
                background: url("images/back.jfif") no-repeat;
                background-size: cover
               
            }
            .all{ border: 1px solid black; border-radius: 5%; box-shadow: 0px 1px 8px 3px palevioletred;
		 text-align: center; margin: 50px 400px; padding: 30px 30px; font-size: 20px; background-color: white;}
	       .all h3{font-size: 30px;}
            .container{
                display:flex;  
            }
            .lyrics{
                margin-top: 50px;
                margin-left: 30px; font-size: 20px;
            }
            .song{ text-align: center; font-size: 19px;}
            .song h3{font-size: 20px; padding-bottom: 1px; border-bottom: 1px solid black; margin: 5px 150px;}
        </style>
    </head>
    <body>
        <br>
        <div class="all">
        <center> <h3 style=" margin-top: 18px">Veiw Record</h3></center>
        <div class="container">
            <div>
                &nbsp;&ensp;&nbsp;<img src="profileimg/<?php echo $image_file ?>" height="250" width="250" style="border-radius: 50%; margin-top : 5px; ">
            </div>
            <div class="lyrics">
            <h2> &nbsp; <?php echo $username ?> </h2>
            <br> &nbsp; roles : <?php echo $rolename ?> 
            </div></div>
        

        <div class="song">
         <?php 
            if($role == 2){
            
             if(!empty($song_name)){
             echo "<h3>Uploaded Songes</h3>";
           
             for(; $i > -1  ; $i--  ){
                 static $x = 1;
                 echo $x ; echo "&nbsp; &nbsp;";
                 echo $song_name[$i];
                 echo "<br>";
                 $x++ ;}
             }
                  echo "<br><br>";
            }
         ?>
        </div>
        </div>
    </body>
</html>
 