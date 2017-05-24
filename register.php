<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>PaperHeaven</title>
    <link rel="stylesheet" type="text/css" href="css/log.css" />
</head>
<body>

<?php

$Username = ""; 
$Password = "";
$rePassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//Email and Password
	$Username = $_POST["username"];
	$Password = $_POST["password"];
	$rePassword = $_POST["repassword"];
	//PHP Only
	$Hostname = "localhost";
	$DBName = "forum";
	$User = "root";
	$PasswordP = "";

	$con = mysqli_connect($Hostname, $User, $PasswordP) or die("Can't connect to DB");
	mysqli_select_db($con, $DBName) or die("Can't connect to DB");

	if (!preg_match("/^[a-zA-Z1-9]*$/",$Username)) {
		$UsernameErr = "Username: Only letters and spaces are allowed :("; 
	}
	else if($Password != $rePassword)
	{
		$PasswordErr= "Password: Two passwords not match :(";
	}
	else
	{
		$sql = "SELECT * FROM User WHERE UserName = '".$Username."';";
		$Result = mysqli_query($con, $sql) or die("DB Error");
		$Total = mysqli_num_rows($Result);
		if ($Total == 0)
		{
			$insert = "INSERT INTO User(UserId, Password, UserName) values( NULL, '".md5($Password)."', '".$Username."');";
			$sql= mysqli_query($con, $insert);
			$Succ="Congratulations! You have registered successfully!";
			// header("Location:./manager.php");
			header("Location:./manager.php?user_id=".$Username);
		}
		else
		{
			 $UsernameErr="Username AlreadyUsed :(";
		}
	}
	mysqli_close($con);
}
?>

<div class="container">
   <section id="content">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <h1>Register Form</h1>
            <div>
                <input type="text" placeholder="Username" name="username" required="" id="username" />
            </div>
            <div>
                <input type="password" placeholder="Password" name="password" required="" id="password" />
            </div>
            <div>
                <input type="password" placeholder="Retype Password" name="repassword" required="" id="repassword"/>
	    </div>
		<br/>
	    <div>	
		<span class="error"><?php echo $UsernameErr;?></span>
	    </div>
	    <div>	
		<span class="error"><?php echo $PasswordErr;?></span>
	    </div>
	    <div>	
		<span class="error"><?php echo $Succ;?></span>
            </div>
            <div>
                <input type="submit" value="Register"/>
                <a href="./login.php" style="font-size:20px" >Login</a>
            </div>
        </form><!-- form -->
    </section><!-- content -->
</div><!-- container -->
</body>
</html>
