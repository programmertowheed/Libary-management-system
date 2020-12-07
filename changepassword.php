<?php include('inc/header.php');?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

        <!-- Change password start -->
        <!-- Page Heading -->
        <div class="outerdiv">
          <div class="text-center mt-4 mb-4">
              <h1 class="h3 mb-0 text-gray-800">Change password</h1>
          </div>

              <!-- Content Row -->
          <div class="row">
            <div class="col-lg-12">
                 <div class="innerdiv">
                    <?php 
                    if(isset($_REQUEST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
                      $oldPassword = $fm->validation($_POST['oldPassword']);
                      $newPassword = $fm->validation($_POST['newPassword']);
                      $conPassword = $fm->validation($_POST['conPassword']);

                      if( $oldPassword=="" || $newPassword=="" || $conPassword==""){
                        echo "<span style='color:red;font-size:18px;    font-weight: bold;'>Feild must not be empty!!</span>";
                      }elseif(strlen($conPassword)<8){
                        echo "<span style='color:red;font-size:18px;    font-weight: bold;'>Passwords must be at least 8 characters!!</span>";
                      }elseif($newPassword != $conPassword){
                        echo "<span style='color:red;font-size:18px;    font-weight: bold;'>Confirm Password Doesn't Match!!</span>";
                      }else{
                        $email        = Session::get("libraryemail");
                        $useremail    = md5(sha1($email));
                        $oldPassword  = md5(sha1($oldPassword));
                        $auth         = md5(sha1($oldPassword.$useremail));

                        $query = "SELECT * FROM tbl_user WHERE userEmail='$email' && userPass='$oldPassword' && auth='$auth' ";
                        $result = $db->select($query);
                        if($result== true){
                          $userpass  = md5(sha1($conPassword));
                          $auth      = md5(sha1($userpass.$useremail));
                          
                          $uppass ="UPDATE tbl_user 
                              SET
                                userPass        = '$userpass',
                                auth            = '$auth'
                                WHERE userEmail = '$email'
                                ";
                          $run = $db->update($uppass);
                          if($run== true){
                            $query = "SELECT * FROM tbl_user WHERE userEmail='$email' && userPass='$userpass' && auth='$auth' ";
                            $result = $db->select($query);
                            if($result != false){
                              $value = mysqli_fetch_array($result);
                              $row   = mysqli_num_rows($result);
                              if($row > 0){
                                Session::set("librarylogin", true);
                                Session::set("libraryemail", $value['userEmail']);
                                Session::set("libraryuserId", $value['id']);
                                echo "<span style='color:green;font-size:18px;    font-weight: bold;'>Your password has been successfully Changed!</span>";
                              }else{
                                echo "<span style='color:red;font-size:18px;    font-weight: bold;'>Result not found!</span>";
                              }
                            }else{
                              echo "<span style='color:red;font-size:18px;    font-weight: bold;'>Email or Password not matched!!</span>";
                            }


                          }else{
                            echo "<span style='color:red;font-size:18px;    font-weight: bold;'>Password Not Changed Something Wrong!!</span>";
                          }
                          
                        }else{
                          echo "<span style='color:red;font-size:18px;    font-weight: bold;'>Old Password Doesn't Match!!</span>";
                        }





                      } 
                    }
                  ?> 
                    <form action="changepassword.php" method="post">
                      <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="oldPassword"><i class="fas fa-pencil-alt mr-2"></i>Old Password<span class="requerd">*</span></label>
                        <input type="text" class="form-control" id="oldPassword" name="oldPassword" placeholder="Old Password">
                      </div>
                      <div class="form-group col-md-12">
                        <label for="newPassword"><i class="fas fa-pencil-alt mr-2"></i>New Password<span class="requerd">*</span></label>
                        <input type="text" class="form-control" id="newPassword" name="newPassword" placeholder="New Password">
                      </div>
                      </div>
                      
                      <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="conPassword"><i class="fas fa-pencil-alt mr-2"></i>Confirm Password<span class="requerd">*</span></label>
                        <input type="text" class="form-control" id="conPassword" name="conPassword" placeholder="Confirm Password">
                      </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary col-6 mt-3" name="submit">Change</button>
                      </div>
                    </form>
                 </div> 
            </div>
          </div>
        </div>
              
        <!-- Change password end -->
</div>
        <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>