<html>
<head> <title> search_res.php </title>
    <style>
        .center
        {
            margin-left: auto;
            margin-right: auto;
        }
        table,th,td {
            border: 1px solid black;
        }
        th,td {
            text-align: center;
            padding: 15px
        }
    </style>
</head>

<body>
<p align="center">
    Those people will attend this party<br/><br/>
</p>
    <?php
    $conn = new mysqli("localhost", "usr_2016_115", "ZY1997qq", "db_2016_115");
    if ($conn->connect_error)
    {
        die("connecting failed: " . $conn->connect_error);
    }
    $party_num = $_REQUEST['parties'];
    
    $query = "SELECT guest.Guest_ID, Guest_Name, Age, Gender, E_mail
              FROM party, guest_party, guest 
              WHERE guest_party.Party_Num = $party_num
              AND guest_party.Guest_ID = guest.Guest_ID
              AND guest_party.Party_Num = party.Party_Num";
    
    $result = $conn->query($query);
    $num_rows = $result->num_rows;
//    print "$num_rows";
    if($num_rows != 0) {
        print "<table class='center'>";
        print "<tr align = 'center'>";

        $row = $result->fetch_array();
        $num_fields = sizeof($row);
        while ($next_element = each($row)) {
            $next_element = each($row);
            $next_key = $next_element['key'];
            print "<th>" . $next_key . "</th>";
        }
        print "</tr>";
        for ($row_num = 0; $row_num < $num_rows; $row_num++) {
            reset($row);
            print "<tr align = 'center'>";
            for ($field_num = 0; $field_num < $num_fields / 2; $field_num++)
                print "<th>" . $row[$field_num] . "</th> ";
            print "</tr>";
            $row = $result->fetch_array();
        }
        print "</table>";
        print "</form>";
    }
    else
    {
        print "<p  align = 'center'>";
        print "There are no record in the database!";
        print "</p>";
    }

    $conn->close();
?>
</body>
</html>
