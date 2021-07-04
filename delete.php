<?php
// Process delete operation after confirmation
if(isset($_POST["id"]) && !empty($_POST["id"]))
{
    $number = $_POST["id"]; 
    // Include config file
    require_once "config.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM user_in_role WHERE user_id = $number";
   
    if($stmt = mysqli_prepare($link, $sql))
    {
        // Set parameters
        $param_id = trim($_POST["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt))
        {
            // Records deleted successfully. Redirect to landing page
            $delete = "DELETE FROM login WHERE id = $number";
            if($ss = mysqli_prepare($link, $delete))
            {
                $parameter_id = trim($_POST["id"]);
                if(mysqli_stmt_execute($ss))
                {
                    header("location: index.php");
                    exit();
                }
                else
                {
                     echo "Oops! Something went wrong. Please try again later.Error Inside";
                }
            }
        } 
        else
        {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    // Close statement
    mysqli_stmt_close($stmt);
    // Close connection
    mysqli_close($link);
} 
else
{
    // Check existence of id parameter
    if(empty(trim($_GET["id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Record</title>
    <link rel="icon" href="img/logo/logo45.png" type="image/png">
    <style>
		body{
			text-align: center;
			margin: 170px 400px;
			border: 1px solid black;
		}
		a{
			text-decoration: none;
			color: black;
		}
		input[type = submit] {
            background-color: white;
            border: none;
            text-decoration: none;
            color: rgb(0, 0, 0);
            cursor: pointer;
         }
	</style>
</head>
<body>
    <div>
		<h1>Delete Record</h1>
	</div>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<div>
			<input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>" >
			<p>Are you sure you want to delete this record?</p><br>
			<p>
				<input type="submit" value="Yes">
				<a href="index.php">No</a>
			</p>
		</div>
	</form>
</body>
</html>