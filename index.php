<?php
$con=mysql_connect('localhost','root','');
if(!$con)
    {
        die("Could not connect to the database! Sorry");
    }
$db=mysql_select_db('yahoohack');
$query="SELECT song_name FROM songshuffle WHERE count=(SELECT max(count) FROM songshuffle)";
$result=mysql_query($query) or die(mysql_error());
$numrows=mysql_num_rows($result);
if($numrows!=0)
{
    while($row = mysql_fetch_array($result))
    {
        
    }
}
else
{
die("That Song name is not there in the playlist! Want to add it?");
}
?> 