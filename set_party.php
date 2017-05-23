<html>
<head> <title> set_party.php </title>
</head>

<body>
<p align="center">
    You have set the party successfully! <br/>
</p>
<?php

    $conn = new mysqli("localhost", "usr_2016_115", "ZY1997qq", "db_2016_115");
    if ($conn->connect_error) {
        die("connecting failed: " . $conn->connect_error);
    }

    $time = $_REQUEST['Time'];
    $place = $_REQUEST['Place'];
    $host_name = $_REQUEST['Host_Name'];

    $query = "INSERT INTO party(Time, Place, Host_Name)    
                VALUES('$time', '$place', '$host_name')";

    $result = $conn->query($query);
    if (!$result) {
        die("summit failed!");
    }

    $conn->close();
?>
</body>
</html>
