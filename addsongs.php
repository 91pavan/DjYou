<?php
echo "<h1>Register</h1>";
?>
<html>
<form action='song_add.php' method='POST'>
<table>
	<tr>
		<td>
		Add Artist:
		</td>
		<td>
		<input type='text' name='artist'>
		</td>
	</tr>
	<tr>
		<td>
		Album name:
		</td>
		<td>
		<input type='text' name='album'>
		</td>
	</tr>
	
	<tr>
		<td>
		Add Song Name:
		</td>
		<td>
		<input type='text' name='song'>
		</td>
	</tr>
        <tr>
		<td>
		Add Genre:
		</td>
		<td>
		<input type='text' name='genre'>
		</td>
	</tr>
</table>
<p>
<input type='Submit' value='Add songs!'>
</p>
</html>