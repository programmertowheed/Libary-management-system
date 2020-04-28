Book<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Book</h1>
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
                <form role="form" action="crud/updatebook.php" method="post">
<?php
    if(isset($_REQUEST['id'])){
        $id = $fm->validation($_REQUEST['id']);
    }
    if(empty($id)){
        header("Location:booklist.php?err=ID not found!!"); 
    }else{
        $query = "SELECT * FROM tbl_book WHERE id= $id";
        $red = $db->select($query);
        while($res = mysqli_fetch_assoc($red)){ ?>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Book name</label>
                        <input type="text" name="name" value="<?php echo $res['name'];?>" class="form-control" id="inputSuccess">
                        <input type="hidden" name="id" value="<?php echo $res['id'];?>" class="form-control" id="inputid">
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
                        <label for="author_id">Author</label>
                        <select name="author_id" id="author_id" class="form-control">
                            <option value="" selected>Select Author</option>
                        <?php
                            $query = "SELECT * FROM tbl_author WHERE publication_status='1' ORDER BY id DESC";
                            $red = $db->select($query);
                            if($red==true){
                                while($value = mysqli_fetch_assoc($red)){ ?>

                                <option value="<?php echo $value['id'];?>"
                                  <?php if($res['author_id']==$value['id']){ echo "selected";}?>
                                  ><?php echo $value['name'];?></option>

                        <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group has-error">
                        <label class="control-label" for="inputError">Total book</label>
                        <input type="number" name="total_book" value="<?php echo $res['total_book'];?>" class="form-control" id="inputError">
                    </div>
                    <div class="form-group">
                        <label for="publication_status" class="control-label">Publication Status</label>

                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="inlineRadio1">
                                <input class="form-check-input" id="inlineRadio1" type="radio" name="publication_status" value="1" <?php if($res['publication_status']==1){ echo "checked";}?>>Published</label>
                            <label class="form-check-label" for="inlineRadio2">
                                <input class="form-check-input" id="inlineRadio2" type="radio" name="publication_status" value="2" <?php if($res['publication_status']==2){ echo "checked";}?>>Unpublished</label>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update info</button>
<?php } } ?>
                </form>
            </div>

     </div>
        <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>