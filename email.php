<?php require_once"db_conn.php" ?>

<?php 
	$sql = "SELECT t.`title`, t.`content`, t.`date_created`, u.`name`, c.`name`From users u inner join topics t on t.`user_id` = u.`id` inner join categories c on t.category_ids = c.id order by unix_timestamp(t.`date_created`) desc limit 1"; 
	if($stmt = mysqli_prepare($conn,$sql)){
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		
		if(mysqli_stmt_num_rows($stmt) == 1){
			mysqli_stmt_bind_result($stmt,$e1,$e2,$e3,$e4,$e5);
			mysqli_stmt_fetch($stmt);

			$title = $e1;
			$content = $e2;
			$datecreated = $e3;
			$uname = $e4;
			$catname = $e5;
		}
	}
?> 

<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	
	require 'vendor/autoload.php';
	
	$mail = new PHPMailer();
			
	try{

		$mail->Host= "smtp.gmail.com";
		$mail->Port=587;
		$mail->SMTPSecure='tls';
		$mail->IsSMTP();
		$mail->SMTPAuth=true;
		
		//Your email
		$sender_email="tkyao5723@gmail.com";
		$mail->Username=$sender_email;
		$mail->Password= "atyokmraojkirphv";
		
		//Recipient's email
		
		$email = "qamanager123@outlook.com";
		$to = $email;
		$name= $email;
		$mail->From=$sender_email;
		$mail->FromName='System Notification';
		$mail->AddAddress($to,$name);
		$mail->AddReplyTo($sender_email,"System Notification");
		
		$content= '<p><b>"Reminder"</b>&nbsp A new idea has been posted</p><br>'.
					"<p><b>Title : ".$title."</b></p>".
					"<p><b>Content : ".$content."</b></p><br>".
					"<p>Author Name : ".$uname."</p>".
					"<p>Categories : ".$catname."</p>".
					"<p>Date : ".$datecreated;

		
		//$content = $comment;
		
		$mail->IsHTML(true);
		$mail->WordWrap=50;
		$mail->Subject='New idea "'.$title.'"';
		$mail->Body=$content;
		
		if($mail->Send()){
			//echo"<script>alert('Notification has been sent')</script>";
			header ("Location: http://localhost/cw_ewsd5/index.php?page=topics");
		}
		else{
			echo "Not been sent";
		}
	}

	catch(Exception $ex){
		echo "<p>Email could not be sent.<br>";
		echo "Mailer Error: ".$mail->ErrorInfo."</p>";
	}
?>
