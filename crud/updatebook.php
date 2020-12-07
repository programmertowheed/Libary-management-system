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
            $author_id           = $fm->validation($_POST['author_id']);
            $total_book          = $fm->validation($_POST['total_book']);
            $publication_status  = $fm->validation($_POST['publication_status']);

            if(empty($id) || empty($name) || empty($department_id) || empty($author_id) || empty($total_book) || empty($publication_status)){
                header("Location:../editbook.php?id=$id&err=Feild must not be empty!!");
            }else{ 
            	$exquery = "SELECT * FROM tbl_book WHERE name='$name' ";
                $exdepart = $db->select($exquery);
                if($exdepart != false){
                	while($res = mysqli_fetch_assoc($exdepart)){
					    $exid  = $res['id'];
					    $in_stock = $res['in_stock'];
					    $get_book = $res['total_book'];
					}

					$issuebook = ($get_book-$in_stock);
					if($total_book>$get_book){
						$book_stock = ($total_book-$get_book);
						$book_stock = ($in_stock+$book_stock);
					}elseif ($total_book<$get_book) {
						$book_stock = ($get_book-$total_book);
						$book_stock = ($in_stock-$book_stock);
					}else{
						$book_stock = $in_stock;
					}

					if($total_book<$issuebook){
						header("Location:../editbook.php?id=$id&err=Total book is lower than issue book!!");
						exit();
					}
                }

                if(isset($exid) && $exid != $id){
            		header("Location:../editbook.php?id=$id&err=Book already exist!!");
                }else{   
					$update ="UPDATE tbl_book 
							SET
							name               = '$name',
							department_id      = '$department_id',
							author_id          = '$author_id',
							total_book         = '$total_book',
							in_stock           = '$book_stock',
							publication_status = '$publication_status'
							WHERE id = '$id'
							";
					$run = $db->update($update);
					if($run== true){
						header("Location:../booklist.php?msg=Data updated successfully!!");
					}else{
						header("Location:../booklist.php?err=Data not updated!!");
					}
				}
            }

        }
    
?>