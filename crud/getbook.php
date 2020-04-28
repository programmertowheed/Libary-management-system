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
	if(isset($_REQUEST['department_id'])){
		$id = $fm->validation($_REQUEST['department_id']);

		if($id!=""){
			$option ="<option value=''>Select Book</option>";
	        $query = "SELECT * FROM tbl_book WHERE department_id='$id' AND publication_status='1' AND in_stock>='1' ORDER BY id DESC";
	        $red = $db->select($query);
	        if($red==true){
	            while($value = mysqli_fetch_assoc($red)){ 

	            	$option .="<option value='".$value['id']."'>".$value['name']."</option>";

	    		} 
	    		echo $option;
	    	}

		}	
	}else{
		header("Location:../404.php");
	}
?>