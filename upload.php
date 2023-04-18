<?php require_once"db_conn.php" ?>

<?php
	if(isset($_POST['save'])){

		$name=$_FILES['fileupload']['name'];
		$size=$_FILES['fileupload']['size'];
		$temp=$_FILES['fileupload']['tmp_name'];

		$ext = strtolower(pathinfo($name,PATHINFO_EXTENSION));
		
		if($ext != 'jpg' && $ext != 'pdf' && $ext != 'png' && $ext != 'docx'){
			echo"Format must be in .jpg, .png, .pdf or .docx";
			exit();
		} 
        
        if($size > 1000000){
			echo "The file size must not exceed 1Mb";
			exit();
        }
        
        $target = "images/$name";

        if (move_uploaded_file($temp, $target)){
            $sql = "INSERT Into `upload` (`fname`) values (?)";
            if($stmt = mysqli_prepare($conn,$sql)){
                mysqli_stmt_bind_param($stmt,"s",$target);
                mysqli_stmt_execute($stmt);
     
                if(mysqli_stmt_affected_rows($stmt) == 1){
                    echo"<script>alert('Upload successfully.');</script>";
                }
     
                else{
                    echo"<script>alert('Fail to upload.');</script>";
                }
                mysqli_stmt_close($stmt);
            }
        }
		
		else{
			echo "Fail to upload";
		}
    }
?>