<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Post</title>
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
	?>
    <h1>My forum</h1>  
    <div id="wrapper">  
    <div id="menu">
    &nbsp;&nbsp;&nbsp;&nbsp; 
        <a class="item" href="forum.php?forum=create_topic">Create a topic</a> -  
        <a class="item" href="forum.php?forum=topic">Topics</a>
    </div>
    <?php
	if (isset($_GET['forum']))
	{
		$forum = $_GET['forum'];
	}
	else
	{
		$forum = " ";
	}
	if ($forum == "create_topic")
	{
		include ("create_topic.php");
	}
	elseif ($forum == "topic")
	{
		include ("topics.php");
	}
	$link = mysql_connect('localhost', 'root', 'dreft321') or die ('Connection failed');
	mysql_select_db ('dbforum', $link) or die ('Selection failed');
	$sel = "SELECT * FROM posts JOIN topics WHERE topics.topic_id = posts.topic_id";
	$res = mysql_query ($sel, $link) or die ('Query failed 2');
	while ($row = mysql_fetch_array($res))
	{
		echo "<table width='75%' style='margin-left:12.5%; margin-right:12.5%;' bgcolor='#0099FF' style='border-collapse:thin solid' bordercolor='#000000'>
				<tr>
					<td width='75%' rowspan='2'><h5>Subject:".$row['topic_name']."</h5></td>
				</tr>
				<tr>
					<td width='55%' style='font-size:xx-small'>".$row['post']."</td>
					<td widht='20%'><h6>Posted by:<br> ".$row['post_by']."</h6><br><h6>Post date:<br> ".$row['post_date']."</h6>
				</tr>
			</table>";		
	}
?>
<form method="post" action="">
    <table width="75%" style="margin-left:12.5%; margin-right:12.5%">
        <tr>
            <td width="20%" align="center"><h4>Reply: </h4><br /><input type="submit" name="submit" value="Add topic" /></td>
            <td width="55%"><textarea name="reply" cols="25" rows="5"></textarea></td>
        </tr>
    </table>  
</form>	
<?php	
if (isset($_POST['submit']))
{
	if (!empty($_POST['reply']))
	{
		$reply = $_POST['reply'];
		$ins = "INSERT INTO 'posts'('post', 'post_by', 'post_date') VALUES ('$reply','".$_SESSION['gebruiker']."',NOW())";
		mysql_query ($ins, $link) or die ("Query failed");
	}
	else
	{
		echo "Fill in all fields";
	}
}
?>
    </div> 
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