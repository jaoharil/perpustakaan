<div class="col-md-12">
  <div class="card bg-warning">
  <div class="card-header">
    <h3 class="card-title">Form <?= $judul ?></h3>
  </div>
  </div>
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
 <?php 
 echo form_open_multipart('Verifikasi/UpdateData/'. $verifikasi['id_anggota'])
  ?>
 
    <div class="row">
      <div class="col-sm-6">
      <div class="form-group">
        <label> Nama siswa</label>
        <input type="form-control" name="nama_siswa" value="<?= $verifikasi['nama_siswa'] ?>" placeholder="Nama Siswa">
      </div>
      
    </div>
    
      <div class="col-sm-6">
      <div class="form-group">
        <label>Nis</label>
        <input type="form-control" name="nis" value="<?= $verifikasi['nis'] ?>" placeholder=" Nis">
      </div>
      </div>
   
   
      <div class="col-sm-6">
      <div class="form-group">
        <label>No Handpone</label>
        <input type="form-control" name="no_hp" value="<?= $verifikasi['no_hp'] ?>" placeholder="No Handpone">
     
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label>Pasword</label>
        <input type="form-control" name="pasword" value="<?= old('pasword') ?>" placeholder="Pasword">
     
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
          <option value="<?= $verifikasi['jenis_kelamin'] ?>"><?= $verifikasi['jenis_kelamin'] ?></option> 
          <option value="laki-laki">Laki-Laki</option>
          <option value="prempuan">Prempuan</option>
        </select>
     
      </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group ">
    <label>Kelas</label>
          <select name="id_kelas" class="form-control" >
          <option value="<?= $verifikasi['id_kelas'] ?>"><?= $verifikasi['id_kelas'] ?></option>
            <?php foreach($kelas as $key => $value) {?>
              <option value="<?= $value['id_kelas'] ?>"><?= $value['nama_kelas'] ?></option>
              <?php } ?>
          </select>
        </div>
    </div>
   
    <div class="col-sm-6">
      <div class="form-group">
        <label>Foto</label>
        <input type="file" class="form-control" name="foto"  accept="imege/*">
     
      </div>
    </div>
    </div>
  
  <div class="card-footer">
     <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Simpan</button>
     <a href="<?= base_url('Verifikasi') ?>" class="btn btn-warning"><i class="fas fa-share"></i>Kembali</a>
  </div>
  
  <?php echo form_close() ?>
  

</div>