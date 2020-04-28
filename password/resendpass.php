<?php
    ob_start();
    ini_set('display_errors','1');
	include "../lib/Session.php";
	Session::init();
	Session::checkLoginresetpass();
?>
<?php
include "../lib/Database.php";
?>
<?php
	$db = new Database();
?>

<?php 
	if(isset($_REQUEST['email'])){
		$email = $_REQUEST['email'];
		$userinfo ="SELECT * FROM tbl_user WHERE userEmail='$email'";
		$result = $db->select($userinfo);
		if($result){
    	    while($resu = mysqli_fetch_assoc($result)){
    			$name = $resu['username'] ;
    		}
		}else{
		    $name =" ";
		}
		$randomNumber = rand(100000,999999); 
		$userup ="UPDATE tbl_user SET randnum = '$randomNumber' WHERE userEmail='$email' ";
		$run = $db->update($userup);
		if($run==true){
			$to = "$email";
			$subject = "Reset Password";
			$message = "Hi, $name"."\r\n\t"."We received a request to reset Your Libary Managment account password."."\r\n"."Enter the folloing password reset code: ".$randomNumber;
			$headers = "From: Programmer Towheed <contact@programmertowheed.com>" . "\r\n" ."Reply-To: contact@programmertowheed.com" . "\r\n" ."X-Mailer: PHP/" . phpversion();
			$mail=mail($to, $subject, $message, $headers);
			echo "<span style='color:green;font-size:18px'>Code Resend!!</span>";
		}else{
			echo "<span style='color:red;font-size:18px'>Something Wrong!!</span>";
		}
	}else{
		header("Location:../404.php");
	}

?>
