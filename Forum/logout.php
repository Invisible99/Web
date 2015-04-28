<?php
if(isset($_SESSION['gebruiker']))
	{
	session_destroy() or die("Afmelden mislukt");
	header("location:forum.php");
	}
;
?>