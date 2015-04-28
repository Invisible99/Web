<?php
session_start();
if ($_SESSION['gebruiker']) {
	if (isset($_POST['reply_submit'])) {
		$link=mysqli_connect('localhost','root','root') OR die("connectie met server mislukt");
		mysqli_select_db($link, 'dbforum') OR die("connectie met databank mislukt");
		$creator = $_SESSION['gebruiker'];
		$cid = $_POST['cid'];
		$tid = $_POST['tid'];
		$reply_content = $_POST['reply_content'];
		$sql = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$tid."', '".$creator."', '".$reply_content."', now())";
		$res = mysqli_query($link, $sql) or die("Query fout");
		$sql2 = "UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
		$res2 = mysqli_query($link, $sql2) or die("Query fout 2");
		$sql3 = "UPDATE topics SET topic_reply_date=now(), topic_last_user='".$creator."' WHERE id='".$tid."' LIMIT 1";
		$res3 = mysqli_query($link, $sql3) or die("Query fout 3");
		
		if (($res) && ($res2) && ($res3)) {
			echo "<p>Your reply has been successfully posted. <a href='view_topic.php?cid=".$cid."&tid=".$tid."'>Click here to return to the topic.</a></p>";
		} else {
			echo "<p>There was a problem posting your reply. Try again later.</p>";
		}
		
	} else {
		exit();
	}
} else {
	exit();
}
?>