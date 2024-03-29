<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Author</h1>
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
                        $publication_status  = $fm->validation($_POST['publication_status']);
                        $date                = $current_time;

                        if(empty($name) || empty($publication_status)){
                            header("Location:addauthor.php?err=Feild must not be empty!!");
                        }else{    
                            $exquery = "SELECT * FROM tbl_author WHERE name='$name' ";
                            $exname = $db->select($exquery);
                            if($exname != false){
                                header("Location:addauthor.php?err=Author already exist!!");
                            }else{
                                $insert ="INSERT INTO  tbl_author (name,publication_status,date)
                                    VALUES ('$name','$publication_status','$date')";
                                $run = $db->insert($insert);
                                if($run== true){
                                    header("Location:addauthor.php?msg=Author added successfully!!");
                                    
                                }else{
                                    header("Location:addauthor.php?err=Author not added!!");
                                }
                            }    
                        }

                    }
                ?>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-6">
                <form role="form" action="addauthor.php" method="post">
                    <div class="form-group">
                        <label class="control-label" for="inputSuccess">Author name</label>
                        <input type="text" class="form-control" name="name" id="inputSuccess">
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