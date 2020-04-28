<?php include('inc/header.php');?>

        
    <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
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
<?php
  $id = Session::get("userId");
  $query = "SELECT * FROM tbl_user WHERE id ='$id'";
  $red = $db->select($query);
  while($res = mysqli_fetch_assoc($red)){
    $name    = $res['username'] ;
    $mobile  = $res['mobile'] ;
    $email   = $res['userEmail'] ;
    $role    = $res['role'] ;
    $img     = $res['picture'] ;
    }?>
                    <div class="form-group">
                        <label class="control-label" for="inputSuccess">Username</label>
                        <input type="text" value="<?php echo $name?>" class="form-control" name="name" id="inputSuccess">
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="inputError">Email</label>
                        <input type="text" class="form-control" disabled name="total_book" value="<?php echo $email?>" id="inputError">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputSuccess">Mobile</label>
                        <input type="text" value="<?php echo $mobile?>" class="form-control" name="name" id="inputSuccess">
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="inputError">Role</label>
                        <input type="text" value="<?php echo $role?>" disabled class="form-control text-capitalize" name="total_book" id="inputError">
                    </div>
                    
                
            </div>
            <div class="col-lg-6">
                <div class="profilepic">
                    <img class="img-profile img-fluid img-thumbnail" src="assets/img/<?php echo $img;?>">
                </div>
            </div>
            <div class="col-12">
              <div class="text-center mb-4 mt-4">
                <a href="editprofile.php" class="btn btn-primary">Edit profile</a>
            </div>
            </div>

     </div>
    <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>