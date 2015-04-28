<?php
session_start();
if ($_SESSION['gebruiker'] == "") {
	echo "You need to be logged in to create a category.";
}
if (isset($_POST['topic_submit'])) {
	if (($_POST['category_title'] == "") && ($_POST['category_description'] == "")) {
		echo "You did not fill in both fields. Please return to the previous page.";
	} else {
		$link=mysql_connect('localhost','root','dreft321') OR die("connectie met server mislukt");
   		mysql_select_db('dbforum',$link) OR die("connectie met databank mislukt");
		$title = $_POST['category_title'];
		$desc = $_POST['category_description'];
		$sql = "INSERT INTO categories (category_title, category_description) VALUES ('".$title."', '".$desc."')";
		$res = mysql_query($sql) or die(mysql_error());
		if ($res == 1)
      	{
        echo "<script>window.close();</script>";
      	}
	}
}
?>