<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post" action="">
<table>
    <tr>
      	<td>Username:</td>
      	<td><input style="clear:none" value="<?php if (isset($_POST['user'])) { echo $_POST['user']; } ?>" name="user"></td>
    </tr>
    <tr>
      	<td>Password:</td>
      	<td><input style="clear:none" type="password" name="password"></td>
    </tr>  
      	<td>E-mail adres:</td>
      	<td><input style="clear:none" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; } ?>" type="text" name="email"></td>
    </tr>
    <tr>
   		<td><input name="cmdregister" type="submit" id="cmdVerstuur" value="Register"></td>
    </tr>  
</table>
</form>
<?php

if (isset ($_POST['cmdregister'])) 
  {
    if (!empty($_POST['user']) && !empty($_POST['password']) && !empty($_POST['email']))
    {
      $link2 = mysql_connect ("localhost", "root", "dreft321") or die ("Fout 1");
      mysql_select_db ('dbforum', $link2) or die ("Fout 2");
      $user = $_POST['user'];
      $password = $_POST['password'];
      $email = $_POST['email'];
	  if (filter_var($email, FILTER_VALIDATE_EMAIL))
	  {
      $ins = "INSERT INTO users (user, password, email_adres) VALUES ('$user', '".md5($password)."', '$email')";
      $res = mysql_query ($ins,$link2) or die ("Fout 3");  
      if ($res == 1)
      {
        echo "<script>window.close();</script>";
      }
	  }
	  else
	  {
		  echo "Wrong email";  
	  }
    }
    else
    {
    echo "Gelieve alle velden in te vullen.";
    }
  }    
?>
</body>
</html>