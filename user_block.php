<html>
<head> <title> summit.php </title>
</head>

<?php
  $block_name = $_GET["block_name"];
  $user_id = $_GET["user_id"];

  
  $Hostname = "localhost";
  $DBName = "forum";
  $User = "root";
  $PasswordP = "";

  $con = mysqli_connect($Hostname, $User, $PasswordP) or die("Cant connect into database");
  mysqli_select_db($con, $DBName) or die("Cant connect into database");



  $SQL = "SELECT * FROM Block WHERE BlockName = '".$block_name."';";
  $result_id = mysqli_query($con, $SQL) or die("DATABASE ERROR!");
  $datas = mysqli_fetch_array($result_id);
  $BlockID = $datas["BlockId"];


  $SQL = "SELECT * FROM User WHERE UserName = '".$user_id."';";
  $result_id = mysqli_query($con, $SQL) or die("DATABASE ERROR!");
  $datas = mysqli_fetch_array($result_id);
  $UserId = $datas["UserId"];


  $SQL = "INSERT INTO favoriteBlock(UserId, BlockID) VALUES('".$UserId."', '".$BlockID."');";
  $result_id = mysqli_query($con, $SQL);

  print $SQL;

  $block_url = "./block.php?block_name=".$block_name."&user_id=".$user_id;

    // header("Location:".$block_url);

?>

</html>
