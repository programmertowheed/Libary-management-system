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
                header("Location:../editdepartment.php?id=$id&err=Feild must not be empty!!");
            }else{  
            	$exquery = "SELECT * FROM tbl_department WHERE name='$name' ";
                $exdepart = $db->select($exquery);
                if($exdepart != false){
                	while($res = mysqli_fetch_assoc($exdepart)){
					    $exid  = $res['id'] ;
					}
                }

                if(isset($exid) && $exid != $id){
            		header("Location:../editdepartment.php?id=$id&err=Department already exist!!");
                }else{  
					$update ="UPDATE tbl_department 
							SET
							name               = '$name',
							publication_status = '$publication_status'
							WHERE id = '$id'
							";
					$run = $db->update($update);
					if($run== true){
						header("Location:../departmentlist.php?msg=Data updated successfully!!");
					}else{
						header("Location:../departmentlist.php?err=Data not updated!!");
					}
				}
            }

        }
    
?>