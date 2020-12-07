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
            $department_id       = $fm->validation($_POST['department_id']);
            $studentid           = $fm->validation($_POST['studentid']);
            $phone               = $fm->validation($_POST['phone']);
            $publication_status  = $fm->validation($_POST['publication_status']);

            if(empty($id) || empty($name) || empty($department_id) || empty($studentid) || empty($phone) || empty($publication_status)){
                header("Location:../editstudent.php?id=$id&err=Feild must not be empty!!");
            }else{ 
            	$exquery = "SELECT * FROM tbl_student WHERE studentid='$studentid' ";
                $exuser = $db->select($exquery);
                if($exuser != false){
                	while($res = mysqli_fetch_assoc($exuser)){
					    $exid  = $res['id'] ;
					}
                }

                if(isset($exid) && $exid != $id){
            		header("Location:../editstudent.php?id=$id&err=Student ID already exist!!");
                }else{
                	$update ="UPDATE tbl_student 
							SET
							name               = '$name',
							department_id      = '$department_id',
							studentid          = '$studentid',
							phone              = '$phone',
							publication_status = '$publication_status'
							WHERE id = '$id'
							";
					$run = $db->update($update);
					if($run== true){
						header("Location:../studentlist.php?msg=Data updated successfully!!");
					}else{
						header("Location:../studentlist.php?err=Data not updated!!");
					}
                }   
					
            }

        }
    
?>