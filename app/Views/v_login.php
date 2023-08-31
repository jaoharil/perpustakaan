

<div class="login-logo">
   <h1><a href=" <?= base_url()  ?> "><b>Sistem Informasi</b>Perpustkaan</a></h1> 
  </div>
<div class="row" style="background-color: orange; height: 300px; width: 800px; padding-left: 40px; padding-top: 60px; border-radius: 20px;">

<div class="login-box">

  <!-- /.login-logo -->
  <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>Admin</h3>

                <p>Admin Registrations</p>
              </div>
              <div class="icon">
                <i class="fas fa fa-user"></i>
              </div>
              <a href="<?= base_url('Auth/LoginUser')  ?>" class="small-box-footer">Login <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
  <!-- /.card -->
</div>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Anggota</h3>

                <p>Anggota Registrations</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?= base_url('Auth/LoginAnggota')  ?>" class="small-box-footer">Login <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
  <!-- /.card -->
</div>
</div>
