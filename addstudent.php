<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Student</h1>
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
                        $name                = $fm->validation($_POST['name']);
                        $department_id          = $fm->validation($_POST['department_id']);
                        $studentid           = $fm->validation($_POST['studentid']);
                        $phone               = $fm->validation($_POST['phone']);
                        $publication_status  = $fm->validation($_POST['publication_status']);
                        $date                = $current_time;

                        if(empty($name) || empty($department_id) || empty($studentid) || empty($phone) || empty($publication_status)){
                            header("Location:addstudent.php?err=Feild must not be empty!!");
                        }else{    

                            $insert ="INSERT INTO  tbl_student (name,department_id,studentid,phone,publication_status,date)
                                VALUES ('$name','$department_id','$studentid','$phone','$publication_status','$date')";
                            $run = $db->insert($insert);
                            if($run== true){
                                header("Location:addstudent.php?msg=Student added successfully!!");
                                
                            }else{
                                header("Location:addstudent.php?err=Student not added!!");
                            }
                        }

                    }
                ?>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-6">
                <form role="form" action="addstudent.php" method="post">
                    <div class="form-group">
                        <label class="control-label" for="inputSuccess">Student name</label>
                        <input type="text" class="form-control" name="name" id="inputSuccess">
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
                        <label class="control-label" for="inputWarning">Student ID</label>
                        <input type="text" class="form-control" name="studentid" id="inputWarning">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputError">Phone</label>
                        <input type="text" class="form-control" name="phone" id="inputError">
                    </div>
                    <div class="form-group">
                        <label for="publication_status" class="control-label">Publication Status</label>

                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="inlineRadio1">
                                <input class="form-check-input" id="inlineRadio1" type="radio" name="publication_status" checked value="1">Enable</label>
                            <label class="form-check-label" for="inlineRadio2">
                                <input class="form-check-input" id="inlineRadio2" type="radio" name="publication_status" value="2">Disable</label>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

     </div>
        <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>