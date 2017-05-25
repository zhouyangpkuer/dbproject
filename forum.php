 <!DOCTYPE html>
<html lang='zh-CN'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name='description' content=''>
    <meta name='author' content=''>
    <link rel='icon' href='../../favicon.ico'>

    <title>PaperHeaven</title>

    <!-- Bootstrap core CSS -->
    <link href='css/bootstrap.min.css' rel='stylesheet'>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href='css/ie10-viewport-bug-workaround.css' rel='stylesheet'>

    <!-- Custom styles for this template -->
    <link href='css/jumbotron.css' rel='stylesheet'>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src='../../assets/js/ie8-responsive-file-warning.js'></script><![endif]-->
    <script src='js/ie-emulation-modes-warning.js'></script>
  <link href="css/offcanvas.css" rel="stylesheet">
    <link href='css/carousel.css' rel='stylesheet'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src='https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js'></script>
      <script src='https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js'></script>
    <![endif]-->
  </head>

  <body>

    <nav class='navbar navbar-inverse navbar-fixed-top'>
      <div class='container'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='#'>
          Forum
         </a>

          <a class='navbar-brand' href='#'>
            <?php
            print 'Welcome: '.$_GET['user_id'].' !';
            ?>
         </a>

        <?php  
        print   
         "<a class='navbar-brand' href='./manager.php?user_id=";
         print $_GET["user_id"];
         print "'>
          Back to Manager
         </a>";
          ?>

        </div>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a class='navbar-brand' href='./index.html'>
          PaperHeaven
          </a> 

        </li>
      </ul>
      
      </div>
    </nav>















  <div class="container">





  <div class="row">



<?php
  

  $Hostname = "localhost";
  $DBName = "forum";
  $User = "root";
  $PasswordP = "";

  $con = mysqli_connect($Hostname, $User, $PasswordP) or die("Cant connect into database");
  mysqli_select_db($con, $DBName) or die("Cant connect into database");

  $SQL = "SELECT * FROM Block;";
  $result_block = mysqli_query($con, $SQL) or die("DATABASE ERROR!");
  $total_num_block = mysqli_num_rows($result_block);

 
  print "<div class='row'>";
  // print $total_num_block; 

      for($i = 0; $i < $total_num_block; $i++)
      {
      	$datas_block = mysqli_fetch_array($result_block);
  		$BlockId = $datas_block["BlockId"];
  
		$block_name = $datas_block["BlockName"];
  		$user_id = $_GET["user_id"];

  		$SQL = "SELECT * FROM User WHERE UserName = '".$user_id."';";
		$result_id = mysqli_query($con, $SQL) or die("DATABASE ERROR!");
  		$datas = mysqli_fetch_array($result_id);
  		$UserId = $datas["UserId"];




        print "<div class='col-lg-4'>
       		<img class='img-circle' src='";

          print "./pic/".$block_name.".jpg"; 

          print "' alt='Generic placeholder image' width='140' height='140'> <h2>";
          print $block_name;
        
          print "</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p>";


        $SQL_test = "SELECT * FROM favoriteBlock where UserId = '".$UserId."', BlockId = '".$BlockID."';";
  		$result_test = mysqli_query($con, $SQL) or die("DATABASE ERROR!");
 		$total_num_test = mysqli_num_rows($result_block);
  	
  		if($total_num_test == 0)
  		{
            print "<a class='btn btn-lg btn-success' href='"."./user_block.php"."?block_id=".$BlockId."&user_id=".$UserId."' role='button'>Collect Now!</a>";
        }
        else
        {
        print "<a class='btn btn-lg btn-success' href='#' role='button'>Collected!</a>";
        	
        }
         print "</p>
        </div><!-- /.col-lg-4 -->";
      
  mysqli_close();
?>
  </div>

    



    

      <hr>

      <footer>
        <p>&copy; 2017 dbproject</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src='js/jquery.min.js'></script>
    <script>window.jQuery || document.write('<script src='../../assets/js/vendor/jquery.min.js'><\/script>')</script>
    <script src='js/bootstrap.min.js'></script>
    <script src="js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src='js/ie10-viewport-bug-workaround.js'></script>
  </body>
</html>
 