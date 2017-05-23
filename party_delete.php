<html>
<head> <title> party_delete.php </title>
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

    if(isset($_POST['items'])) {
        print "<table class='center'><caption> <h2> You have delete these items successfully! 
                      </h2> </caption>";

        $delete_items = array();
        $delete_items = $_POST['items'];

        $len = sizeof($delete_items);
        if ($len != 0) {
            $items_delete = implode(",", $delete_items);
            $query = "SELECT * FROM party WHERE Party_Num IN ($items_delete)";
            $result = $conn->query($query);

            print "<tr align = 'center'>";

            $num_rows = $result->num_rows;
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
            $query = "DELETE FROM party WHERE Party_Num IN ($items_delete)";
            $result = $conn->query($query);

            if (!$result) {
                die("delete failed!");
            }
        }
        print "</table>";
    }
    else
    {
        print "<p  align = 'center'>";
        print "You select nothing!";
        print "</p>";

    }

    ?>
</p>
</body>
</html>
