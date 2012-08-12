
<?php
$artist=$_GET['artist'];
$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db('yahoohack', $con);
$sql="SELECT DISTINCT album_name,id FROM songshuffle WHERE artist_name = '".$artist."'";
$result1 = mysql_query($sql);
$pofnum=1;
$pfnum=1;
$mnum=1;
if($result1 === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
 while($row=mysql_fetch_array($result1))
{
   // $id1=$row['id'];
//echo "<a href='#' onclick=\"select_song($id1)\">".$row['album_name']."</a>";
if($row['album_name']=="The Only Album")
    {
    if($pofnum)
    {
    $pofnum=0;
      $pof="The Only Album";
      $pofartist="Poets Of the Fall";
      echo "<li><a href=\"#\" onclick=\"select_song('$pof','$pofartist')\">".$row['album_name']."</a></li>";}
    }
    if($row['album_name']=="The Other Album")
    {
    if($pfnum)
    {
    $pfnum=0;
    $pf="The Other Album";
    $pfartist="Metallica";
    echo "<li><a href=\"#\" onclick=\"select_song('$pf','$pfartist')\">".$row['album_name']."</a></li>";}
    }
    if($row['album_name']=="Dark of the moon")
    {
    if($mnum)
    {
    $mnum=0;
    $m="Dark of the moon";
    $martist="Pink Floyd";
    echo "<li><a href=\"#\" onclick=\"select_song('$m','$martist')\">".$row['album_name']."</a></li>";}
    }
        }