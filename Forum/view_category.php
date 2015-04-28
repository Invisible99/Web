<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category</title>
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
    mysqli_select_db($link, 'dbforum') OR die("connectie met databank mislukt");
	$cid = $_GET['cid'];
	if (isset($_SESSION['gebruiker'])) 
	{
		$logged = " | <a href='create_topic.php?cid=".$cid."'>Click Here To Create A Topic</a>";
	} 
	else 
	{
		$logged = " | Please log in to create topics in this forum.";
	}
	$sql = "SELECT id FROM categories WHERE id='".$cid."' LIMIT 1";
	$res = mysqli_query($link, $sql) or die(mysqli_error());
	if (mysqli_num_rows($res) == 1) 
	{
		$sql2 = "SELECT * FROM topics WHERE category_id='".$cid."' ORDER BY topic_date ASC";
		$res2 = mysqli_query($link, $sql2) or die(mysqli_error());
		$topics = "";
		if (mysqli_num_rows($res2) > 0) 
		{
			$topics .= "<table width='90%' style='border-collapse: collapse; margin-left:5%; margin-right:5%;'>";
			$topics .= "<tr><td colspan='3'><p style='font-size:small'><a href='forum.php'>Return To Forum Index</a>".$logged."</p></td></tr>";
			$topics .= "<tr style='background-color: #000; color: #F00;'><td>Topic Title</td><td width='65' align='center'>Views</td></tr>";
			$topics .= "<tr><td colspan='3'></td><tr>";
			while ($row = mysqli_fetch_assoc($res2)) 
			{
				$tid = $row['id'];
				$title = $row['topic_title'];
				$views = $row['topic_views'];
				$date = $row['topic_date'];
				$creator = $row['topic_creator'];
				$topics .= "<tr><td><p style='font-size:small'><a href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br /><span class='post_info'>Posted by: ".$creator." on ".$date."</span></td><td align='center'>".$views."</p></td></tr>";
				$topics .= "<tr><td colspan='3'><hr /></td></tr>";
			}
			$topics .= "</table>";
			echo $topics;
		} 
		else 
		{
				echo "<p style='margin-left:2.5%; font-size:small'><a href='forum.php'>Return to Forum Index.</a></p><hr />";
				echo "<p style='margin-left:2.5%; font-size:small'>There are no topics in this category yet.".$logged."</p>";
		}
	}
	else
	{
		echo "<p style='margin-left:2.5%; font-size:small'><a href='forum.php'>Return to Forum Index.</a></p><hr />";
		echo "<p style='margin-left:2.5%; font-size:small'>You are trying to view a categorie that does not exist yet.</p>";
	}
	?>
    
</div>
</div>
</body>
</html>