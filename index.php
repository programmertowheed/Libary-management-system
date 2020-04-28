<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">
<?php 
    $query_book      = "SELECT count(id) from tbl_book where `publication_status`='1' ";
    $query_author    = "SELECT count(id) from tbl_author where `publication_status`='1' ";
    $query_student   = "SELECT count(id) from tbl_student where `publication_status`='1' ";
    $query_issuebook = "SELECT count(id) from tbl_issuebook";

    $red_book      = $db->select($query_book);
    $red_author    = $db->select($query_author);
    $red_student   = $db->select($query_student);
    $red_issuebook = $db->select($query_issuebook);

    $result_book      = mysqli_fetch_assoc($red_book);
    $result_author    = mysqli_fetch_assoc($red_author);
    $result_student   = mysqli_fetch_assoc($red_student);
    $result_issuebook = mysqli_fetch_assoc($red_issuebook);


    $result_book = $result_book['count(id)'];
    if(!$result_book>0){
        $result_book=0;
    }
    $result_author = $result_author['count(id)'];
    if(!$result_author>0){
        $result_author=0;
    }
    $result_student = $result_student['count(id)'];
    if(!$result_student>0){
        $result_student=0;
    }
    $result_issuebook = $result_issuebook['count(id)'];
    if(!$result_issuebook>0){
        $result_issuebook=0;
    }

?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Book</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $result_book;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Author</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $result_author;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total student</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $result_student;?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total issue book</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $result_issuebook;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          

        </div>
        <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>