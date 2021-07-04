<?php
if(isset($_GET["id"]) ){
    include("config.php");
    session_start();

    $song_id = $_GET['id'];
    $user_id = $_SESSION['userid'];
    $_SESSION['likesongid'] = $song_id;

    $sql = "INSERT INTO `like_songs`( `user_id`, `song_id`) VALUES ( $user_id , $song_id  ) ";
    mysqli_query($link , $sql);

    header('location:veiwsong.php?song_id=-1');

}else{
    // URL doesn't contain id parameter. Redirect to error page
      header("location: login.php");
      exit();
}
?>
