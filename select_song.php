
<?php
session_start();
$album=$_GET['album'];
$artist=$_GET['artist'];
$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db('yahoohack', $con);
$sql="SELECT * FROM songshuffle WHERE artist_name='$artist' AND album_name='$album'";
$result1 = mysql_query($sql);
if($result1 === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
?>
<form action="song_submit.php" method="post">
	<?php while($row=mysql_fetch_array($result1))
{
  $id=$row['id'];
  $_SESSION['id']=$id;
  echo "<br/>";
echo "<a href=\"increment.php?id=$id\">".$row['song_name']."</a>";
$posts = array( 'song_name'=> $row['song_name']);
        }
//echo json_encode($posts);

//foreach ($posts as $response)
//{
//    echo $response;
//}
echo "<br/>";
?>
</form>
</html>