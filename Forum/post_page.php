<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Post</title>
<link rel="stylesheet" type="text/css" href="style.css" />
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
		if ( isset ($_SESSION['gebruiker'])) {
			echo "<a href ='?action=Afmelden'><h6 align='right'>Afmelden</h6></a>";
		}
		else {
			echo "<h6 align='right'><a href ='?action=Login'>Login</a>   <a href ='?action=register'>Register</a></h6>";
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
		elseif ($ac == "Aangemeld") 
		{
			echo "<h1>Welcome to MetalGames " .$_SESSION['gebruiker']. ".</h1>";
		}
?>
	<h1>My forum</h1>  
    <div id="wrapper">  
    <div id="menu">    
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
	if ($forum == "topic")
	{
		include ("topics.php");
	}
?>
<br />
<br />
<?php
		$link = mysqli_connect('localhost', 'root', 'root') or die ('Connection failed');
		mysqli_select_db ($link, 'dbforum') or die ('Selection failed');
		$sql = "SELECT * FROM `posts` JOIN `topics` WHERE posts.topics_id = topics.topic_id";
		$res2 = mysqli_query ($link, $sql) or die ('Query failed 2');
		while ($row2 = mysqli_fetch_array($res2))
		{
			echo "<table width='75%' style='margin-left:12.5%; margin-right:12.5%;' bgcolor='#0099FF' style='border-collapse:1px solid' bordercolor='#000000'>
				<tr style='border-bottom:none;'>
					<td width='75%' colspan='2'>".$row2['post_topic']."</td>
				</tr>
				<tr>
					<td width='20%'>".$row2['post_by']."<br>".$row2['post_date']."</td>
					<td width='55%'>".$row2['post_content']."</td>
				</tr>
			</table>";
		}
		include ("reply.php");
?>

  </div>
  </div>
  <div class="sidebar2">
<?php
$today = getdate();
if(isset($_GET['mon'])){
   if(isset($_GET['year'])){
      $start = mktime(0,0,0,$_GET['mon'],1,$_GET['year']);
   }
   else{
      $start = mktime(0,0,0,$_GET['mon'],1,$today['year']);
   }
}
else{
   $start = mktime(0,0,0,$today['mon'],1,$today['year']);
}
$first = getdate($start);
$end = mktime(0,0,0,$first['mon']+1,0,$first['year']);
$last = getdate($end);
?>
<div class="calendar">
  <div class="monheader"><?php echo $first['month'] . ' - ' . $first['year']; ?></div>
  <div class="dayheader">Sun</div>
  <div class="dayheader">Mon</div>
  <div class="dayheader">Tue</div>
  <div class="dayheader">Wed</div>
  <div class="dayheader">Thu</div>
  <div class="dayheader">Fri</div>
  <div class="dayheader">Sat</div>
<?php
for($i = 0; $i < $first['wday']; $i++){
   echo '  <div class="inactive"></div>' . "\n";
}
for($i = 1; $i <= $last['mday']; $i++){
   if($i == $today['mday'] && $first['mon'] == $today['mon'] && $first['year'] == $today['year']){
      $style = 'today';
   }
   else{
      $style = 'day';
   }
   echo '  <div class="' . $style . '">' . $i . '</div>' . "\n";
}
if($last['wday'] < 6){
   for($i = $last['wday']; $i < 6; $i++){
      echo '  <div class="inactive"></div>' . "\n";
   }
}
?>
</div>
    <p><a href="http://assassinscreed.ubi.com/ac3/nl-nl/gameinfo/info/index.aspx"><img src="AC.jpg" width="100%" style="margin-top:10px" /></a></p>
<p><a href="http://www.smosh.com"><img src="smosh.jpg" width="100%" style="margin-bottom:10px" /></a></p>
  </div>
  <div class="footer">
    <p align="center"><img src="psprofile.png" /></p>
    
</div>
</div>
</body>
</html>