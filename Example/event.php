<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
        <?php
			if(isset($_GET['v']))
			{
				if (isset($_SESSION['gebruiker']))
				{
					$user = $_SESSION['gebruiker'];
					if ($user == 'WeFknRise')
					{
					echo "<h6><a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year."&v=true&f=true'>Add Event</a></h6>";
					}
					else
					{
						echo '<h6>Sorry, you do not have sufficient rights to add an event.</h6>';
					}
					if (isset($_GET['f']))
					{
						include ("eventform.php");
					}
					$sqlEvent = "SELECT * FROM eventcalendar WHERE eventDate='".$month."/".$day."/".$year."'";
					$resultEvents = mysql_query($sqlEvent);
					echo "<hr>";
					while ($events = mysql_fetch_array($resultEvents))
					{
						echo "<p style='font-size:x-small'>Title: ".$events['Title']."</p>";
						echo "<p style='font-size:x-small'>Detail: ".$events['Detail']."</p>";
					}
					echo "<hr>";
				}
				else
				{
					echo "<h6>Log in to view what's coming this day.</h6>";
				}
			}
		?>
</body>
</html>