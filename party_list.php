<html>
<head> <title> party_list.php </title>
</head>

<body>
<head>
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

<p align="center">
    <?php
    $conn = new mysqli("localhost", "usr_2016_115", "ZY1997qq", "db_2016_115");
    if ($conn->connect_error)
    {
        die("connecting failed: " . $conn->connect_error);
    }


    $query = "SELECT * FROM party";
    $result = $conn->query($query);
    $num_rows = $result->num_rows;
    if($num_rows != 0) {
        print "<form action = './party_delete.php' method = 'post'>";
        print "<table class='center'><caption> <h2> Results of all the parties  
                  </h2> </caption>";

        print "<tr align = 'center'>";

        $row = $result->fetch_array();
        $num_fields = sizeof($row);

        print "<th>  </th>";
        while ($next_element = each($row)) {
            $next_element = each($row);
            $next_key = $next_element['key'];
            print "<th>" . $next_key . "</th>";
        }
        print "</tr>";

        for ($row_num = 0; $row_num < $num_rows; $row_num++) {
            reset($row);
            print "<tr align = 'center'>";

            print "<th>" . "<label><input name = 'items[]' type = 'checkbox' value = $row[0] /></label>" . "</th>";

            for ($field_num = 0; $field_num < $num_fields / 2; $field_num++)
                print "<th>" . $row[$field_num] . "</th> ";
            print "</tr>";
            $row = $result->fetch_array();
        }
        print "</table>";
        print "<p  align = 'center'>";
        print "<input type = 'submit'  value = 'Delete'/>";
        print "</p>";
        print "</form>";
    }
    else
    {
        print "<p  align = 'center'>";
        print "There are no record in the database!";
        print "</p>";

    }
    ?>
</p>
</body>
</html>
