<?php
	$hostname = "localhost";
	$username = "root";
	$password = "dreft321";
	$dbname = "dbcalendar";
	
	mysql_connect ($hostname, $username, $password) or die ("error");
	mysql_select_db ($dbname) or die ("db error");
	
?>
<html>
    <head>
    	<script>
		
			function goLastMonth(month, year) 
			{
				if (month == 1)
				{
					--year;
					month = 13;
				}
				--month
				var monthstring = ""+month+"";
				var monthlength = monthstring.length;
				if (monthlength <= 1)
				{
					monthstring = "0"+monthstring;
				}
				document.location.href = "<?php $_SERVER['PHP_SELF']; ?>?month="+monthstring+"&year="+year;
			}
			function goNextMonth(month, year)
			{
				if (month == 12)
				{
					++year;
					month = 0;
				}
				++month
				var monthstring = ""+month+"";
				var monthlength = monthstring.length;
				if (monthlength <= 1)
				{
					monthstring = "0"+monthstring;
				}
				document.location.href = "<?php $_SERVER['PHP_SELF']; ?>?month="+monthstring+"&year="+year;
			}
		</script>
        <style>
			.calendar 
			{
			   width: 100%;
			   text-decoration:none;
			   background-color:#f00;
			   color:#000;
			}
			.calendar div 
			{
			   float: left;
			   border: none;
			   text-decoration:none;
			   background-color:#ff0000;
			}
			.calendar .monheader 
			{
			   font-weight: bold;
			   color: #ff00000;
			   text-align: center;
			   background-color: #ff0000;
			}
			
			.calendar .day
			{
			   background-color: #f00;
			   color:#ff0000;
			   text-decoration:none;
			}
			.today 
			{
				background-color: #ff7d00;
			}
			.event
			{
				background-color:#af0000;
			}
			.calendar .dayheader 
			{
			   font-weight: bold;
			   color: #ff00000;
			   text-align: center;
			   background-color: #f00;
			   width:100%;
			}
			.calendar .inactive 
			{
			   background-color: #666666;
			   color:#F00;
			}
			a:link {
				color:#000000;
				text-decoration: none;
			}
			a:visited {
				color: #000000;
				text-decoration: none;
			}
			a:hover, a:active, a:focus {
				text-decoration: none;
				color:#f00;
				background-color:#000;
			}
		</style>
    </head>
    <body>
    	<?php
			if (isset ($_GET['day']))
			{
				$day = $_GET['day'];
			}
			else
			{
				$day = date("j");
			}
			if (isset ($_GET['month']))
			{
				$month = $_GET['month'];
			}
			else
			{
				$month = date("n");
			}
			if (isset ($_GET['year']))
			{
				$year = $_GET['year'];
			}
			else
			{
				$year = date("Y");
			}
	
			$currentTimeStamp = strtotime("$year-$month-$day");
			$monthName = date("F", $currentTimeStamp);
			$numDays = date("t", $currentTimeStamp);
			$counter = 0;			
		?>
        <?php
			if (isset($_GET['add']))
			{
				$title = $_POST['txttitle'];
				$detail = $_POST['txtdetail'];
				$eventdate = $month."/".$day."/".$year;
				$sqlins = "INSERT INTO eventcalendar(Title, Detail, eventDate, dateAdded) VALUES ('".$title."', '".$detail."', '".$eventdate."', NOW())";
				$resultins = mysql_query($sqlins);
				if ($resultins)
				{
					echo "Event added.";
				}
				else
				{
					"Failed to add a new event.";
				}
			}
		?>
        <div class="calendar">
    	<table style="font-size:x-small;" width="100%">
        	<tr>
            	<td><input style="width:100%" type="button" value="<" name="previousbutton" onclick = "goLastMonth(<?php echo $month.", ".$year; ?>);"></td>
                <td colspan='5' valign="middle" align="center"><h3><?php echo $monthName.", ".$year; ?></h3></td>
                <td><input style="width:100%" type="button" value=">" name="nextbutton" onclick = "goNextMonth(<?php echo $month.", ".$year; ?>);"></td>
            </tr>
            <tr>
            	<td width="2.5%"><div class="dayheader">Sun</div></td>
                <td width="2.5%"><div class="dayheader">Mon</div></td>
                <td width="2.5%"><div class="dayheader">Tue</div></td>
                <td width="2.5%"><div class="dayheader">Wed</div></td>
                <td width="2.5%"><div class="dayheader">Thu</div></td>
                <td width="2.5%"><div class="dayheader">Fri</div></td>
                <td width="2.5%"><div class="dayheader">Sat</div></td>
            </tr>
            <?php
				echo "<tr>";
				
				for ($i = 1; $i < $numDays+1; $i++, $counter++)
				{
					$timeStamp = strtotime("$year-$month-$i");
					if ($i == 1)
					{
						$firstDay = date("w", $timeStamp);
						for ($j = 0; $j < $firstDay; $j++, $counter++)
						{
							echo "<td></td>";
						}
					}
					if ($counter % 7 == 0)
					{
						echo "</tr><tr>";
					}
					$monthstring = $month;
					$monthlength = strlen($monthstring);
					$daystring = $i;
					$daylength = strlen($daystring);
					if($monthlength <= 1)
					{
						$monthstring = "0".$monthstring;
					}
					if ($daylength <= 1)
					{
						$daystring = "0".$daystring;
					}
					$todaysDate = date("m/d/Y");
					$dateToCompare = $monthstring.'/'.$daystring.'/'.$year;
					echo "<td align='center'";
					if ($todaysDate == $dateToCompare)
					{
						echo " class='today'";
					}
					else
					{
						$sqlcount = "SELECT * FROM eventcalendar WHERE eventDate = '".$dateToCompare."'";
						$noOfEvent = mysql_num_rows (mysql_query($sqlcount));
						if ($noOfEvent >= 1)
						{
							echo "class='event'";
						}
						echo " class='day'";
					}
					echo "><a href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true'>".$i."</a></td>";
				}
				echo "</tr>";
			?>
        </table>
        <?php
			if(isset($_GET['v']))
			{
				if (isset($_SESSION['gebruiker']))
				{
					$user = $_SESSION['gebruiker'];
					if ($user == 'WeFknRise')
					{
						echo "<br><h6><a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year."&v=true&f=true'>Add Event</a></h6>";
					}
					else
					{
						echo '<br><h6>Sorry, you do not have sufficient rights to add an event.</h6>';
					}
					if (isset($_GET['f']))
					{
						include ("eventform.php");
					}
					$sqlEvent = "SELECT * FROM eventcalendar WHERE eventDate='".$month."/".$day."/".$year."'";
					$resultEvents = mysql_query($sqlEvent);
					echo "<hr>";
					$a = mysql_num_rows($resultEvents);
					while ($events = mysql_fetch_array($resultEvents))
					{
						echo "<br><p style='font-size:x-small'>Title: ".$events['Title']."</p>";
						echo "<br><p style='font-size:x-small'>Detail: ".$events['Detail']."</p>";
					}
					if ($a == 0)
					{
						echo "<br><p style='font-size:x-small'>Nothing to do this day. As sign of my appreciation that you visit my site here's zoidberg.</p><p style='font-size:medium'>(\/) (;,,,,;) (\/)</p>";	
					}
					echo "<hr>";
				}
				else
				{
					echo "<br><h6>Log in to view what's coming this day.</h6>";
				}
			}
		?>
        </div>
    </body>
</html>