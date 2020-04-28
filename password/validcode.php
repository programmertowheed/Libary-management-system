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
	if(isset($_REQUEST['code'])){
	$code = $fm->validation($_REQUEST['code']);
	$email = $fm->validation($_REQUEST['email']);
		if(empty($code)){
			echo "<span style='color:red;font-size:18px'>Feild Must Not Be Empty!!</span>";
		}else{
			$userinfo ="SELECT randnum FROM tbl_user WHERE userEmail='$email'";
		
			$result = $db->select($userinfo);
			while($resu = mysqli_fetch_assoc($result)){
				$randnum = $resu['randnum'] ;
			}
			if($randnum==$code ){
				setcookie("r_n_c_a","$randnum",time()+(300));
				echo 1;
			}else{
				echo "<span style='color:red;font-size:18px'>Invalid Code!!</span>";
			}
		}
	}else{
		header("Location:../404.php");
	}
?>