<?php
    ob_start();
    ini_set('display_errors','1');
?>
<?php include "lib/Database.php";?>
<?php
	$db = new Database();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Programmer Towheed, Full Stack Web Developer & Social Entrepreneur">
    <meta name="keywords" content="Entrepreneur,Web Developer, Programmer, Programmer Towheed, Bangladesh, Online Earning, Earn Money online, Bangla Video Tutorial">
    <meta name="author" content="Programmer Towheed">

	<title>Book List | Libary managment system</title>
	
	<!-- Favicon -->
    <link href="assets/img/favicon.png" rel="icon" type="image/png">

	<!-- bootstrap stylesheet-->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	
	<!-- fontawesome stylesheet-->
	<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	
	<!-- Custom styles for datatable -->
  	<link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<!-- coustom style-->
	<style type="text/css">
		body {
		    font-family: arial;
		    position: relative;
		    background: #58757C;
		}
		
		.card.shadow.mb-4 {
		    margin-top: 50px;
		}

	</style>
	
	
</head>
<body>

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
            <div class="card-header py-3 text-center">
              <h6 class="m-0 font-weight-bold text-primary d-inline-block">Book List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Book Name</th>
                      <th>Author</th>
                      <th>Department Name</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Book Name</th>
                      <th>Author</th>
                      <th>Department Name</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
<?php
  $i = 0;
  $query ="SELECT tbl_book.*, tbl_department.name as departname, tbl_author.name as        authname
            FROM tbl_book 
            INNER JOIN tbl_department
            ON tbl_book.department_id = tbl_department.id 
            INNER JOIN tbl_author
            ON tbl_book.author_id = tbl_author.id 
            ORDER BY tbl_book.id DESC"; 

  $red = $db->select($query);
  if($red==false){?>
  <td colspan="8"><h4 class="text-center">No Data Found</h4></td>
  <?php }else{
  while($res = mysqli_fetch_assoc($red)){ $i++ ?>
                    <tr>
                      <td><?php echo $i ;?></td>
                      <td><?php echo $res['name'];?></td>
                      <td><?php echo $res['authname'];?></td>
                      <td><?php echo $res['departname'];?></td>
                      <?php if($res['in_stock']>=1){?>
                      <td>In stock</td>
                      <?php }else{?>
                      <td>Out of stock</td>
                      <?php }?>
                      
                    </tr>
<?php  } } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->


	<!-- jQuery library -->
  	<script src="assets/vendor/jquery/jquery.min.js"></script>

	<!-- bootstrap library -->
  	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Latest bootstrap JavaScript -->
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- fontawesome file-->
	<script src="assets/vendor/fontawesome-free/js/fontawesome.min.js"></script>

	
  	<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  	<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  	<script src="assets/js/demo/datatables-demo.js"></script>


</body>	
</html>