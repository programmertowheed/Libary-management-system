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
	 
    if(isset($_REQUEST['id'])){
            $id  = $fm->validation($_REQUEST['id']);

            if(empty($id)){
                header("Location:../departmentlist.php?err=ID not found!!");
            }else{    
				$delete ="DELETE FROM tbl_department WHERE id = '$id';";
				$run = $db->delete($delete);
				if($run== true){
					header("Location:../departmentlist.php?msg=Data Deleted successfully!!");
				}else{
					header("Location:../departmentlist.php?err=Data not Deleted!!");
				}
            }

        }
    
?>