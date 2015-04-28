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
	$link = mysqli_connect('localhost', 'root', 'root') or die ('Connection failed');
	mysqli_select_db ($link, 'dbforum') or die ('Selection failed');
	$sel = "SELECT * FROM posts JOIN topics WHERE topics.topic_id = posts.topic_id";
	$res = mysqli_query ($link, $sel) or die ('Query failed 2');
	while ($row = mysqli_fetch_array($res))
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
		mysqli_query ($link, $ins) or die ("Query failed");
	}
	else
	{
		echo "Fill in all fields";
	}
}
?>
    </div> 
</div>
</div>
</body>
</html>