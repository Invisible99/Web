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
  <div class="header">
  <a href="index.php">
	<img src="logo.jpg" name="logo" width="20%" height="167" id="Insert_logo" style="float:left" />
    <img src="banner.jpg" name="banner" width="80%" height="167" id="Insert_banner" style="float:right" />
  </a>
  </div>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="platform.php">Platforms</a></li>
      <li><a href="genre.php">Genres</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="forum.php">Forum</a></li>
    </ul>
   <p><a href="http://www.godofwar.com"><img src="GoW.jpg" width="100%" style="margin-top:10px"/></a></p>
   <p><a href="http://www.rockstargames.com/grandtheftauto"><img src="GTA.jpg" width="100%" /></a></p>
   <p><a href="http://www.callofduty.com"><img src="CoD.jpg" width="100%" /></a></p>
  </div>
  <div class="content">
   <?php		
	if (isset($_SESSION['gebruiker'])) 
		{
			$admin = $_SESSION['gebruiker'];
			if ($admin == 'WeFknRise')
				{
					echo "<h6 align='right'><a href='javascript:void(0);' onClick=window.open('add.php','','width=300,height=200')>Add Game</a>   <a href ='?action=Afmelden'>Afmelden</h6></a>";
				}
			else
				{
					echo "<a href ='?action=Afmelden'><h6 align='right'>Afmelden</h6></a>";
				}
		}
		else 
		{
			echo "<table width='100%'>";
			echo "<tr><td width='50%' style='float: left;'>";
			include ("login.php");
			echo "</td><td width='50%'>";
			echo "<h6 align='right'><a href ='javascript:void(0);' onClick=window.open('register.php','','width=300,height=200')>Register</a></h6>";
			echo "</td></tr></table>";
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
		elseif ($ac == "Add")
		{
			include ("add.php");
		}
		elseif ($ac == "Aangemeld") 
		{
			echo "<h1>Welcome to MetalGames " .$_SESSION['gebruiker']. ".</h1>";
		}	
		
	$link=mysql_connect('localhost','root','dreft321') OR die("connectie met server mislukt");
    mysql_select_db('dbforum',$link) OR die("connectie met databank mislukt");
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
	$res = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($res) == 1) 
	{
		$sql2 = "SELECT * FROM topics WHERE category_id='".$cid."' ORDER BY topic_date ASC";
		$res2 = mysql_query($sql2) or die(mysql_error());
		$topics = "";
		if (mysql_num_rows($res2) > 0) 
		{
			$topics .= "<table width='90%' style='border-collapse: collapse; margin-left:5%; margin-right:5%;'>";
			$topics .= "<tr><td colspan='3'><p style='font-size:small'><a href='forum.php'>Return To Forum Index</a>".$logged."</p></td></tr>";
			$topics .= "<tr style='background-color: #000; color: #F00;'><td>Topic Title</td><td width='65' align='center'>Views</td></tr>";
			$topics .= "<tr><td colspan='3'></td><tr>";
			while ($row = mysql_fetch_assoc($res2)) 
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
  <div class="sidebar2">
  <form action="search.php">
  	<table align="center">
  		<tr>
 			<td><input type="text" name="query" /></td>
            <td><input class="search" type="image" src="search.jpg" name="search" width="20" height="20" /></td>
    	</tr>
 	</table>
  </form>
<?php
	include ("calendar.php");
?>
<p><a href="http://www.epicmealtime.com/"><img src="epicmealtime.jpg" width="100%" style="margin-top:10px" /></a></p>
<p><a href="http://www.smosh.com"><img src="smosh.jpg" width="100%" style="margin-bottom:10px" /></a></p>
  </div>
  <div class="footer">
    <p align="center"><img src="psprofile.png" /></p>
    
</div>
</div>
</body>
</html>