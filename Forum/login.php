<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<table>
<form method="post" action="">
<tr>
  <td style="font-size:small">Username:</td>
  <td style="font-size:small">Password:</td>  
</tr>
<tr>
  <td><input style="clear:none" name="user"></td>
<td><input style="clear:none" type="password" name="password"></td>
<td colspan="2" align="center"><input name="cmdlogin" type="submit" id="cmdVerstuur" value="Login"></td>
</tr>
</form>  
</table>
<?php

if (isset ($_POST['cmdlogin'])) 
  {
    $user  = $_POST['user'];
    $password  = $_POST['password'];
    
    $link=mysqli_connect('localhost','root','root') OR die("connectie met server mislukt");
    mysqli_select_db($link, 'dbforum') OR die("connectie met databank mislukt");
    $query = "SELECT * FROM users WHERE user = '$user' AND password = '".md5($password)."'";
    $resultaat = mysqli_query ($link, $query) OR die("query mislukt");
    
      if (mysqli_num_rows($resultaat) == 1) {
        $_SESSION['gebruiker']= $user;
        }
        else
        {
        echo "ongeldige login";
        }
    }
if(isset($_SESSION['gebruiker']))
  
  header("location:forum.php?action=Aangemeld");
    
?>

</body>
</html>
