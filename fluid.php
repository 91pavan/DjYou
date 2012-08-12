<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <script type="text/javascript">
    function getXMLHTTP() {
  // create the variable that will contain the instance of the XMLHttpRequest object (initially with null value)
      var xmlHttp = null;

    if(window.XMLHttpRequest) {		// for Forefox, IE7+, Opera, Safari, ...
      xmlHttp = new XMLHttpRequest();
    }
    else if(window.ActiveXObject) {	// for Internet Explorer 5 or 6
      xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    return xmlHttp;
  }      
      function ajaxcall(artist)
      {
        var strURL="select_album.php?artist="+artist;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('result').innerHTML=req.responseText;						
					} else {
						alert(req.responseText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
      }
      function select_song(album,artist)
      {
        var strURL="select_song.php?album="+album+"&artist="+artist;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('result2').innerHTML=req.responseText;						
					} else {
						alert(req.responseText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
      }
    </script>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Project name</a>
          <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user"></i> Username
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">Profile</a></li>
              <li class="divider"></li>
              <li><a href="#">Sign Out</a></li>
            </ul>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="addsongs.php">Add Songs</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Genre</li>
              <li class="active"><a href="#">Rock</a></li>
              <li><a href="#">Classical</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Blues</a></li>
              <li><a href="#">Hard Rock</a></li>
              <li><a href="#">World</a></li>
              <li><a href="#">Pop</a></li>
              <li><a href="#">Alternative</a></li>
              <li><a href="#">Dance</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit">
            <h1>Welcome</h1>
            <p>Want a song to be played, just vote.</p>
          </div>
          <div class="row-fluid">
            <div class="span6">
              <h2>Select Artist</h2>
              <div class="span 3">
              
            <ul class="nav nav-list">
              
              <?php
              $con=mysql_connect('localhost','root','');
if(!$con)
    {
        die("Could not connect to the database! Sorry");
    }
$db=mysql_select_db('yahoohack');
$query="SELECT DISTINCT artist_name FROM songshuffle WHERE genre='Rock'";
$result=mysql_query($query) or die(mysql_error());
$numrows=mysql_num_rows($result);
$pofnum=1;
$pfnum=1;
$mnum=1;
if($numrows!=0)
{

    while($row = mysql_fetch_array($result))
    {
    if($row['artist_name']=="Poets Of the Fall")
    {
    if($pofnum)
    {
    $pofnum=0;
      $pof="Poets Of the Fall";
      echo "<li><a href=\"#\" onclick=\"ajaxcall('$pof')\">".$row['artist_name']."</a></li>";
    }
    }
    if($row['artist_name']=="Pink Floyd")
    {
    if($pfnum)
    {
    $pfnum=0;
    $pf="Pink Floyd";
    echo "<li><a href=\"#\" onclick=\"ajaxcall('$pf')\">".$row['artist_name']."</a></li>";
    }
    }
    if($row['artist_name']=="Metallica")
    {
    if($mnum)
    {
    $mnum=0;
    $m="Metallica";
    echo "<li><a href=\"#\" onclick=\"ajaxcall('$m')\">".$row['artist_name']."</a></li>";
    }
   
    

}
}
}?>
              </div>
            </div><!--/span-->
            <div class="span6">
              <h2>Select Album</h2>
<div id="result"></div>

            </div><!--/span-->
          </div><!--/row-->
          <div class="row-fluid">
            <h2>Select Song</h2>
<div id="result2"></div>            
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
