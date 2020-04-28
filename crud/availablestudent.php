<?php
    ob_start();
    ini_set('display_errors','1');
	include "../lib/Session.php";
	Session::checkSession();
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
	if(isset($_REQUEST['student_id'])){
		$id = $fm->validation($_REQUEST['student_id']);

		if($id!=""){
	        $query = "SELECT * FROM tbl_student WHERE studentid='$id' AND publication_status='1' ";
	        $red = $db->select($query);
	        if($red==true){
	        	$res = mysqli_fetch_assoc($red);
	        	$res = $res['id'];
	            echo $res;
	    	}
		}	
	}else{
		header("Location:../404.php");
	}
?>