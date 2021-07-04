<?php
include("config.php");
session_start();
$id = $_SESSION['userid'];
$username = $_SESSION['user'];
$image_id = $_SESSION['image_id'];
$result = mysqli_query($link , "SELECT * FROM profile_images where id='$image_id'");
while($data = mysqli_fetch_array($result))
{
    $filename = $data['profile_image'];
}
if(isset($_POST['upload']))
{
    $name = $_POST['song_name'];


    $song_audio = $_FILES['song_audio']['name'];
    $song_image = $_FILES['song_image']['name'];

    $type_audio = $_FILES['song_audio']['type'];
    $type_image = $_FILES['song_image']['type'];
   
    $temp_audio = $_FILES['song_audio']['tmp_name'];
    $temp_image = $_FILES['song_image']['tmp_name'];


    $file_audio = "upload_audio/".$song_audio;
    $file_image = "upload_image/".$song_image;

    if(move_uploaded_file($temp_audio,$file_audio) && move_uploaded_file($temp_image,$file_image) )
    {
            $success = "Song Uploaded Successfully.";
    }
    else
    {
        $failed = "Fail to upload.";
    }
    
   
    $a = "INSERT INTO songs_audio (song_audio) VALUES ('$song_audio')";
    $i = "INSERT INTO songs_image (song_image) VALUES ('$song_image')";

     mysqli_query($link,$a);
     mysqli_query($link,$i);

     $result1 = mysqli_query($link , "SELECT * FROM songs_audio where song_audio='$song_audio'");
    // $result2 = mysqli_query($link , "SELECT * FROM songs_image where song_image ='$song_image'");

    while( $data1 = mysqli_fetch_array($result1)  )
    {
        $audio_id = $data1['id'];
        $image_id = $data1['id'];
        $year = date("Y");
        $n = "INSERT INTO upload_songs ( user_id, song_name, song_audio_id  , song_image_id , year ) VALUES ('$id','$name','$audio_id','$image_id' , '$year')";
        mysqli_query($link,$n);
    }
    
}
else
{
    $msg = "Please select files to upload.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Upload Song </title>
    <!-- <link rel="stylesheet" href="artist_style.css"> -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="icon" href="http://localhost/KeepYourBeat/images/logo.png" type="image/png">
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
            .login-msg h2 { font-size:30px;color:rgb(230, 0, 0);}
            .login-msg img {height:100px;width:100px;margin-top:10px;}
            .login-msg a { color:white;text-decoration:none;}
            .login-msg a:hover { color:rgb(230,0,0);}
            .login-msg p {color:white;font-size:20px;}
            .login-msg span {color:rgb(230,0,0);}
            .display {width:80%;margin-top:2px;}
            .display i {font-size:150px;color:#252c37;}
            .display h1 {color:rgb(230,0,0);}
            .display form {font-size:20px;}
            .display form input[type="submit"] {background-color:#252c37;font-size:30px;color:white;border-radius:25px;cursor: pointer;}
            .form-group input {margin-left:40%;}
            .profile {height:100px;width:100px;border-radius:50%;}
    </style>
</head>
<body>
<div class="artist">
    <div class="login-msg">
        <img src="images/logo.png"><br>
        <h1> Keep Your Beat </h1>
        <br>
        <img src="profileimg/<?php echo $filename ; ?>" class="profile"><br><br>
        <p> Username : <span><?php echo $username ; ?></span> </p>
        <a href="home.php"><i class="fa fa-eye" aria-hidden="true"></i> View Site </a> <br>
        <a href="logout.php"> <i class="fa fa-sign-out"></i> Sign Out </a>
        
    </div>
    <div class="display">
        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
        <h1><b> Upload Your New Song Here </b></h1>
        <form action="artist.php" method="POST" enctype="multipart/form-data">
            <label class="form-label"> Upload a Song : </label>
            <div class="form-group">
                  <lable>Song Name :</lable><br>
                  <input type="text" name="song_name" value="" class="form-control-file" style="margin-right: 500px;">
            </div>
            <div class="form-group">
                <label> Select a song  </label>
                <input type="file" name="song_audio" class="form-control-file">
            </div>
            <div class="form-group">
                <label> Select a banner </label>
                <input type="file" name="song_image" class="form-control-file">
            </div>
            <?php if(isset($success)) { ?> 
            <div class="alert alert-success">
                <?php echo $success; ?>
            </div>
            <?php } ?>
            <br>
            <?php if(isset($failed)) { ?>
            <div class="alert alert-danger">
                <?php echo $failed; ?>
            </div>
            <?php } ?>
            <br>
            <?php if(isset($msg)) { ?>
            <div class="alert alert-info">
                <?php echo $msg; ?>
            </div>
            <?php } ?>
            <br>
            <input type="submit" name="upload" value="Upload">
        </form>
    </div>
</div>
</body>