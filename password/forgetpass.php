<?php
    ob_start();
    ini_set('display_errors','1');
	include "../lib/Session.php";
	Session::init();
	Session::checkLoginresetpass();
?>
<?php
    include "../lib/Database.php";
    include "../helpers/Format.php";
?>
<?php
	$db = new Database();
	$fm = new Format();
?>
<?php
	 if(isset($_SERVER['SCRIPT_NAME'])){
		$title = $_SERVER['SCRIPT_NAME'];
		$title = basename($title,".php");
		switch ($title) {
		case "forgetpass":
				echo "<title>Password Reset | Libary managment system</title>";
				break;
			
			default:
				echo "<title>Libary managment system</title>";
		}
	 }else{
		 
	 }
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Programmer Towheed, Full Stack Web Developer & Social Entrepreneur">
    <meta name="keywords" content="Entrepreneur,Web Developer, Programmer, Programmer Towheed, Bangladesh, Online Earning, Earn Money online, Bangla Video Tutorial">
    <meta name="author" content="Programmer Towheed">
	
	<!-- Favicon -->
    <link href="../assets/img/favicon.png" rel="icon" type="image/png">
	
	<!-- bootstrap stylesheet-->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"/>
	
	<!-- fontawesome stylesheet-->
	<link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- coustom style-->
	<style type="text/css">
		body {
		    font-family: arial;
		    position: relative;
		    background: #58757C;
		}
		
		label {
		    margin-bottom: 0;
		}
		.form-control {
		    display: inline-block;
		}
		.lfrom-inner {
		    padding: 20px;
		    margin: 0px auto;
		    margin-top: 100px;
		    margin-bottom: 100px;
		    border: 1px solid #F98D79;
		    border-radius: 5px;
		    background-color: #0504044d;
		    color: #F9F9F9;
		}
		.lfrom-inner h4.log-text.text-center.mb-4 {
		    font-size: 25px;
		    border-bottom: 2px solid tomato;
		    padding-bottom: 10px;
		    margin: 20px 61px;
		}
		.lfrom-inner .form-group {
		    margin: 10px 0;
		}
		.lfrom-inner label {
		    font-size: 17px;
		    padding: 5px 0;
		}
		.lfrom-inner svg:not(:root).svg-inline--fa {
		    font-size: 16px;
		}
		.lfrom-inner .form-control {
			font-size: 1em;
		}
		.lfrom-inner .tomato{
			background-color:tomato;
			color:#fff;
			border:1px solid #ce7867;
			font-size: 18px;
		    padding: 5px;
		    margin-bottom: 10px;
		}
		.lfrom-inner .tomato:hover{
			background-color:#cf442b;
		}

		.lfrom-inner a{
			color:#52ded2;
		}

		.lfrom-inner a:hover{
			text-decoration: none;
			color:#2abdb1;
		}

		
		.form-check-input{
			margin-top: 11px;
		}

		@media only screen and (max-width: 992px){
			.lfrom-inner {
			    width: 50% !important;
			}
		}
		
		@media only screen and (max-width: 768px){
			.lfrom-inner {
			    width: 60% !important;
			}
		}

		@media only screen and (max-width: 560px){
			.lfrom-inner {
			    width: 90% !important;
			}
		}

	</style>
	
</head>
<body>
<div class="lbgpic">
	<div class="container"> 
		<div class="row">
			<div class="lfrom-inner"> 
				<?php 
					if(isset($_REQUEST['submit'])){
						$email   = $fm->validation($_REQUEST['email']);
						$mobile  = $fm->validation($_REQUEST['mobile']);
							
						if(empty($email) or empty($mobile)){
							echo "<span style='color:red;font-size:18px'>Feild must not be empty!!</span>";
						}elseif(strlen($mobile) < 10){
							echo "<span style='color:red;font-size:18px'>Please Enter valid mobile number!!</span>";	
						}else{
							$userinfo ="SELECT * FROM tbl_user WHERE userEmail='$email' AND mobile like '%$mobile' ";
						
							$result = $db->select($userinfo);
							if($result){
							    while($resu = mysqli_fetch_assoc($result)){
                    				$name = $resu['username'] ;
                    			}
								$randomNumber = rand(100000,999999); 
								$userup ="UPDATE tbl_user SET randnum = '$randomNumber' WHERE userEmail='$email' ";
								$run = $db->update($userup);
								if($run){
									$to = "$email";
									$subject = "Reset Password";
									$message = "Hi, $name"."\r\n\t"."We received a request to reset Your Libary Managment account password."."\r\n"."Enter the folloing password reset code: ".$randomNumber;
									$headers = "From: Programmer Towheed <contact@programmertowheed.com>" . "\r\n" ."Reply-To: contact@programmertowheed.com" . "\r\n" ."X-Mailer: PHP/" . phpversion();
									$mail=mail($to, $subject, $message, $headers);
									setcookie("email","$email",time()+(300));
									header("Location:confirmpass.php");
								}else{
									echo "<span style='color:red;font-size:18px'>Something Wrong!!</span>";
								}
								
							}else{
								echo "<span style='color:red;font-size:18px'>Email And Mobile Doesn't Found!!</span>";
							}
						}
					}

					?>
				<form action="forgetpass.php" method="post">
					<h4 class="log-text text-center mb-4">Reset Password</h4>
				  <div class="form-group">
					<label for="email"><i class="fas fa-envelope mr-2"></i>Email address</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Enter address">
				  </div>
				  <div class="form-group">
					  <label for="mobile"><i class="fas fa-mobile-alt mr-2"></i>Mobile</label>
					  <input type="text" class="form-control" name="mobile" id="mobile" placeholder="+88 01XXX-XXXXXX">
				  </div>
				  <div class="text-center">
					<button type="submit" class="btn col-6 mt-3 tomato" name="submit" >Submit</button>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>



	<!-- jQuery library -->
  	<script src="../assets/vendor/jquery/jquery.min.js"></script>

	<!-- bootstrap library -->
  	<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Latest bootstrap JavaScript -->
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- fontawesome file-->
	<script src="../assets/vendor/fontawesome-free/js/fontawesome.min.js"></script>

</body>	
</html>
	
