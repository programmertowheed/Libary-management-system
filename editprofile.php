<?php include('inc/header.php');?>

  <!-- Begin Page Content -->
  <div class="container-fluid">
      

        <!-- Tab one Content start-->
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

          <!-- Page Heading -->
                <div class="d-sm-flex mt-4 align-items-center justify-content-between mb-4">
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
                    <form role="form" action="crud/updateprofile.php" method="post">
     
                          <div class="form-group">
                              <label class="control-label" for="inputSuccess">Username</label>
                              <input type="text" value="<?php echo $name?>" class="form-control" name="username" id="inputSuccess">
                          </div>
                          
                          <div class="form-group">
                              <label class="control-label" for="inputSuccess">Mobile</label>
                              <input type="text" value="<?php echo $mobile?>" class="form-control" name="mobile" id="inputSuccess">
                          </div>
                          <div class="form-group text-center">
                              <button type="submit" name="prosubmit" id="issuesubmit" class="btn btn-primary mt-2 mb-5">Update profile</button>
                          </div>
                          
                      </form>
                  </div>
                  <div class="col-lg-6">
                      <div class="profilepic">
                          <img class="img-profile img-fluid img-thumbnail img-pointer" src="assets/img/<?php echo $img;?>" alt="Profile picture" data-toggle="modal" data-target="#exampleModalCenter">
                      </div>
                  </div>

                  <!-- Modal -->
                  <form action="crud/updatepicture.php" method="post" enctype="multipart/form-data">
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Choose profile picture</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        
                      
                          <input type="file" name="adminimage" />
                        
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="imgsubmit" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                      </div>
                    </div>      
                  </form> 
              
              </div>
        </div>
        <!-- Tab one Content end -->
       

</div>
        <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>