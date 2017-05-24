<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Gongzhan</title>
    <link rel="stylesheet" type="text/css" href="css/log.css" />
</head> 

<?php
$Username = "";
$Password = "";
$rePassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$Username = $_POST["username"];
    $Password = $_POST["password"];	
	
	$Hostname = "localhost";
	$DBName = "forum";
	$User = "root";
	$PasswordP = "";

	$con = mysqli_connect($Hostname, $User, $PasswordP) or die("Cant connect into database");
	mysqli_select_db($con, $DBName) or die("Cant connect into database");

	$SQL = "SELECT * FROM User WHERE UserName = '".$Username."';";
	$result_id = mysqli_query($con, $SQL) or die("DATABASE ERROR!");
	$total = mysqli_num_rows($result_id);
	if ($total)
	{
		$datas = mysqli_fetch_array($result_id);
		if (!strcmp(md5($Password), $datas["Password"]))
		{
			$Succ="Login successfully! :)";
			header("Location:./manager.php?user_id=".$Username);
		}
		else
		{
			$PassError = "WrongPassword :(";
		}
	}
	else
	{
		$NameError = "Username Does Not Exist :(";
	}
	mysqli_close();
}
?>

<body>
<div class="container">
    <section id="content">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	    <h1>Login Form</h1>
            <div>
                <input type="text" placeholder="Username" name = "username" required="" id="username" />
            </div>
            <div>
                <input type="password" placeholder="Password" name = "password" required="" id="password" />
            </div>
	    <div>
	    	<span class="error"><?php echo $NameError;?></span>
	    </div>
	    <div>
	    	<span class="error"><?php echo $PassError;?></span>
	    </div>
	    <div>
	    	<span class="error"><?php echo $Succ;?></span>
	    </div>
            <div>
                <input type="submit" value="Log in" />
                <a href="#">Lost your password?</a>
                <a href="./register.php">Register</a>
            </div>
        </form><!-- form -->
    </section><!-- content -->
</div><!-- container -->
</body>
</html>
