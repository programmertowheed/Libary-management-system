<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Issue Book</h1>
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

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-6">
                <form role="form" action="crud/updateissuebook.php" method="post">
<?php
    if(isset($_REQUEST['id'])){
        $id = $fm->validation($_REQUEST['id']);
    }
    if(empty($id)){
        header("Location:issuebooklist.php?err=ID not found!!"); 
    }else{
        $query = "SELECT * FROM tbl_issuebook WHERE id= $id";
        $red = $db->select($query);
        while($res = mysqli_fetch_assoc($red)){ $sid = $res['student_id'];  ?>
                    <div class="form-group has-success">
                   <?php $squery = "SELECT * FROM tbl_student WHERE id='$sid' ";
                        $sred = $db->select($squery);
                        if($sred==true){
                          $sresult = mysqli_fetch_assoc($sred);}?>
                        <label class="control-label" for="inputSuccess">Student Name</label>
                        <input type="text" value="<?php echo $sresult['name'];?>" disabled class="form-control" id="inputSuccess">
                        <input type="hidden" value="<?php echo $res['id'];?>" name="id" class="form-control" id="inputid">
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Student ID</label>
                        <input type="text" value="<?php echo $sresult['studentid'];?>" disabled class="form-control" id="inputSuccess">
                    </div>
                    <div class="form-group">
                        <label for="department_id">Department</label>
                        <select name="department_id" id="department_id" class="form-control">
                            <option value="">Select Department</option>
                        <?php
                            $query = "SELECT * FROM tbl_department WHERE publication_status='1' ORDER BY id DESC";
                            $red = $db->select($query);
                            if($red==true){
                                while($value = mysqli_fetch_assoc($red)){ ?>

                                <option value="<?php echo $value['id'];?>" 
                                <?php if($res['department_id']==$value['id']){ echo "selected";}?> 
                                 ><?php echo $value['name'];?></option>

                        <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="book_id">Book Name</label>
                        <select name="book_id" id="book_id" class="form-control">
                            <option value="">Select Book</option>
                        <?php
                            $bquery = "SELECT * FROM tbl_book WHERE publication_status='1' ORDER BY id DESC";
                            $bred = $db->select($bquery);
                            if($bred==true){
                                while($bvalue = mysqli_fetch_assoc($bred)){ ?>

                                <option value="<?php echo $bvalue['id'];?>" 
                                <?php if($res['book_id']==$bvalue['id']){ echo "selected";}?> 
                                 ><?php echo $bvalue['name'];?></option>

                        <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="inputWarning">Return Date (Hints: 28/04/2020)</label>
                        <input type="text" value="<?php echo $res['return_date'];?>" name="return_date" class="form-control" id="inputWarning">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update info</button>
<?php } } ?>                    
                </form>
            </div>

     </div>
        <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>