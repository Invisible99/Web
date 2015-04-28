<!DOCTYPE html>
<html>
<head>
<style>
table
{
border-collapse:collapse;
}
table, td, th
{
border:thin solid black;
}
</style>
</head>
<?php
$link = mysql_connect('localhost', 'root', 'dreft321') or die ('Connection failed');
mysql_select_db ('dbforum', $link) or die ('Selection failed');
	echo '<h4 align="center">Topics</h4>';
	$sel = "SELECT * FROM topics";
	if(!isset($_SESSION['gebruiker']))
	{
		echo '<h6>Sorry, you do not have sufficient rights to access this page. Register or login to create a category.</h6>';
	}
	else
	{
		$res = mysql_query ($sel, $link) or die ('Query failed');
		while ($row = mysql_fetch_array($res))
		{
			echo "<table width='75%' style='margin-left:12.5%; margin-right:12.5%;' bgcolor='#0099FF' style='border-collapse:thin solid' bordercolor='#000000'>
				<tr>
					<td width='50%'><h5>Subject: <a href='posts.php'>".$row['topic_name']."</a></h5><p style='font-size:xx-small'>Description: ".$row['topic_desc']."</p></td>
					<td width='25%'><h6>Create date:<br> ".$row['topic_date']."</h6></td>
				</tr>
			</table>";
		}
	}
?>
</html>