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
			     <?php
		        	print 'Topic: '.$_GET['topic_id'].' !';
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






      <div class="jumbotron">
            <h3>



<?php
  $topic_id = $_GET["topic_id"];
  $user_id = $_GET['user_id'];


  $Hostname = "localhost";
  $DBName = "forum";
  $User = "root";
  $PasswordP = "";

  $con = mysqli_connect($Hostname, $User, $PasswordP) or die("Cant connect into database");
  mysqli_select_db($con, $DBName) or die("Cant connect into database");

  

  $SQL = "SELECT * FROM Topic WHERE TopicId = '".$topic_id."'";
  $result_id = mysqli_query($con, $SQL) or die("DATABASE ERROR!");
  $datas_topic = mysqli_fetch_array($result_id);

  print "Topic: ".$datas_topic['TopicTitle']." !";
  print "<br/>".$datas_topic['TopicTime'];

  print "</h3>
            <p>".$datas_topic[TopicContent]."</p>
      </div>
  <div class='row'>";



  $SQL = "SELECT * FROM Message WHERE TopicId = '".$topic_id."' order by FLoorNumber asc;";
  $result_id = mysqli_query($con, $SQL) or die("DATABASE ERROR!");
  $total_num_message = mysqli_num_rows($result_id);


  
  print "<div class='row'>";
  // print $total_num_block; 

      for($i = 0; $i < $total_num_message; $i++)
      {

        $datas_topic = mysqli_fetch_array($result_id);
        
        
        print "<div class='jumbotron'>";
    
    print "<h3> ".$datas_topic['MsgTime']."<br/>Floor ";
          print $datas_topic["FLoorNumber"];
          print " said: </h3>";
        print "<p>";
          print $datas_topic["MsgContent"];
          print "
          </p>  
        </div><!-- /.jumbotron -->";
      }

  print "</div><!-- /.row -->";

  mysqli_close();


print "<br/><br/><br/><br/><br/><br/><br/><br/>";
      print "<div class='jumbotron'>
            <h3>Type your own Comments!</h3>
      </div>";


print "<form class='form-horizontal'  align='center' action='./writemessage.php?topic_id=";
  print $topic_id."&user_id=".$user_id."&total_num_message=".$total_num_message;
  print "' method = 'post'>";

?>

  <textarea class="form-control" rows="6" name="message"></textarea>
  <br/>
  <button type="submit" class="btn btn-lg btn-success">Submit</button>
</form>

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
