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
	 
    if(isset($_REQUEST['id']) && isset($_REQUEST['bid'])){
            $id   = $fm->validation($_REQUEST['id']);
            $bid  = $fm->validation($_REQUEST['bid']);

            if(empty($id) || empty($bid)){
                header("Location:../issuebooklist.php?err=ID not found!!");
            }else{   
            	$bupdate ="UPDATE tbl_book 
                        SET
                        in_stock = in_stock+1
                        WHERE id = '$bid'
                        ";
                $brun = $db->update($bupdate);
                if($brun== true){ 
					$delete ="DELETE FROM tbl_issuebook WHERE id = '$id';";
					$run = $db->delete($delete);
					if($run== true){
						header("Location:../issuebooklist.php?msg=Data Deleted successfully!!");
					}else{
						header("Location:../issuebooklist.php?err=Data not Deleted!!");
					}
				}
            }

        }
    
?>