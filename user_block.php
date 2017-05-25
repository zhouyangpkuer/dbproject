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


  $BlockID = $datas["block_id"];

  $UserId = $datas["user_id"];


  $SQL = "INSERT INTO favoriteBlock(UserId, BlockID) VALUES('".$UserId."', '".$BlockID."');";
  $result_id = mysqli_query($con, $SQL);

  // print $SQL;

  $block_url = "./block.php?block_name=".$block_name."&user_id=".$user_id;

    header("Location:".$block_url);

?>

</html>
