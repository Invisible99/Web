<form method="post" action="">
    <table width="75%" style="margin-left:12.5%; margin-right:12.5%">
        <tr>
            <td width="20%" align="center"><h4>Reply: </h4><br /><input type="submit" name="submit" value="Add topic" /></td>
            <td width="55%"><textarea name="reply" cols="25" rows="5"></textarea></td>
        </tr>
    </table>  
</form>
<?php
	if(isset($_POST['submit']))
	{
		if (!empty($_POST['reply']))
		{
			$connect = mysql_connect('localhost', 'root', 'dreft321') or die ('Connection failed');
			mysql_select_db ('dbforum', $link) or die ('Selection failed');
			$reply = $_POST['reply'];
			$sql2 = "INSERT INTO 'posts'('post_content', 'post_date', 'post_by') VALUES ($reply, NOW(),'".$_SESSION['gebruiker']."') WHERE ";
			mysql_query($sql2, $connect) or die ("Query failed");
		}
		else
		{
			echo "Fill in all fields.";
		}
	}
?>