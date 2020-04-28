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
	 
    if(isset($_REQUEST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $id             = $fm->validation($_POST['id']);
            $department_id  = $fm->validation($_POST['department_id']);
            $book_id        = $fm->validation($_POST['book_id']);
            $return_date    = $fm->validation($_POST['return_date']);

            if(empty($id) || empty($department_id) || empty($book_id) || empty($return_date)){
                header("Location:../editissuebook.php?id=$id&err=Feild must not be empty!!");
            }else{    
				$update ="UPDATE tbl_issuebook 
						SET
						department_id  = '$department_id',
						book_id        = '$book_id',
						return_date    = '$return_date'
						WHERE id = '$id'
						";
				$run = $db->update($update);
				if($run== true){
					header("Location:../issuebooklist.php?msg=Data updated successfully!!");
				}else{
					header("Location:../issuebooklist.php?err=Data not updated!!");
				}
            }

        }
    
?>