<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>B2B | Finance </title>
  <link rel="icon" type="image/png" href="<?php echo base_url('asset/dist/img/rexbridge.JPG');?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/fontawesome-free/css/all.min.css');?>">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css');?>">

  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/daterangepicker/daterangepicker.css');?>">

  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">

  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/select2/css/select2.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');?>">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css');?>">

  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('asset/plugins/summernote/summernote-bs4.min.css');?>">

  <!--Old version -->
  <!-- <script src="<?php echo base_url('assets/plugins/sweetalert/sweetalert.js'); ?>"></script> -->
  <!-- <script src="<?php echo base_url('asset/modernizr.js') ?>"></script> -->
  <script src="<?php echo base_url('asset/jquery.min.js') ?>"></script>

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('asset/dist/css/adminlte.min.css');?>">

  <style type="text/css">
    .no-js #loader {
      display: none;
    }

    .js #loader {
      display: block;
      position: absolute;
      left: 100px;
      top: 0;
    }

    .se-pre-con {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url("<?php echo base_url('assets/loading2.gif') ?>") center no-repeat #fff;
      /*background:   #fff;*/
    }

    #highlight {
      background-color: #f8f9c7;
    }

    #highlight2 {
      background-color: #9df9a6;
    }

    #highlight3 {
      background-color: #DD4B39;
    }

    #highlight4 {
      background-color: #FFFF00;
    }

    #highlight5 {
      background-color: #B0B0B0;
    }

    @keyframes blink {
      50% {
        background-color: #fff;
      }
    }

    @media print {
      a[href]:after {
        display: none;
        visibility: hidden;
      }
    }

    @media (min-width: 768px) {
      .modal-xl {
        width: 90%;
        !important max-width: 1200px;
      }
    }

    .media:hover {
      background-color:#007bff;
      color: black;
    }

    body {
      width: 100%;
      height: 100%;
    }

    .btn-group-fab {
      position: fixed;
      width: 50px;
      height: auto;
      right: 20px;
      bottom: 20px;
    }

    .btn-group-fab div {
      position: relative;
      width: 100%;
      height: auto;
    }

    .btn-group-fab .btn {
      position: absolute;
      bottom: 0;
      border-radius: 50%;
      display: block;
      margin-bottom: 4px;
      width: 40px;
      height: 40px;
      margin: 4px auto;
    }

    .btn-group-fab .btn-main {
      width: 50px;
      height: 50px;
      right: 50%;
      margin-right: -25px;
      z-index: 9;
    }

    .btn-group-fab .btn-sub {
      bottom: 0;
      z-index: 8;
      right: 50%;
      margin-right: -20px;
      -webkit-transition: all 2s;
      transition: all 0.5s;
    }

    .btn-group-fab.active .btn-sub:nth-child(2) {
      bottom: 60px;
    }

    .btn-group-fab.active .btn-sub:nth-child(3) {
      bottom: 110px;
    }

    .btn-group-fab.active .btn-sub:nth-child(4) {
      bottom: 160px;
    }

    .btn-group-fab .btn-sub:nth-child(5) {
      bottom: 210px;
    }

    .pill_button {
      background-color: #222d32;
      border: none;
      color: white;
      font-weight: bold;
      padding: 5px 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      margin: 4px 2px;
      border-radius: 16px;
      font-family: sans-serif;
    }

    .col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9 {
      display: flow-root;
    }

    .open-button {
      background-color: #555;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 23px;
      right: 28px;
      border-radius: 50px;
      z-index: 1000000;
    }

    /* The popup chat - hidden by default */
    .chat-popup {
      display: none;
      position: fixed;
      bottom: 0;
      right: 15px;
      border: 3px solid #f1f1f1;
      z-index: 1000000;
    }

    /* Add styles to the form container */
    .form-container {
      max-width: 300px;
      padding: 10px;
      background-color: white;
    }

    /* Full-width textarea */
    .form-container textarea {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
      resize: none;
      min-height: 200px;
    }

    /* When the textarea gets focus, do something */
    .form-container textarea:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Set a style for the submit/send button */
    .form-container .btn_chat {
      background-color: #4CAF50;
      color: white;
      padding: 8px 10px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom: 10px;
      opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
      background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn_chat:hover,
    .open-button:hover {
      opacity: 1;
    }

    .tooltip9 {
      position: relative;
      display: inline-block;
    }

    .tooltip9 .tooltiptext {
      visibility: hidden;
      width: 200px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;

      /* Position the tooltip */
      position: absolute;
      z-index: 1000000;
    }

    .tooltip9:hover .tooltiptext {
      visibility: visible;
    }
  </style>

  <script type="text/javascript">
    $(window).load(function() {
      // Animate loader off screen
      $(".se-pre-con").fadeOut("slow");
    });
  </script>

</head>

<body class="sidebar-mini control-sidebar-slide-open layout-fixed sidebar-collapse" style="height: auto;">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <?php if (isset($_SESSION['show_side_menu']) == 'TRUE') 
          { 
            ?>
            <a href="<?php echo site_url('Dashboard');?>" class="nav-link">Home</a>
            <?php
          }
          ?>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <?php if (isset($_SESSION['show_side_menu']) == 'TRUE') 
        { 
          ?>
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">1</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">1 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 1 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>
          <?php
        }
        ?>

        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo base_url('asset/dist/img/rexbridge.JPG');?>" class="user-image img-circle elevation-2" alt="User Image">
            <span class="d-none d-md-inline">Profile</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
            <!-- User image -->
            <li class="user-header bg-primary">
              <img src="<?php echo base_url('asset/dist/img/rexbridge.JPG');?>" class="img-circle elevation-2" alt="User Image">
              <p>
                Username : <?php echo $_SESSION['userid'] ?>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="dropdown-divider"></div>
                <a href="<?php echo site_url('login_c/customer')?>" class="dropdown-item">
                  <!-- Message Start -->
                  <?php if (isset($_SESSION['customer_guid'])) {
                  ?>

                    <?php 
                    $name = $this->db->query("SELECT a.acc_name FROM lite_b2b.acc a WHERE a.acc_guid = '" . $_SESSION['customer_guid'] . "'")->row('acc_name'); 
                    $get_logo_info = $this->db->query("SELECT a.file_path,CONCAT('/asset',a.file_path) AS concat_file_path from lite_b2b.acc a WHERE a.acc_guid = '" . $_SESSION['customer_guid'] . "'"); 
                    $store_logo = $get_logo_info->row('concat_file_path');
                    $get_pic = substr($store_logo, strrpos($store_logo, '/' )+1);
                    ?>

                  <?php
                  }
                  ?>
                  <div class="media">
                    <?php if(isset($get_logo_info) == '1') 
                    {
                      ?>
                      <img src="<?php echo base_url($store_logo.'/'.$get_pic.'.jpg');?>" alt="Retailer Avatar" class="img-size-50 img-square mr-3">
                      <?php
                    }
                    ?>
                    <div class="media-body">
                      <h3 class="dropdown-item-title">
                        <?php if(isset($name) == '1') 
                        {
                          echo '<p>' .$name. '</p>';
                        }
                        else
                        {
                          echo '<p> PLEASE SELECT CUSTOMER </p>';
                        } 
                        ?>
                      </h3>
                    </div>
                  </div>
                  <!-- Message End -->
                </a>
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="<?php echo site_url('login_c/password')?>" class="btn btn-default btn-flat">Change Password</a>
              <a href="<?php echo site_url('login_c/logout')?>" class="btn btn-default btn-flat float-right">Sign out</a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->
    
    <!-- Check Have Select Retailers Or Not -->
    <?php if (isset($_SESSION['show_side_menu']) == 'TRUE') 
    { 
      ?>
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?php echo site_url('Dashboard');?>" class="brand-link">
          <img src="<?php echo base_url('asset/dist/img/rexbridge.JPG');?>" alt="B2B Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">B2B</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="<?php echo site_url('Dashboard');?>" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo site_url('Dashboard/chart');?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard Chart</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="<?php echo site_url('B2b_grn/einvoice_site') ?>" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    GRN Order
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo site_url('Testing/testing_site') ?>" class="nav-link">
                  <i class="nav-icon fa fa-table"></i>
                  <p>
                    Testing
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
      <!-- End Sidebar Container -->
      <?php
    }
    else
    {
      ?>
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
          <img src="<?php echo base_url('asset/dist/img/rexbridge.JPG');?>" alt="B2B Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">B2B</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

        </div>
        <!-- /.sidebar -->
      </aside>
      <!-- End Sidebar Container -->
      <?php
    }
    ?>

    <div class="se-pre-con"></div>