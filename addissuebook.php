<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Issue Book</h1>
          </div>

          <?php if(isset($_GET['msg'])){
            $msg = $_GET['msg'];?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $msg ?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php } ?>

        <?php if(isset($_GET['err'])){
            $error = $_GET['err'];?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $error ?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php }?>

          <?php 
                if(isset($_REQUEST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
                        $student_id         = $fm->validation($_POST['student_id']);
                        $department_id      = $fm->validation($_POST['department_id']);
                        $book_id            = $fm->validation($_POST['book_id']);
                        $return_date        = $fm->validation($_POST['return_date']);
                        $date               = $current_time;

                        if(empty($student_id) || empty($department_id) || empty($book_id) || empty($return_date)){
                            header("Location:addissuebook.php?err=Feild must not be empty!!");
                        }else{ 
                            $exquery = "SELECT * FROM tbl_issuebook WHERE student_id='$student_id' AND book_id='$book_id'";
                            $exbook = $db->select($exquery);
                            if($exbook != false){
                                header("Location:addissuebook.php?err=Book already issued!!");
                            }else{
                                $bupdate ="UPDATE tbl_book 
                                        SET
                                        in_stock = in_stock-1
                                        WHERE id = '$book_id'
                                        ";
                                $brun = $db->update($bupdate);
                                if($brun== true){
                                    $insert ="INSERT INTO  tbl_issuebook (student_id,department_id,book_id,return_date,date)
                                        VALUES ('$student_id','$department_id','$book_id','$return_date','$date')";
                                    $run = $db->insert($insert);
                                    if($run== true){
                                        header("Location:addissuebook.php?msg=Book issued successfully!!");
                                    }else{
                                        header("Location:addissuebook.php?err=Book not issued!!");
                                    }
                                }
                            }   
                                
                        }

                    }
                ?>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-6">
                <form role="form" action="addissuebook.php" method="post">
                    <div class="form-group has-success">
                        <label class="control-label" for="sinput_id">Student ID</label>

                        <input type="text" class="form-control" onkeyup="availableStudent();" id="sinput_id">
                        <input type="hidden" class="form-control" name="student_id" id="student_id">
                        <div id="msg">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="department_id">Department</label>
                        <select name="department_id" id="department_id" class="form-control">
                            <option value="" selected>Select Department</option>
                        <?php
                            $query = "SELECT * FROM tbl_department WHERE publication_status='1' ORDER BY id DESC";
                            $red = $db->select($query);
                            if($red==true){
                                while($value = mysqli_fetch_assoc($red)){ ?>

                                <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>

                        <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="book_id">Book Name</label>
                        <select name="book_id" id="book_id" class="form-control">
                            <option value="" selected>Select Book</option>
                        </select>
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="inputWarning">Return Date (Hints: 28/04/2020)</label>
                        <input type="text" class="form-control" name="return_date" id="inputWarning">
                    </div>
                    <button type="submit" name="submit" id="issuesubmit" disabled="disabled" class="btn btn-primary">Submit</button>
                </form>
            </div>

     </div>
        <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>