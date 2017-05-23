<!-- questionaire_with_db.php
    questionaire for WST with mysql
  -->
<html>
<head>
	<title> Homework four </title>
	<meta name="WST's homework" content="HTML,css,location,perl">
	<link rel = "shortcut icon" type = "image/x-icon" href="../pic/love.ico"/>
	<link rel="stylesheet" href="../css/iconfont.css">

	<link rel = "stylesheet" type = "text/css" href = "../css/hw3_style.css"/>

	<style>
		.homeIcon
		{
			padding-left: 36px;
		}

		.otherIcon
		{
			float:right;
		}
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
<div class="header">
	<ul>
		<li class="homeIcon"><a href="http://162.105.146.180:8115/index.html" >
				<i class="icon iconfont">&#xe602;</i></a></li>
		<li class="otherIcon"><a href="https://twitter.com/yanggepkuer1" target="_blank">
				<i class="icon iconfont">&#xe609;</i></a></li>
		<li class="otherIcon"><a href="http://weibo.com/5536462366/profile?topnav=1&wvr=6&is_all=1" target="_blank">
				<i class="icon iconfont">&#xe60a;</i></a></li>
		<li class="otherIcon"><a href="https://github.com/zhouyangpkuer" target="_blank">
				<i class="icon iconfont">&#xe69f;</i></a></li>
		<li class="otherIcon"><a href="https://www.facebook.com/yang.zhou.52/about?section=work" target="_blank">
				<i class="icon iconfont">&#xe608;</i></a></li>
	</ul>
</div>

<form action = "./summit.php" method = "post" align="center">
	<h2> </br>Welcome to the WST's Questionaire!</h2>
	<p></br></p>
	<h4> Your Name: </h4>
	<p>
		<input type="text" name="Name">
	</p>

	<h4> Your Age: </h4>
	<p>
		<input type="text" name="Age">
	</p>

	<h4> Your E-mail: </h4>
	<p>
		<input type="text" name="E-mail">
	</p>

	<h4> Your Gender: </h4>
	<p>
		<input type = "radio"  name = "Gender"  value = "female"
			   checked = "checked" /> Female <br />
		<input type = "radio"  name = "Gender"  value = "male" />
		Male <br />
	</p>
	<h4> Choose one party: </h4>
	<p>
		<?php
		$conn = new mysqli("localhost", "usr_2016_115", "ZY1997qq", "db_2016_115");
		if ($conn->connect_error)
		{
			die("connecting failed: " . $conn->connect_error);
		}

		$query = "SELECT * FROM party";
		$result = $conn->query($query);
		$num_rows = $result->num_rows;

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
		print "</table> </br>";
		?>
	</p>
	<input type = "submit"  value = "Submit Order" />
	<input type = "reset"  value = "Clear Order Form" />
</form>

<!-- <hr/> -->
<p align="center">
	</br>
	To see all of the guests so far, click
	<a href = "./list.php"> here </a>

	<!--</br>-->
	<!--</br>-->
	<!--To see all of the parties to be held, click-->
	<!--<a href = "./party_list.php"> here </a>-->

	</br>
	</br>
	To update the parties to be held, click
	<a href = "./party_update.html"> here </a>

	</br>
	</br>
	To know about more info of guests to attend one party, click
	<a href = "./search.php"> here </a>

<p></br></p>
<p></br></p>
<p></br></p>
<p></br></p>
<p></br></p>
</p>
<div class="footer">
	<hr/>
	<p>
		&copy RichardZhou 2016.<br/>All Rights Reserved.
	</p>
</div>

</body>
</html>



