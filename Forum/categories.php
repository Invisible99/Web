<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$query = "SELECT * FROM categories";
$result = mysql_query($query, $link3) or die ('fout 2');
while ($row = mysql_fetch_array($result)) 
{
?>
<table width="100%">
	<tr>
    	<td><h5>Categories</h5></td>
    </tr>
    <tr>
    	<td><?php echo $row['cat_name']; ?><br><?php $row['cat_description']; ?></td>
    </tr>
</table>
<?php
}
?>
</body>
</html>