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
                header("Location:../booklist.php?err=ID not found!!");
            }else{    
				$delete ="DELETE FROM tbl_book WHERE id = '$id';";
				$run = $db->delete($delete);
				if($run== true){
					header("Location:../booklist.php?msg=Data Deleted successfully!!");
				}else{
					header("Location:../booklist.php?err=Data not Deleted!!");
				}
            }

        }
    
?>