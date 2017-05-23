<html>
<head> <title> search.php </title>
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
    Select one party that you want to know which guests will take part in <br/><br/>
</p>
<?php
    $conn = new mysqli("localhost", "usr_2016_115", "ZY1997qq", "db_2016_115");
    if ($conn->connect_error)
    {
        die("connecting failed: " . $conn->connect_error);
    }

	$query = "SELECT * FROM party";
	$result = $conn->query($query);
	$num_rows = $result->num_rows;

    print "<form action = './search_res.php' method = 'post'>";

    print "<table class='center'>";
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
        print "<th>" . "<label><input name = 'parties' type = 'radio' value = $row[0] /></label>" . "</th>";
        for ($field_num = 0; $field_num < $num_fields / 2; $field_num++)
            print "<th>" . $row[$field_num] . "</th> ";
        print "</tr>";
        $row = $result->fetch_array();
    }
    print "</table>";
    print "<p  align = 'center'>";
    print "<input type = 'submit'  value = 'Search'/>";
    print "</p>";
    print "</form>";

    $conn->close();
?>
</body>
</html>
