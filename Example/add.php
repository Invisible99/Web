<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post">
	<table>
    	<tr>
        	<td>Title</td>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
        	<td>Release Date</td>
            <td><input type="text" name="release"></td>
        </tr>
    	<tr>
        	<td>Genre</td>
            <td><input type="text" name="genre"></td>
        </tr>
        <tr>
        	<td>Platform</td>
            <td><input type="text" name="platform"></td>
        </tr>
        <tr>
        	<td colspan="2" align="center"><input type="submit" name="add" value="Add game"></td>
        </tr>
    </table>
</form>

<?php
if (isset($_POST['add']))
{
	if (!empty($_POST['title']) && !empty($_POST['release']) && !empty($_POST['genre']) && !empty($_POST['platform']))
	{
		$title = $_POST['title'];
		$release = $_POST['release'];
		$genre = $_POST['genre'];
		$platform = $_POST['platform'];
		$link = mysql_connect ("localhost", "root", "dreft321") or die ("error");
		mysql_select_db ("dbgames", $link) or die ("db error");
		$add = "INSERT INTO tblgames (`Release Date`, Title, Genre, Platform) VALUES ('$release', '$title', '$genre', '$platform')";
		$res = mysql_query ($add, $link);
		echo "<script>window.close();</script>";
	}
	else
	{
		echo "Fill in all fields.";
	}
}
	
?>
</body>
</html>