<?php require_once"db_conn.php" ?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<link href='css/style.css' rel='stylesheet' type='text/css'/>
<script src="js/jquery.min.js"></script>
</head>
<body>
<div class="container-fluid">
	<form method="POST" action="" id="manage-topic" enctype="multi">
        <div class="container">
        <h1 align="center">Terms and Condition!</h1><hr>
            <div class="license">
                Introduction
                These Website Standard Terms and Conditions written on this webpage shall manage your use of this website. These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions.
        
                <br><br>Minors or people below 18 years old are not allowed to use this Website.
            </div>
            <table>
                <tr>
                    <td><input type="radio" name="terms" value="agree" id="agree"></td>
                    <td>I Agree With The Terms And Condition.</td>
                </tr>
                <tr>
                    <td><input type="radio" name="terms" value="not_agree" id="not_agree" checked></td>
                    <td>I Do Not Agree With The Terms And Condition.</td>
                </tr>
                <tr>
                <td><br/></td>
                </tr>
                <tr>
                    <td><input type="button" name="submittnc" value="Submit" id="submittnc" onclick="emailf()"></td>
                    <script>
                        function emailf(){
                            window.location.href="http://localhost/cw_ewsd5/email.php";
                        }
                    </script>
                    <td><input type="button" name="cancel" value="Cancel" onclick="back()"></td>
                    <script>
                        function back(){
                            alert('Please agree Terms and Conditions !!');
                        }
                    </script>
                </tr>
            </table>
        </div>
    </form>
</div>
</body>
</html>

<script type="text/javascript">
	$(function(){
		var btnSubmit = $('#submittnc');
		btnSubmit.attr('disabled', 'disabled');
		$('input[name=terms]').change(function(e){
			if($(this).val() == 'agree'){
				btnSubmit.removeAttr('disabled');
			}else{
				btnSubmit.attr('disabled', 'disabled');
			}
		});	
	});


</script>