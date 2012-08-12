<?php
ERROR_REPORTING('NULL');
$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db('yahoohack', $con);
$sql1="SELECT * from songshuffle WHERE count=(SELECT max(count) from songshuffle) LIMIT 1;";
$result1=mysql_query($sql1);
while($row=mysql_fetch_array($result1))
{
    $countvar=$row['count'];
    $countid=$row['id'];
    //$posts = array('song_name'=> $row['song_name']);
    $a=$_GET['callback'].'(' . "{'fullname' : '$row[song_name]'}" . ')';
    //$a =$_GET['callback'].'(' . "{'fullname' : 'Jeff Hansen'}" . ')';
    echo $a;
}
$sql2="UPDATE songshuffle set count=0 WHERE id='$countid';";
$result2=mysql_query($sql2);
?>