<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $pageTitle ?></title>
  <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/SIAMIR.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte2/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte2/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte2/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte2/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap.min.css">
  <!-- Sweetalert -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/sweetalert/dist/sweetalert.css">
  <!-- DateTime -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/datetimepicker/css/bootstrap-datetimepicker.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte2/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte2/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">




 <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <!-- <body class="sidebar-mini skin-black-light"> -->
  <body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>KSM</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Si Amir | Mirota KSM</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user"></i>
                  <span class="hidden-xs"><?php echo $name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header" style="height: 80px ;">
                    <p>
                      <?php echo $name; ?>
                      <small><?php echo $role_text; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>loadChangePass" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li> 
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="">
              <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
            <?php
            if($role == ROLE_ADMIN || $role == ROLE_KABAG){?>
            <li class="treeview">
              <a href="#">
                <i class="fa  fa-list"></i> <span>Master Data</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>Datasaldoawal"><i class="fa fa-circle-o"></i> Data Saldo Awal</a></li>
                <li><a href="<?php echo base_url(); ?>Datakategori"><i class="fa fa-circle-o"></i> Data Kategori</a></li>
                <li><a href="<?php echo base_url(); ?>Dataakun"><i class="fa fa-circle-o"></i> Data Akun</a></li>
                <li><a href="<?php echo base_url(); ?>Datafaq"><i class="fa fa-circle-o"></i> Data FAQ</a></li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-circle-o"></i> <span> Data Karyawan</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>Datadivisi"><i class="fa fa-circle-o"></i> Data Divisi</a></li>
                    <li><a href="<?php echo base_url(); ?>Datakaryawan"><i class="fa fa-circle-o"></i> Data Karyawan</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <?php } ?>
            <!-- <?php
            if($role == ROLE_ADMIN)
            {
            ?>
            <li class="header">GUDANG BAHAN BAKU</li>
            <li class="treeview">
              <a href="#">
                <i class="fa  fa-list"></i> <span>Data Bahan Baku</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>barangmasuk"><i class="fa fa-circle-o"></i> Data Bahan Masuk</a></li>
                <li><a href="<?php echo base_url(); ?>barangkeluar"><i class="fa fa-circle-o"></i>Data Bahan Keluar</a></li>
              </ul>
            </li>
            <?php } ?> -->
            <?php
            if($role != ROLE_PK)
            {
            ?>
            <li class="header">DATA TRANSAKSI</li>
            <!-- <li>
              <a href="<?php echo base_url(); ?>Datatransaksi">
                <i class="fa fa-file-text"></i>
                <span>Data Transaksi</span>
              </a>
            </li> -->
            <li>
              <a href="<?php echo base_url().'transaksi/kategori/'.$role; ?>">
                <i class="fa fa-plus"></i>
                <span>Tambah Transaksi</span>
              </a>
            </li>
            <?php } ?>
            <?php
            if($role == ROLE_ADMIN || $role == ROLE_MANAGER || $role == ROLE_KAS || $role == ROLE_KABAG)
            {
            ?>
            <li class="treeview">
              <a href="#">
                <i class="fa  fa-money"></i> <span>Data Kas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>data/kas"><i class="fa fa-bookmark"></i> Data Transaksi Kas</a></li>
                <li><a href="<?php echo base_url(); ?>jurnal/kas"><i class="fa fa-bookmark"></i> Jurnal Kas</a></li>
                <li><a href="<?php echo base_url(); ?>bukubesar/kas"><i class="fa fa-book"></i> Buku Besar Kas</a></li>
                <li><a href="<?php echo base_url(); ?>transaksi/neraca"><i class="fa fa-balance-scale"></i> Neraca</a></li>
              </ul>
            </li>
            <?php } ?>
            <?php
            if($role == ROLE_ADMIN || $role == ROLE_MANAGER || $role == ROLE_BANK || $role == ROLE_KABAG || $role == ROLE_KAS)
            {
            ?>
            <li class="treeview">
              <a href="#">
                <i class="fa  fa-bank"></i> <span>Data Bank</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>data/bank"><i class="fa fa-bookmark"></i> Data Transaksi Bank</a></li>
                <li><a href="<?php echo base_url(); ?>jurnal/bank"><i class="fa fa-bookmark"></i> Jurnal Bank</a></li>
                <li><a href="<?php echo base_url(); ?>bukubesar/bank"><i class="fa fa-book"></i> Buku Besar Bank</a></li>
                <li><a href="<?php echo base_url(); ?>bank/neraca"><i class="fa fa-balance-scale"></i> Neraca</a></li>
              </ul>
            </li>
            <?php } ?>
            <?php
            if($role == ROLE_ADMIN || $role == ROLE_PK || $role == ROLE_KABAG)
            {
            ?>
            <li class="header">DATA PIUTANG</li>
            <li>
              <a href="<?php echo base_url(); ?>pembayaranpiutang">
                <i class="fa fa-reply"></i>
                <span>Pelunasan Piutang Karyawan</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>piutang/datapiutang">
                <i class="fa fa-file-text"></i>
                <span>Data Piutang Karyawan</span>
              </a>
            </li>
            <?php } ?>
            <?php
            if($role == ROLE_ADMIN)
            {
            ?>
            <li class="header">User Management</li>
            <li>
              <a href="<?php echo base_url(); ?>userListing">
                <i class="fa fa-users"></i>
                <span>Users</span>
              </a>
            </li>
            <?php
            }
            ?>
            <li>
              <a href="<?php echo base_url(); ?>faq/tampilfaq">
                <span>FAQ</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
