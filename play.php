<?php

$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db('yahoohack', $con);
$sql="select * from songshuffle where count=(select max(count) from songshuffle);";
$result=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_array($result);

?>
 <?php echo $row['song_name'].".mp3"; ?>
		