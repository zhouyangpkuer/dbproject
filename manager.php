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

    <!-- <link rel="stylesheet" href="http://getbootstrap.com.vn/examples/equal-height-columns/equal-height-columns.css" /> -->

    <!-- <link href='css/adjust.css' rel='stylesheet'> -->





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
          Manager
         </a>

          <a class='navbar-brand' href='#'>
            <?php
            print 'Welcome: '.$_GET['user_id'].' !';
            ?>
         </a>
         
        </div>  
      <ul class="nav navbar-nav navbar-right">
        <li>
        <?php
        print "
          <a class='navbar-brand' href='./forum.php?user_id=".$_GET["user_id"];  
          print "'>";
          ?>
          Forum
          </a> 
        </li>
        <li>
          <a class='navbar-brand' href='./index.html'>
          PaperHeaven
          </a> 
        </li>
      </ul>
      
      </div>
    </nav>



 











  <div class="container">

















<div class="row row-offcanvas row-offcanvas-right ">

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


  $SQL = "SELECT * FROM favoriteBlock WHERE UserId = '".$UserId."';";
  $result_id = mysqli_query($con, $SQL) or die("DATABASE ERROR!");
  $total_num_block = mysqli_num_rows($result_id);
  

  print "<div class='row'>";
  // print $total_num_block; 

      for($i = 0; $i < $total_num_block; $i++)
      {
        $datas = mysqli_fetch_array($result_id);
        $BlockId = $datas["BlockId"];

        $SQL = "SELECT * FROM Block WHERE BlockId = '".$BlockId."';";
        $result_id_block = mysqli_query($con, $SQL) or die("DATABASE ERROR!");


        $datas_block = mysqli_fetch_array($result_id_block);
        $block_url = "./block.php?block_name=".$datas_block["BlockName"]."&user_id=".$Username;
        
        print "<div style='height:500px;' class='col-xs-6 col-lg-4'>
          <a href='".$block_url; 
          print "'> <img class='img-circle' src='";

          print "./pic/".str_replace('/', ':', $datas_block["BlockName"]).".jpg"; 

          print "' alt='Generic placeholder image' width='140' height='140'></a> 
          <h2>";
          print $datas_block["BlockName"];
        
          print "</h2>
          <p>".$datas_block['BlockIntro']."</p>";
          
          print "<p>
          <a class='btn btn-default' href='";
          print $block_url; 
          print "' role='button'>View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->";
      }

  print "</div><!-- /.row -->";
  mysqli_close();

?>

  </div>

<div class='col-xs-6 col-sm-3 sidebar-offcanvas' id='sidebar'>
          <div class='list-group'>
            <a href='http://www.sigcomm.org/' class='list-group-item'>Sigcomm</a>
            <a href='https://sigmod.org/' class='list-group-item'>Sigmod</a>
            <a href='https://www.usenix.org/conference/nsdi17' class='list-group-item'>NSDI</a>
            <a href='http://www.vldb.org/2017/' class='list-group-item'>VLDB</a>
            <a href='http://www.kdd.org/' class='list-group-item'>Sigkdd</a>
            <a href='http://cvpr2017.thecvf.com/' class='list-group-item'>CVPR</a>
            <a href='https://www.usenix.org/conference/osdi16' class='list-group-item'>OSDI</a>
            <a href='https://www.sigmetrics.org/sigmetrics2017/' class='list-group-item'>Sigmetrics</a>
            <a href='https://www.sigops.org/sosp/sosp17/' class='list-group-item'>SOSP</a>
            <a href='https://2017.icml.cc/' class='list-group-item'>ICML</a>

            
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


  $SQL = "SELECT * FROM favoriteTopic WHERE UserId = '".$UserId."';";
  $result_id = mysqli_query($con, $SQL) or die("DATABASE ERROR!");
  $total_num_topic = mysqli_num_rows($result_id);


  
  print "<div class='row'>";
  // print $total_num_block; 

      for($i = 0; $i < $total_num_topic; $i++)
      {
        $datas = mysqli_fetch_array($result_id);
        $TopicId = $datas["TopicId"];

        $SQL = "SELECT * FROM Topic WHERE TopicId = '".$TopicId."';";
        $result_id_topic = mysqli_query($con, $SQL) or die("DATABASE ERROR!");


        $datas_topic = mysqli_fetch_array($result_id_topic);
        
        $topic_url = "./topic.php?topic_id=".$datas_topic["TopicId"]."&user_id=".$Username;
        
        print "<div style='height:400px;' class='col-xs-6 col-lg-4'><h2>";
          print $datas_topic["TopicTitle"];
          print "</h2><p>";
          print $datas_topic["TopicContent"];
          print "<br/>".$datas_topic['TopicTime'];
          print "
          </p>  
          <p>
          <a class='btn btn-default' href='";
          print $topic_url; 
          print "' role='button'>View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->";
      }

  print "</div><!-- /.row -->";

  mysqli_close();
?>
  </div>

<div class='col-xs-6 col-sm-3 sidebar-offcanvas' id='sidebar'>
          <div class='list-group'>
            <a href='https://scholar.google.com/' class='list-group-item'>Google Scholar</a>
            <a href='https://www.researchgate.net/' class='list-group-item'>Research Gate</a>
            <a href='https://arxiv.org/' class='list-group-item'>arXiv</a>
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
