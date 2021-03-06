<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo $page_title; ?></title>
  
  <base href="<?php echo base_url(); ?>">

  <!-- GOOGLE WEB FONT -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
  
  <!-- Bootstrap core CSS-->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Main styles -->
  <link href="assets/css/admin.css" rel="stylesheet">
  <!-- Icon fonts-->
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 
 <link href="assets/js/sweetalert/sweetalert.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<!--  <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.jqueryui.min.css"> -->
 <style type="text/css">
   .table-responsive {
     overflow-x: hidden!important;
    }
 </style>
</head>

<body class="fixed-nav sticky-footer" id="page-top">

 <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="admin/dashboard"><img src="<?php echo $logo; ?>" data-retina="true" alt="" width="35" ></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="admin/dashboard">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
          <a class="nav-link" href="admin/company">
            <i class="fa fa-building-o"></i>
            <span class="nav-link-text">Company</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
          <a class="nav-link" href="admin/department">
            <i class="fa fa-briefcase"></i>
            <span class="nav-link-text">Department</span>
          </a>
        </li>

         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
          <a class="nav-link" href="admin/employee">
            <i class="fa fa-user"></i>
            <span class="nav-link-text">Employee</span>
          </a>
        </li>
       
   
       
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
    
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>