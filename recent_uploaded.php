<?php
	include("config.php");
	session_start();
	
    
	$song_name = array();
	$audio_id = array();
	$image_id = array();
	$audio_file = array();
	$image_file = array();

	static $i = 0;

	$sql = "SELECT * FROM upload_songs";

	$result = mysqli_query($link,$sql);
	while($data = mysqli_fetch_array($result)){
		
        $song_name[$i] = $data['song_name'];
		$audio_id[$i] = $data['song_audio_id'];
		$image_id[$i] = $data['song_image_id'];

		$i++ ;
	}

	$i--;
	

	$arrlength = count($song_name);

	for($x = 0; $x < $arrlength; $x++) {
		
		$result = mysqli_query($link , "SELECT * FROM songs_audio where id='$audio_id[$x]'");
		
	   	while($row = mysqli_fetch_array($result)){
			$audio_file[$x] = $row['song_audio'];
		} 

		$result = mysqli_query($link , "SELECT * FROM songs_image where id='$image_id[$x]'" );

		while($row1 = mysqli_fetch_array($result)){

			$image_file[$x] = $row1['song_image'];
		}
	
	}
	
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recent Uploaded</title>
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
    </style>
</head>

<body>
	<center><h1 id="myHeader"><img src="images/logo.png" height="85" width="85" > Keep Your Beat</h1></center>
      <br>
	<div class="all"> 
        <h2 style="text-align: center; font-size: 35px; border-bottom: 1px solid black; margin: 0px 500px ; padding-bottom: 3px;">Recent Uploaded
 Songs</h2><br><br>
    <table style="width: 100%; height: 900px;">
    <?php
	    for($y= $i ; $y > -1 ; $y--  ){
		  static $k = 0 ; if($k==0){ echo "<tr>";}  $k++;
			?> 
			<td><a href="veiwsong.php?id=<?php echo $y?>"><img src="upload_image/<?php echo $image_file[$y] ?>" height="320" width="320"><br><br><?php echo "<h3>".$song_name[$y]."</h3>" ?></a> </td>
		  <?php
		  	if($k == 3 ){ $k = 0 ; echo"</tr>"; }
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

