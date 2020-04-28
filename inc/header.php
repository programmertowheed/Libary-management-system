<?php
  ob_start();
  ini_set('display_errors','1');
  include "lib/Session.php";
  Session::checkSession();
?>
<?php 
  include "lib/Database.php";
  include "helpers/Format.php";
?>
<?php
  $db  = new Database();
  $fm  = new Format();
  date_default_timezone_set("Asia/Dhaka");
  $current_time = date("Y-m-d H:i:s");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Libary managment system</title>

  <!-- Favicon -->
  <link href="assets/img/favicon.png" rel="icon" type="image/png">

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for datatable -->
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  <!-- My styles for this template-->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('sidebar-nav.php');?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include('top-nav.php');?>
        <!-- End of Topbar -->