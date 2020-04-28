<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

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

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary d-inline-block">Issue Book List</h6>
              <a href="addissuebook.php" class="btn btn-sm btn-primary shadow-sm float-right">Issue Book</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                    <tr>
                      <th>SL</th>
                      <th>Student Name</th>
                      <th>Student ID</th>
                      <th>Book Department</th>
                      <th>Book Name</th>
                      <th>Author Name</th>
                      <th>Issue Date</th>
                      <th>Return Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Student Name</th>
                      <th>Student ID</th>
                      <th>Book Department</th>
                      <th>Book Name</th>
                      <th>Author Name</th>
                      <th>Issue Date</th>
                      <th>Return Date</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
<?php
  $i = 0;
  $query ="SELECT tbl_issuebook.*, tbl_department.name as dname, tbl_student.studentid as sid, tbl_student.name as sname, tbl_book.name as bname, tbl_book.id as bid, tbl_author.name as aname
            FROM tbl_issuebook 
            INNER JOIN tbl_department
            ON tbl_issuebook.department_id = tbl_department.id 
            INNER JOIN tbl_student
            ON tbl_issuebook.student_id = tbl_student.id 
            INNER JOIN tbl_book
            ON tbl_issuebook.book_id = tbl_book.id 
            INNER JOIN tbl_author
            ON tbl_book.author_id = tbl_author.id 
            ORDER BY tbl_issuebook.id DESC"; 

  $red = $db->select($query);
  if($red==false){?>
  <td colspan="8"><h4 class="text-center">No Data Found</h4></td>
  <?php }else{
  while($res = mysqli_fetch_assoc($red)){ $i++ ?>
                    <tr>
                      <td><?php echo $i ;?></td>
                      <td><?php echo $res['sname'];?></td>
                      <td><?php echo $res['sid'];?></td>
                      <td><?php echo $res['dname'];?></td>
                      <td><?php echo $res['bname'];?></td>
                      <td><?php echo $res['aname'];?></td>
                      <td><?php echo $fm->formatDateTime($res['date']);?></td>
                      <td><?php echo $fm->formatDate($res['return_date']);?></td>
                      <td>
                        <a href="editissuebook.php?id=<?php echo $res['id'];?>" type="button" data-toggle="tooltip" title="Edit issue book" class="btn btn-link btn-primary pd0" data-original-title="Edit Task">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="crud/deleteissuebook.php?id=<?php echo $res['id'];?>&bid=<?php echo $res['bid'];?>" type="button" data-toggle="tooltip" onclick="return confirm('Are you sure?');" title="Return book" class="btn btn-link btn-danger pd0" data-original-title="Return book">
                            <i class="fa fa-download"></i>
                        </a>
                      </td>
                    </tr>
<?php  } } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

<?php include('inc/footer.php');?>