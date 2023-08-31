<?php $no = 1;
              foreach ($anggota as $key => $value) {?>
<div class="col-sm-12">
<?php 
          if ($value['verifikasi']== 1){
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i>verifikasi</h5>
            
            </div>
            ';
          }else{
            echo '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i>Akun Anda Belum Verifikasi</h5>
           Silahkan verifikasi ke Admin
            </div>';
          }
          
           ?>
</div>
<div class="col-md-3">
<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <div class="text-center"> 
      <img class="profile-user-img img-fluid " src="<?= base_url('foto/' . $value['foto']) ?>" alt="User profile picture">
    </div>
   
     
      
     
    </div>
  </div>
  </div>

  <?php } ?> 

  <div class="col-md-9">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title"> Data <?= $judul ?></h3>
          
      </div>
      

      <div class="card-body">
      <table class="table">
          <tr>
              <th width="150px">Nis</th>
              <th>:</th>
              <th><?= $value['nis']; ?></th>
            </tr>
            <tr>
              <th>Nama</th>
              <th>:</th>
              <th><?= $value['nama_siswa']; ?></th>
            </tr>
            <tr>
              <th>Jenis Kelamin</th>
              <th>:</th>
              <th><?= $value['jenis_kelamin']; ?></th>
            </tr>
            <tr>
              <th>Kelas</th>
              <th>:</th>
              <th><?= $value['nama_kelas']; ?></th>
            </tr>
          </table>

    </div>
  </div>