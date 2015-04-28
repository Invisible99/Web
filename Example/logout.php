<?php
if(isset($_SESSION['gebruiker']))
	{
	session_destroy() or die("Afmelden mislukt");
	echo "Je bent afgemeld.";
	header("location:index.php");
	}
;
?>