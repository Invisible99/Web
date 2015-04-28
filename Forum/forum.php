<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forum</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

<div class="container">
  <div class="content">
   <?php		
	if (isset($_SESSION['gebruiker'])) 
		{
			echo "<a href ='?action=Afmelden'><h6 align='right'>Afmelden</h6></a>";
		}
		else 
		{
			echo "<div align='center'>";
			include ("login.php");
			echo "</div>";
			echo "<h6 align='right'><a href ='javascript:void(0);' onClick=window.open('register.php','','width=300,height=200')>Register</a></h6>";
		}

		if (isset($_GET['action']))
		{
			$ac = $_GET['action'];
		}
		else 
		{
			$ac = " ";
		} 
		if ($ac == "Login") 
		{
			include ("login.php");
		}		
		elseif ($ac == "Afmelden") 
		{
			include ("logout.php");
		}	
		elseif ($ac == "register")
		{
			include ("register.php");
		}	
		
	$host = 'localhost';
	$user = 'root';
	$password = 'root';
	$link=mysqli_connect($host,$user,$password) OR die("connectie met server mislukt");
    mysqli_select_db($link, 'dbforum') OR die("connectie met databank mislukt");
	$sql = "SELECT * FROM categories ORDER BY category_title ASC";
	$res = mysqli_query ($link, $sql) or die ("Query fout");
	$categories = "";
	echo "<h6 id='create_cat'><a href ='javascript:void(0);' onClick=window.open('create_category.php','','width=700,height=250')>Create Category</a></h6>";
	if (mysqli_num_rows($res) > 0)
	{
		while ($row = mysqli_fetch_array($res))
		{
			$id = $row['id'];
			$title = $row['category_title'];
			$desc = $row['category_description'];
			$categories .= "<a href='view_category.php?cid=".$id."' class='cat_link'>".$title." - <font size='-1'>".$desc."</font></a>";
		}
		echo $categories;
	}
	else
	{
		echo "<h5>There are no categories available yet.</h5>";
	}
	?>
    
</div>
</div>
</body>
</html>