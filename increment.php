<?php
session_start();
ERROR_REPORTING('NULL');
$id2=$_SESSION['id'];
$id=$_GET['id'];
$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db('yahoohack', $con);
$sql="UPDATE songshuffle SET count=count+1 WHERE id=$id";
$result=mysql_query($sql) or die(mysql_error());
$sql1="SELECT * from songshuffle WHERE count=(SELECT max(count) from songshuffle);";
$result1=mysql_query($sql1);
while($row=mysql_fetch_array($result1))
{
    $posts = array('song_name'=> $row['song_name']);

    
}
echo "Successfully submitted! Thanks.";?>