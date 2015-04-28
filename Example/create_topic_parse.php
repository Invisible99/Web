<?php
session_start();
if ($_SESSION['gebruiker'] == "") {
	header("Location: forum.php");
	exit();
}
if (isset($_POST['topic_submit'])) {
	if (($_POST['topic_title'] == "") && ($_POST['topic_content'] == "")) {
		echo "You did not fill in both fields. Please return to the previous page.";
		exit();
	} else {
		$link=mysql_connect('localhost','root','dreft321') OR die("connectie met server mislukt");
   		mysql_select_db('dbforum',$link) OR die("connectie met databank mislukt");
		$cid = $_POST['cid'];
		$title = $_POST['topic_title'];
		$content = $_POST['topic_content'];
		$creator = $_SESSION['gebruiker'];
		$sql = "INSERT INTO topics (category_id, topic_title, topic_creator, topic_date) VALUES ('".$cid."', '".$title."', '".$creator."', now())";
		$res = mysql_query($sql) or die(mysql_error());
		$new_topic_id = mysql_insert_id();
		$sql2 = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$new_topic_id."', '".$creator."', '".$content."', now())";
		$res2 = mysql_query($sql2) or die(mysql_error());
		$sql3 = "UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
		$res3 = mysql_query($sql3) or die(mysql_error());
		if (($res) && ($res2) && ($res3)) {
			header("Location: view_topic.php?cid=".$cid."&tid=".$new_topic_id);
		} else {
			echo "There was a problem creating your topic. Please try again.";
		}
	}
}
?>