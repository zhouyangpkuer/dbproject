<html>
<head> <title> summit.php </title>
</head>

<?php

  
  $Hostname = "localhost";
  $DBName = "forum";
  $User = "root";
  $PasswordP = "";

  $con = mysqli_connect($Hostname, $User, $PasswordP) or die("Cant connect into database");
  mysqli_select_db($con, $DBName) or die("Cant connect into database");


  $BlockID = $_GET["block_id"];

  $UserId = $_GET["user_id"];
    
    $SQL = "SELECT * FROM User WHERE UserId = '".$UserId."';";
    $result_id = mysqli_query($con, $SQL) or die("DATABASE ERROR!");
    $datas = mysqli_fetch_array($result_id);
    $user_id = $datas["UserName"];



  $SQL = "INSERT INTO favoriteBlock(UserId, BlockID) VALUES('".$UserId."', '".$BlockID."');";
  $result_id = mysqli_query($con, $SQL);

  // print $SQL;

  $forum_url = "./forum.php?user_id=".$user_id;

    header("Location:".$forum_url);

?>

</html>
