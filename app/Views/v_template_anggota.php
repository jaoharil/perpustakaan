
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perpustakaan | <?= $judul ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-warning navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa-solid fa-house"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <h2><b>Perpustakaan</b></h2>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
      
      
      <li class="nav-item">
        <a class="nav-link" href=" <?= base_url('Auth/logoutAnggota')  ?>" >
        <i class="fas fa-sign-out-alt "></i>Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-primary elevation-4" style="background-color: gold;">
    <!-- Brand Logo -->
    <a href=" <?php base_url('Anggota') ?>" class="brand-link">
      
      <span class="brand-text font-weight-light" style="padding-left: 50px;">Anggota</span>
    </a>
<?php $no = 1;
              foreach ($anggota as $key => $value) {?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('foto/' . $value['foto']) ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $value['nama_siswa']; ?></a>
          <?php 
          if ($value['verifikasi']== 1){
            echo '<a class="text-succes"> <i class="fa fa-check-circle text-succes"></i>Verifikasi</a>';
          }else{
            echo '<a class="text-danger"> <i class="fas fa-times text-succes"></i>Belum Verifikasi</a>';
          }
          
           ?>
          
        </div>
      </div>
      
  <?php } ?> 

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
            <a href="<?= base_url('Anggota')  ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
            <i class="fas fa-house-user"></i>
              <p> 
                Dasboard
                
              </p>
            </a>
          </li>
          <li class="nav-item <?= $menu == 'peminjaman' ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?= $menu == 'peminjaman' ? 'active' : '' ?>">
            <i class="fas fa-book-reader"></i>
              <p>
                Peminajaman
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="<?= base_url('Peminjaman/pengajuan')  ?>" class="nav-link <?= $submenu == 'kelas' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Peminjaman/pengajuan')  ?>" class="nav-link <?= $submenu == 'kelas' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Diterima</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Peminjaman/pengajuan')  ?>" class="nav-link <?= $submenu == 'kelas' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ditolak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Peminjaman/')  ?>" class="nav-link <?= $submenu == 'verifikasi' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>History Peminajaman</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <?= $judul ?> </h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

        <?php 
        if ($page) {
          echo view($page);
        }
         ?>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  <!-- Main Footer -->
  
</div>

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>
</body>
</html>
