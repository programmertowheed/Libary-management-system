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
            $id                  = $fm->validation($_POST['id']);
            $name                = $fm->validation($_POST['name']);
            $publication_status  = $fm->validation($_POST['publication_status']);

            if(empty($id) || empty($name) || empty($publication_status)){
                header("Location:../editauthor.php?id=$id&err=Feild must not be empty!!");
            }else{    
				$update ="UPDATE tbl_author 
						SET
						name               = '$name',
						publication_status = '$publication_status'
						WHERE id = '$id'
						";
				$run = $db->update($update);
				if($run== true){
					header("Location:../authorlist.php?msg=Data updated successfully!!");
				}else{
					header("Location:../authorlist.php?err=Data not updated!!");
				}
            }

        }
    
?>