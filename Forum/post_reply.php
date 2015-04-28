<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reply</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="container">
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
		if ($ac == "Afmelden") 
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
		
		if ((!isset($_SESSION['gebruiker'])) || ($_GET['cid'] == "")) 
		{
			header("Location: forum.php");
			exit();
		}
		$cid = $_GET['cid'];
		$tid = $_GET['tid'];
		?>
        <table width="50%" style="margin-left:25%; margin-right:25%">
        <form action="post_reply_parse.php" method="post">
        <tr>
        <td>Reply Content</td>
        </tr>
        <tr>
        <td><textarea name="reply_content" rows="5" cols="50"></textarea></td>
        </tr>
        <tr>
        <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
        <input type="hidden" name="tid" value="<?php echo $tid; ?>" />
        <td><input type="submit" name="reply_submit" value="Post Your Reply" /></td>
        </tr>
        </form>
        </table>
        
    </div>
</div>
</body>
</html>