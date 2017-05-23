<html>
<head> <title> summit.php </title>
</head>

<body>
    <p align="center">
        Thanks for participating in our questionaire <br/>
    </p>
    <?php

    $conn = new mysqli("localhost", "usr_2016_115", "ZY1997qq", "db_2016_115");
    if ($conn->connect_error)
    {
        die("connecting failed: " . $conn->connect_error);
    }

    $name = $_REQUEST['Name'];
    $age = $_REQUEST['Age'];
    $email = $_REQUEST['E-mail'];
    $gender = $_REQUEST['Gender'];

//    print "$party";
//    print "$name"."$age"."$email"."$gender";

    $query = "INSERT INTO guest(Guest_Name, Age, Gender, E_mail)    
                VALUES('$name', '$age', '$gender', '$email')";
    $result = $conn->query($query);
    if(!$result)
    {
        die("summit failed!");
    }

    if(isset($_REQUEST['parties'])) {
        $party = $_REQUEST['parties'];

        $query = "SELECT MAX(Guest_ID) FROM guest";
        $result = $conn->query($query);
        $row = $result->fetch_array();

//    print "$row[0]";
        if (!$result) {
            die("summit failed!");
        }

        $query = "INSERT INTO guest_party(Guest_ID, Party_Num)    
                VALUES('$row[0]', '$party')";
        $result = $conn->query($query);
        if (!$result) {
            die("summit failed!");
        }
    }
    $conn->close();
    ?>
</body>
</html>
