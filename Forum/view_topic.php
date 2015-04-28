<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Topic</title>
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
		
	$link=mysqli_connect('localhost','root','root') OR die("connectie met server mislukt");
    mysqli_select_db($link,'dbforum') OR die("connectie met databank mislukt");
	$cid = $_GET['cid'];
	$tid = $_GET['tid'];
	$sql = "SELECT * FROM topics WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
	$res = mysqli_query($link, $sql) or die(mysql_error());
	if (mysqli_num_rows($res) == 1) {
		echo "<table width='90%' style='margin-left:5%; margin-right:5%'>";
		if (isset($_SESSION['gebruiker'])) 
		{ 
			echo "<tr><td colspan='2'><input type='submit' value='Add Reply' onClick=\"window.location = 'post_reply.php?cid=".$cid."&tid=".$tid."'\" />"; 
		} 
		else 
		{ 
			echo "<tr><td colspan='2'><p>Please log in to add your reply.</p></td></tr>"; 
		}
		while ($row = mysqli_fetch_assoc($res)) 
		{
			$sql2 = "SELECT * FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."'";
			$res2 = mysqli_query($link, $sql2) or die(mysql_error());
			while ($row2 = mysqli_fetch_assoc($res2)) 
			{
				echo "<tr>
						<td valign='top' style='border: 5px solid #000;'><font size='3' style='margin-left:1%; margin-right:1%'>".$row['topic_title']."</font><br><font size='-4' style='margin-left:1%; margin-right:1%'>by ".$row2['post_creator']." - ".$row2['post_date']."</font><hr /><font size='2' style='margin-left:1%; margin-right:1%'>".$row2['post_content']."</font></td>
					</tr>
					<tr>
						<td colspan='2'></td>
					</tr>";
			}
			$old_views = $row['topic_views'];
			$new_views = $old_views + 1;
			$sql3 = "UPDATE topics SET topic_views='".$new_views."' WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
			$res3 = mysqli_query($link, $sql3) or die("Query fout 3");
		}
		echo "</table>";
	} 
	else 
	{
		echo "<p style='margin-left:2.5%; font-size:small'>This topic does not exist.</p>";
	}
	?>
</div>
</div>
</body>
</html>