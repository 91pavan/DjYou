<html>
<head>
<link rel="stylesheet" href="screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="print.css" type="text/css" media="print">
<!--[if IE]><link rel="stylesheet" href="ie.css" type="text/css" media="screen, projection"><![endif]-->
</head>
<div class="container showgrid">
<?php
//form data
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$artist=strip_tags($_POST['artist']);
$album=strip_tags($_POST['album']);
$song=strip_tags($_POST['song']);
$genre=strip_tags($_POST['genre']);
$count=0;
if($artist&&$album&&$song&&$genre){
				$connect=mysql_connect("localhost","root","");
				mysql_select_db('yahoohack');
				
				$query=mysql_query("INSERT INTO songshuffle (id,artist_name,album_name,song_name,count,genre) VALUES ('','$artist','$album','$song','$count','$genre')");
				
				die("Song has been added! Thanks.");
				}
			
		
	
	else
		echo "Haven't added all the data.! Please try again!";

?>
</html>
