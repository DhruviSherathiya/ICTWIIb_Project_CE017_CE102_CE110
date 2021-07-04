<?php
if(isset($_GET["id"]) ){
    include("config.php");
    session_start();

    $song_id = $_GET['id'];
    $user_id = $_SESSION['userid'];
    $_SESSION['unlikesongid'] = $song_id;

    $sql1 = "SELECT * FROM like_songs WHERE user_id=$user_id ";
    $result = mysqli_query($link , $sql1);
    while($row = mysqli_fetch_array($result)){
        if($row['song_id'] == $song_id)
        $id = $row['id'];
    }

    $sql = "DELETE FROM like_songs WHERE id=$id ";
    mysqli_query($link , $sql);
   // $sql = "DELETE FROM MyGuests WHERE id=3";

     header('location:veiwsong.php?unsong_id=-2');

}else{
    // URL doesn't contain id parameter. Redirect to error page
      header("location: login.php");
      exit();
}
?>