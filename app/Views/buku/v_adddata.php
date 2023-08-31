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
 echo form_open_multipart('Buku/savedata')
  ?>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-6">
      <div class="form-group">
        <label> Judul Buku</label>
        <input type="form-control" name="judul_buku" value="<?= old('judul_buku') ?>" placeholder="Judul Buku">
      </div>
      
    </div>
    
      <div class="col-sm-6">
      <div class="form-group">
        <label>Kode Buku</label>
        <input type="form-control" name="kode_buku" value="<?= old('kode_buku') ?>" placeholder=" Kode Buku">
      </div>
      </div>
      <div class="col-sm-6">
      <div class="form-group">
        <label>ISBN</label>
        <input type="form-control" name="isbn" value="<?= old('isbn') ?>" placeholder=" Isbn">
      </div>
      </div>
   
   
      <div class="col-sm-6">
      <div class="form-group">
        <label>Halaman</label>
        <input type="form-control" name="halaman" value="<?= old('halaman') ?>" placeholder="Halaman">
     
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label>Tahun</label>
        <input type="form-control" name="tahun" value="<?= old('tahun') ?>" placeholder="Tahun">
     
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label>Jumlah</label>
        <input type="form-control" name="jumlah" value="<?= old('jumlah') ?>" placeholder="Jumlah">
     
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label>Bahasa</label>
        <input type="form-control" name="bahasa" value="<?= old('bahasa') ?>" placeholder="Bahasa">
     
      </div>
    </div>
    
    <div class="col-sm-6">
    <div class="form-group ">
    <label>Penerbit</label>
          <select name="id_penerbit" class="form-control" >
          <option value="">--Pilih Penerbit--</option>
            <?php foreach($penerbit as $key => $value) {?>
              <option value="<?= $value['id_penerbit'] ?>"><?= $value['nama_penerbit'] ?></option>
              <?php } ?>
          </select>
        </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group ">
    <label>Pengarang</label>
          <select name="id_pengarang" class="form-control" >
          <option value="">--Pilih pengarang--</option>
            <?php foreach($pengarang as $key => $value) {?>
              <option value="<?= $value['id_pengarang'] ?>"><?= $value['nama_pengarang'] ?></option>
              <?php } ?>
          </select>
        </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group ">
    <label>Rak</label>
          <select name="id_rak" class="form-control" >
          <option value="">--Pilih Rak--</option>
            <?php foreach($rak as $key => $value) {?>
              <option value="<?= $value['id_rak'] ?>"><?= $value['nama_rak'] ?></option>
              <?php } ?>
          </select>
        </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group ">
    <label>Kategori</label>
          <select name="id_kategori" class="form-control" >
          <option value="">--Pilih kategori--</option>
            <?php foreach($kategori as $key => $value) {?>
              <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
              <?php } ?>
          </select>
        </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label>Cover</label>
        <input type="file" class="form-control" name="cover"  accept="imege/*">
     
      </div>
    </div>
    </div>
  
  <div class="card-footer">
     <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Simpan</button>
     <a href="<?= base_url('Buku') ?>" class="btn btn-warning"><i class="fas fa-share"></i>Kembali</a>
  </div>
  
  <?php echo form_close() ?>
  </div>

</div>