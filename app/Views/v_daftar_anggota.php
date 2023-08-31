<div class="login-box">
<div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= base_url('Auth') ?>" class="h1"><b>Daftar</b>Anggota</a>
    </div>
    <div class="card-body ">
      <?php 
      //pesan
      $errors = session()->getFlashdata('errors');
      if(!empty($errors))  {  ?>
        <div class="alert alert-danger" role="alert">
          <h4>Periksa Entry Form</h4>
          <ul>
            <?php foreach($errors as $key => $error) { ?>
              <li><?= esc($error) ?></li>
              <?php } ?>
          </ul>
        </div>

      <?php } ?>


      <?php  
      //pesan Berhasil
      if (session() ->getFlashdata('pesan') ){
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> ';
            echo (session() ->getFlashdata('pesan') );
            echo '</h5></div>';
            }
      ?>
       

      <?php echo form_open('Auth/Daftar') ?>
        <div class="form-group ">
          <input type="taxt" class="form-control" name="nis" value="<?= old('nis') ?>" placeholder="Nis">
        </div>
        <div class="form-group ">
          <input type="taxt" class="form-control" name="nama_siswa" value="<?= old('nama_siswa') ?>" placeholder="Nama Siswa">
        </div>
        <div class="form-group ">
          <select name="id_kelas" class="form-control" >
          <option value="">--Pilih Kelas--</option>
            <?php foreach($kelas as $key => $value) {?>
              <option value="<?= $value['id_kelas'] ?>"><?= $value['nama_kelas'] ?></option>
              <?php } ?>
          </select>
        </div>
        <div class="form-group ">
          <select name="jenis_kelamin" class="form-control" >
          <option value="">--Jenis Kelamin--</option>
            <option value="laki-laki">Laki-Laki</option>
            <option value="prempuan">Prempuan</option>
          </select>
        </div>
        <div class="form-group ">
          <input type="taxt" class="form-control" name="no_hp" value="<?= old('no_hp') ?>" placeholder="No Handpone">
        </div>
        <div class="form-group ">
          <input type="password" class="form-control" name="pasword" value="<?= old('pasword') ?>"  placeholder="Pasword">
        </div>
        <div class="form-group ">
          <input type="password" class="form-control" name="ulangi_pasword" value="<?= old('ulangi_pasword') ?>" placeholder="Ulangi Pasword">
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" >Daftar</button>
          </div>
          <!-- /.col -->
        </div>
     <?php echo form_close() ?>
      <div class="social-auth-links text-center mb-3">
        <br>
        <br>
          <a href=" <?= base_url('Auth/LoginAnggota') ?> " class="btn btn-block btn-warning">
          <i class="fas fa-sign-out-alt "></i> sudah punya akun
            </a>
             
              </div>
      
      <!-- /.social-auth-links -->

      
      
    </div>
    <!-- /.card-body -->
  </div>
  </div>