<html>
<head> <title> summit.php </title>
</head>

<?php  
    $UserId = $_GET["user_id"];
    print $UserId;

    $topic_id = $_GET["topic_id"];
    $total_num_message = $_GET["total_num_message"];
    $total_num_message ++;

  $Hostname = "localhost";
  $DBName = "forum";
  $User = "root";
  $PasswordP = "";

  $con = mysqli_connect($Hostname, $User, $PasswordP) or die("Cant connect into database");
  mysqli_select_db($con, $DBName) or die("Cant connect into database");

  $message = $_REQUEST["message"];


    $SQL = "SELECT * FROM User WHERE UserName = '".$UserId."';";
    $result_id = mysqli_query($con, $SQL) or die("DATABASE ERROR!");
    $datas = mysqli_fetch_array($result_id);
    $user_id = $datas["UserId"];


  $SQL = "INSERT INTO Message(MsgId, TopicId, UserId, MsgContent, MsgTime, FLoorNumber) VALUES (null, ".$topic_id.", ".$user_id.", '".$message."', null, ".$total_num_message.");";

  $result_id = mysqli_query($con, $SQL);

  print $SQL;

  // $forum_url = "./topic.php?topic_id=".$topic_id."&user_id=".$UserId;

    // header("Location:".$forum_url);






?>

</html>
