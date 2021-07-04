<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="login_style.css">
        <link rel="icon" href="img/logo/logo45.png" type="image/png">
    </head>
    <body>
        <h1><img src="images/logo.png" style="width:100px;height:100px;margin-top: 5px;"> Keep Your Beat</h1>
        
        <form action="login_action.php" method="POST">
            <div class="login-box">
                <h1>Login</h1>
                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="Username" name="username" value="" required>
                </div>
                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Password" name="password" value="" required>
                </div>
                <input class="btn" type="submit" name="" value="Sign In">
                <p>Don't have an account?<a href="register.php" style="font-size: 20px;color : #f00c58;"> <strong> Register</strong></a></p>
            </div>
        </form>
    </body>
</html>