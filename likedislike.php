<?php include "db_conn.php" ?>

<?php
	if (isset($_POST['liked'])) {
		$topic_id = $_POST['topic_id'];
		$result = mysqli_query($conn, "SELECT * FROM topics WHERE id=$topic_id Limit 1");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];
		$user_id = $_SESSION['login_id'];

		mysqli_query($conn, "INSERT INTO likes (user_id, topic_id) VALUES ($user_id, $topic_id)");
		mysqli_query($conn, "UPDATE topics SET likes=$n+1 WHERE id=$topic_id");

		echo $n+1;
		exit();
	}

	if (isset($_POST['unliked'])) {
		$topic_id = $_POST['topic_id'];
		$result = mysqli_query($conn, "SELECT * FROM topics WHERE id=$topic_id Limit 1");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];
		$user_id = $_SESSION['login_id'];

		mysqli_query($conn, "DELETE FROM likes WHERE topic_id=$topic_id AND user_id=$user_id");
		mysqli_query($conn, "UPDATE topics SET likes=$n-1 WHERE id=$topic_id");
		
		echo $n-1;
		exit();
	}
?>