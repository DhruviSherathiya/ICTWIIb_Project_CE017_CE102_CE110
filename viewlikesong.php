<?php
include("config.php");
session_start();

$song_id = array();
$song_name = array();
$image_file = array();
$image_id = array();


static $i = 0;
$user_id = $_SESSION["userid"];
$sql = "SELECT * FROM like_songs where user_id= $user_id ";
$result = mysqli_query($link , $sql);
while($row = mysqli_fetch_array($result)){
        $song_id[$i] = $row['song_id'];
    $i++ ;
}
$i--;


$arrlength = count($song_id);

for($x = 0; $x < $arrlength; $x++) {
		
   $sql1  = "SELECT * FROM upload_songs where id='$song_id[$x]'";
   $result1 = mysqli_query($link , $sql1);
   while($row1 = mysqli_fetch_array($result1)){
       $song_name[$x] = $row1['song_name'];
       $image_id[$x] = $row1['song_image_id'];
   }

    $result2 = mysqli_query($link , "SELECT * FROM songs_image where id='$image_id[$x]'" );

    while($row2 = mysqli_fetch_array($result2)){

        $image_file[$x] = $row2['song_image'];
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liked Songs</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

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
	<link rel="icon" href="img/logo/logo45.png" type="image/png">

    <style>
		.sticky { position: fixed; top: 0; width: 100%; }
  
        .sticky + .all {padding-top: 6px; }

        .all{ margin-left: 20px;}

        h1{ font-size: 40px; background-color: black; color: white; height: 110px; margin-top: 0px;  padding-top: 8px;}
        
		h3{color: black;}
		h3:hover{color: red;}
		img:hover{ box-shadow: 0px 2px 5px 2px rgb(139, 2, 48);}
        h4{font-size: 25px;}
        h5{ margin-bottom: 300px; font-size: 20px;}
    </style>
</head>
<body>
<center><h1 id="myHeader"><img src="http://localhost/KeepYourBeat/images/logo.png" height="85" width="85" > Keep Your Beat</h1></center>
      <br>
	<div class="all"> 
        <h2 style="text-align: center; font-size: 35px; border-bottom: 1px solid black; margin: 0px 500px ; padding-bottom: 3px;">Liked Songs</h2><br><br>

        <table style="width: 100%;">
    <?php
    if(!empty($arrlength)){
	    for($y= $i ; $y > -1 ; $y--  ){
		  static $k = 0 ; if($k==0){ echo "<tr>";}  $k++;
			?> 
			<td><a href="veiwsong.php?id=<?php echo $song_id[$y]-1 ?>"><img src="upload_image/<?php echo $image_file[$y] ?>" height="320" width="320"><br><br><?php echo "<h3>".$song_name[$y]."</h3>" ?></a> </td>
		  <?php
		  	if($k == 3 ){ $k = 0 ; echo"</tr>"; }
		}
    }else {
        echo "<h4><center>Songs you like will appear here</center></h4><br>";
        echo "<h5><center>Save songs by tapping the heart icon.</center></h5>";
    }
	?>
    </table>
     


      
	
	
	</div>
  <div class="about" id="team">
        <footer>
          <!-- copy right -->
          <p class="copy-right" style="font-size: 15px;">&copy; copyright by Keep Your Beat, All rights are reserved.
          </p>
      </div>
      </footer>

            

<script>
  window.onscroll = function() {myFunction()};
  
  var header = document.getElementById("myHeader");
  var sticky = header.offsetTop;
  
  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }
  </script>
	
</body>
</html>
