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

    <title>Jumbotron Template for Bootstrap</title>

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
			<?php
			print 'Welcome: '.$_GET['user_id'].'!';
			?>
	       </a>
        </div>
        <div id='navbar' class='navbar-collapse collapse'>
          <form class='navbar-form navbar-right'>
            <div class='form-group'>
              <input type='text' placeholder='Username' class='form-control'>
            </div>
            <div class='form-group'>
              <input type='password' placeholder='Password' class='form-control'>
            </div>
            <button type='submit' class='btn btn-success'>Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>















  <div class="container">

















<div class="row row-offcanvas row-offcanvas-right">

  <div class="col-xs-12 col-sm-9">

      <div class="jumbotron">
            <h1>Your favorate blocks!</h1>
            <p>You can click on each block, and then you will get more details about this block!</p>
      </div>

<?php
  $Username = $_GET["user_id"];
  
  $Hostname = "localhost";
  $DBName = "forum";
  $User = "root";
  $PasswordP = "";

  $con = mysqli_connect($Hostname, $User, $PasswordP) or die("Cant connect into database");
  mysqli_select_db($con, $DBName) or die("Cant connect into database");

  $SQL = "SELECT * FROM User WHERE UserName = '".$Username."';";
  $result_id = mysqli_query($con, $SQL) or die("DATABASE ERROR!");
  $datas = mysqli_fetch_array($result_id);
  $UserId = $datas["UserId"];
  // mysqli_close();


  $SQL = "SELECT * FROM favoriteBlock WHERE UserId = '".$UserId."';";
  $result_id = mysqli_query($con, $SQL) or die("DATABASE ERROR!");
  $datas = mysqli_fetch_array($result_id);
  $BlockId = $datas["BlockId"];

  $SQL = "SELECT * FROM Block WHERE BlockId = '".$BlockId."';";
  $result_id_block = mysqli_query($con, $SQL) or die("DATABASE ERROR!");
  $total_num_block = mysqli_num_rows($result_id_block);


  print "<div class='row'>";
  // print $total_num_block; 

      for($i = 0; $i < $total_num_block; $i++)
      {
        $datas_block = mysqli_fetch_array($result_id_block);
        $block_url = "./block.php?block_name=".$datas_block["BlockName"];
        
        print "<div class='col-xs-6 col-lg-4'>
          <a href='".$block_url; 
          print "'> <img class='img-circle' src='";

          print "./pic/".$datas_block["BlockName"].".jpg"; 

          print "' alt='Generic placeholder image' width='140' height='140'></a> 
          <h2>";
          print $datas_block["BlockName"];
        
          print "</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p>
          <a class='btn btn-default' href='";
          print $block_url; 
          print "' role='button'>View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->";
      }

  print "</div><!-- /.row -->";

?>

  </div>

<div class='col-xs-6 col-sm-3 sidebar-offcanvas' id='sidebar'>
          <div class='list-group'>
            <a href='#' class='list-group-item active'>Sigcomm</a>
            <a href='#' class='list-group-item'>Link</a>
            <a href='#' class='list-group-item'>Link</a>
            <a href='#' class='list-group-item'>Link</a>
            <a href='#' class='list-group-item'>Link</a>
            <a href='#' class='list-group-item'>Link</a>
            <a href='#' class='list-group-item'>Link</a>
            <a href='#' class='list-group-item'>Link</a>
            <a href='#' class='list-group-item'>Link</a>
            <a href='#' class='list-group-item'>Link</a>
          </div>
        </div><!--/.sidebar-offcanvas-->
  </div>















 <br/><br/><br/><br/><br/><br/><br/><br/>
          <hr/>






  <div class="row row-offcanvas row-offcanvas-right">

  <div class="col-xs-12 col-sm-9">

      <div class="jumbotron">
            <h1>Your favorate topics!</h1>
            <p>You can click on each topic, and then you will get more details about this topic!</p>
      </div>


<?php
  $Username = $_GET["user_id"];
  
  $Hostname = "localhost";
  $DBName = "forum";
  $User = "root";
  $PasswordP = "";

  $con = mysqli_connect($Hostname, $User, $PasswordP) or die("Cant connect into database");
  mysqli_select_db($con, $DBName) or die("Cant connect into database");

  $SQL = "SELECT * FROM User WHERE UserName = '".$Username."';";
  $result_id = mysqli_query($con, $SQL) or die("DATABASE ERROR!");
  $datas = mysqli_fetch_array($result_id);
  $UserId = $datas["UserId"];
  // mysqli_close();


  $SQL = "SELECT * FROM favoriteTopic WHERE UserId = '".$UserId."';";
  $result_id = mysqli_query($con, $SQL) or die("DATABASE ERROR!");
  $datas = mysqli_fetch_array($result_id);
  $TopicId = $datas["TopicId"];

  $SQL = "SELECT * FROM Topic WHERE TopicId = '".$TopicId."';";
  $result_id_topic = mysqli_query($con, $SQL) or die("DATABASE ERROR!");
  $total_num_topic = mysqli_num_rows($result_id_topic);


  print "<div class='row'>";
  // print $total_num_block; 

      for($i = 0; $i < $total_num_topic; $i++)
      {
        $datas_topic = mysqli_fetch_array($result_id_topic);
        
        $topic_url = "./topic.php?topic_id=".$datas_topic["TopicId"];
        
        print "<div class='col-xs-6 col-lg-4'><h2>";
          print $datas_topic["TopicTitle"];
          print "</h2><p>";
          print $datas_topic["TopicContent"];
          print "
          </p>  
          <p>
          <a class='btn btn-default' href='";
          print $topic_url; 
          print "' role='button'>View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->";
      }

  print "</div><!-- /.row -->";

?>
  </div>

<div class='col-xs-6 col-sm-3 sidebar-offcanvas' id='sidebar'>
          <div class='list-group'>
            <a href='#' class='list-group-item active'>Sigcomm</a>
            <a href='#' class='list-group-item'>Link</a>
            <a href='#' class='list-group-item'>Link</a>
            <a href='#' class='list-group-item'>Link</a>
            <a href='#' class='list-group-item'>Link</a>
            <a href='#' class='list-group-item'>Link</a>
            <a href='#' class='list-group-item'>Link</a>
            <a href='#' class='list-group-item'>Link</a>
            <a href='#' class='list-group-item'>Link</a>
            <a href='#' class='list-group-item'>Link</a>
          </div>
        </div><!--/.sidebar-offcanvas-->
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
