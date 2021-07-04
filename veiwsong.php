<?php
static $i = 0;
if(isset($_GET["id"]) || isset($_GET["song_id"]) || isset($_GET["unsong_id"]) ){
    include("config.php");
    session_start();
    $uid = $_SESSION['userid'];
    $role = $_SESSION['role_id'];
    if(isset($_GET['id'])){
    $id = $_GET['id'] + 1;}
    else if(isset($_GET["song_id"])){ 
        $id = $_SESSION['likesongid'];
    }else{
        $id = $_SESSION['unlikesongid']; 
    }
    
    $sql = "SELECT * FROM upload_songs where id='$id'";
    $result = mysqli_query($link,$sql);
    while($data = mysqli_fetch_array($result)){
        $song_id = $data['id'];
        $song_name = $data['song_name'];
        $user_id = $data['user_id'];
        $audio_id = $data['song_audio_id'];
        $image_id = $data['song_image_id'];
        $year = $data['year'];
        $count = 0;
        $sql3 = "SELECT * FROM like_songs where song_id='$song_id'";
        $result3 = mysqli_query($link,$sql3);
        while($row = mysqli_fetch_array($result3)){ 
            $count++; 
        }
    }

    $sql1 = "SELECT * FROM songs_image where id='$image_id'";
    $result = mysqli_query($link,$sql1);
    while($data = mysqli_fetch_array($result)){
        $image_file = $data['song_image'];
    }

    $sql2 = "SELECT * FROM songs_audio where id='$audio_id'";
    $result = mysqli_query($link,$sql2);
    while($data = mysqli_fetch_array($result)){
        $audio_file = $data['song_audio'];
    }

    $sql3 = "SELECT * FROM login where id='$user_id'";
    $result = mysqli_query($link,$sql3);
    while($data = mysqli_fetch_array($result)){
        $artist_name = $data['username'];
    }

   $sql4 = "SELECT * FROM like_songs where user_id=$uid ";
   $result = mysqli_query($link,$sql4);
   while($data1 = mysqli_fetch_array($result)){
       if($data1['song_id'] == $song_id){
           $i = 1; 
       }
    }


}else{
      // URL doesn't contain id parameter. Redirect to error page
        header("location: login.php");
        exit();
}

?>

<html>
    <head>
        <title>
            <?php echo $song_name ?>
            
        </title>
        <script src="https://kit.fontawesome.com/06029fe747.js" crossorigin="anonymous"></script>
        <link rel="icon" href="img/logo/logo45.png" type="image/png">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <style>
            .container { display:flex;}
            .lyrics { color:rgb(82, 81, 81); font-size: 20px;}
            .lyrics h2 { font-size:50px; color: black;}
            audio:hover {transform: scale(1.1);filter: drop-shadow(2px 3px 3px #333);}
            audio { height: 100px; width:500px; margin-left: 10px; }
            #more {display: none;}
            img { border-radius: 8px;}
            A
              {text-decoration: none; color: black;}
            img:hover{ box-shadow: 0px 2px 5px 2px palevioletred;
            }
            span{ margin-left: 600px; font-size: 20px; color:rgb(0,0,0,0.8);}
            </style>

    </head>
    <body>
    <br>
    <center><h1 id="myHeader"><img src="http://localhost/KeepYourBeat/images/logo.png" height="85" width="85" > Keep Your Beat</h1></center>
        <br> 
        <div class="container">
            <div>
                &nbsp;&ensp;&nbsp;<img src="upload_image/<?php echo $image_file ?>" height="400" width="400" >
            </div>
            <div class="lyrics">
            <h2> &nbsp; <?php echo $song_name ?><span><?php if($role==3){echo "Liked By "; echo $count;} ?> <?php if($i == 0){ ?><a href="likesong.php?id=<?php echo $song_id; ?>">
            <i class="far fa-heart" style="font-size: 40px; color:red;"></i></a> <?php }else{ ?> <a href="unlikesong.php?id=<?php echo $song_id; ?>"><i class="fas fa-heart" style="font-size: 40px; color:red;"></i></a> <?php } ?></a></span><br>
            </h2>
            &ensp; Artists :  <?php echo $artist_name ?> <br>
            &ensp; Relesed : <?php echo $year  ?>
            <br><br> <audio id="player" width=100% controls>
					<source src="<?php echo 'upload_audio/'.$audio_file;?>">
				</audio>
            </div>
        </div><br>
    </body>

</html>