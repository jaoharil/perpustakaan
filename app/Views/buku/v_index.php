<div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title"> Data <?= $judul ?></h3>
          <div class="card-tools">
            <a href="<?= base_url('Buku/AddData') ?>" class="btn btn-primary btn-flat btn-sm"  data-target="#modal-sm">
            <i class="fas fa-plus"></i>Add
            </a>
          </div>
      </div>

      <div class="card-body">
     

    
      <?php 
      //pesan 

        if (session() ->getFlashdata('pesan') ){
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> ';
            echo (session() ->getFlashdata('pesan') );
            echo '</h5></div>';
            }
      ?>
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th >No</th>
                <th>Cover</th>
                <th>Judul Buku</th>
                <th>ISBN</th>
                <th>Tahun</th>
                <th>Bahasa</th>
                <th>Halaman</th>
                <th>Jumlah</th>
                <th >Action</th>

            </tr>
            </thead>
            <tbody">
              <?php $no = 1;
              foreach ($buku as $key => $value) {?>
              <tr>
                <td><?= $no++ ?></td>
                <td class="text-center">
                  <img class="profile-user-img img-fluid " src="<?= base_url('cover/' . $value['cover']) ?>" alt="User profile picture">
                  <p><?= $value['kode_buku']; ?></p>
                </td>
                <td>
                  <h5><?= $value['judul_buku']; ?></h5><br>
                  
                  <p><b>Kategori : </b><?= $value['nama_kategori']; ?><br>
                     <b>Pengarang : </b><?= $value['nama_pengarang']; ?><br>
                     <b> Penerbit : </b><?= $value['nama_penerbit']; ?><br>
                     <b>Rak : </b><?= $value['nama_rak']; ?> lantai <?= $value['lantai_rak']; ?>
                     </p>
                  
              </td>
                <td><?= $value['isbn']; ?></td>
                <td><?= $value['tahun']; ?></td>
                <td><?= $value['bahasa']; ?></td>
                <td><?= $value['halaman']; ?></td>
                <td><?= $value['jumlah']; ?></td>
                
                <td>
                  <a href="<?= base_url('Buku/EditData/'. $value['id_buku'] ) ?>" class="btn btn-warning btn-flat btn-sm" >
                  <i class="fas fa-edit"></i>
                  </a>
                  <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value['id_buku'] ?>">
                  <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>

             <?php } ?> 
              
            </tbody>

          </table>
        </div>

    </div>

  </div>

  <!-- delete angggota -->
  <?php foreach($buku as $key => $value) {?>

    <div class="modal fade" id="modal-delete<?= $value['id_buku']?>">
      <div class="modal-dialog modal-sms">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit <?= $judul ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" >&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo form_open(base_url('Buku/DeleteData/'. $value['id_buku'])) ?>
            <div class="form-group">
              Apakah Anda Yakin Menghapus data <?= $value['judul_buku'] ?>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-danger btn-flat">Delet</button>
          </div>
          <?php echo form_close() ?>
        </div>
      </div>

    </div>

    <?php } ?>