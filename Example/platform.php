<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Platform</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link href="tabs.css" rel="stylesheet" type="text/css" />
<script src="tabs.js" type="text/javascript"></script>
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
		else 
		{	
	?>
<div id="menu"> 
	  <a href="?id=1" style="text-decoration:none;">PS</a> -
	  <a href="?id=2" style="text-decoration:none;">PS2</a> -
      <a href="?id=3" style="text-decoration:none;">PS3</a> -
      <a href="?id=4" style="text-decoration:none;">XBOX</a> -
      <a href="?id=5" style="text-decoration:none;">X360</a>
      <br />
      <br />
      <a href="?id=6" style="text-decoration:none;">GB</a> -
      <a href="?id=7" style="text-decoration:none;">GBC</a> -
      <a href="?id=8" style="text-decoration:none;">GBA</a> -
      <a href="?id=9" style="text-decoration:none;">NDS</a> -
      <a href="?id=10" style="text-decoration:none;">PSP</a> -
      <a href="?id=11" style="text-decoration:none;">PSV</a>
</div>
<br />
<br />
<br />
<?php		
		}
		if (!isset($_GET['page']))
		{
			$_GET['teller1'] = 1;
			$_GET['teller2'] = 100;
			$teller1 = $_GET['teller1'];
			$teller2 = $_GET['teller2'];
		}
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];
			$connect = mysql_connect ('localhost', 'root', 'dreft321');
			mysql_select_db ('dbgames', $connect);
			$teller1 = $_GET['teller1'];
			$teller2 = $_GET['teller2'];
			?>
            <div id="TabbedPanels1" class="TabbedPanels">
              <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0">Games</li>
                <li class="TabbedPanelsTab" tabindex="0">Platform Info</li>
              </ul>
              <div class="TabbedPanelsContentGroup">
                <div class="TabbedPanelsContent">
            <?php
			if (isset($_GET['page']))
			{
				$page = $_GET['page'];
				if ($page == 'prev')
				{
					$teller1 -= 100;
					$teller2 -= 100;
				}
				else
				{
					$teller1 += 100;
					$teller2 += 100;
				}
			}
			echo "<br />
			<div id='menu'>
					<a href='platform.php?id=".$id."&page=prev&teller1=".$teller1."&teller2=".$teller2."' style='text-decoration:none; float:left; margin-left:12.5%; color:#000'>PREV</a>
					<a href='platform.php?id=".$id."&page=next&teller1=".$teller1."&teller2=".$teller2."' style='text-decoration:none; float:right; margin-right:12.5%; color:#000'>NEXT</a>
			</div>
			<br />
			<br />";			
			$sql = "SELECT * FROM tblgames WHERE Platform_ID = '$id' LIMIT $teller1, $teller2";
			$result = mysql_query ($sql, $connect) or die ("Query failed");
	?>
    		<table style='background-color: #000000; color: #ff0000; margin-left:12.5%; margin-right:12.5%;' width="75%">
            	<tr>
                	<td width="10%" style="font-size:10px">Release Date</td>
                    <td width="50%" style="font-size:10px">Title</td>
                    <td width="15%" style="font-size:10px">Genre</td>
              </tr>
    </table>    
    <?php
			while ($row = mysql_fetch_array ($result))
			{
	?>
    	<table style='background-color: #ff0000; color: #000; margin-left:12.5%; margin-right:12.5%;' width="75%">
			<tr>
                <td width="10%" style="font-size:10px"><?php echo $row['Release Date']; ?></td>
                <td width="50%" style="font-size:10px"><?php echo $row['Title']; ?></td>
                <td width="15%" style="font-size:10px"><?php echo $row['Genre']; ?></td>
            </tr>    
        </table>
    <?php
			}	
	?>
        </div>
            <div class="TabbedPanelsContent">
			<?php  
			$sql = "SELECT * FROM tblplatform WHERE Platform_ID = '$id'";
			$result = mysql_query ($sql, $connect) or die ("Query failed");
			while ($row = mysql_fetch_array ($result))
			{
				echo "<table style='background-color: #ff0000; color: #000; margin-left:12.5%; margin-right:12.5%;' width='75%'>
						<tr>
							<td width='20%' height='150px'><img src='".$row['Platform_img']."' style='width:100%; height:150px'/><td>
							<td rowspan='2' style='font-size:10px'>".$row['Platform_desc']."<td>
						</tr>
						<tr>	
							<td width='15%' valign='top' align='center'>".$row['Platform_dev']."<td>
						</tr>
					</table>";		
			}
			?>
            </div>
          </div>
        </div>
    <?php    	
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
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
</body>
</html>