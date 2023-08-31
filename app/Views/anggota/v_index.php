<div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title"> Data <?= $judul ?></h3>
          <div class="card-tools">
            <a href="<?= base_url('Verifikasi/AddData') ?>" class="btn btn-primary btn-flat btn-sm"  data-target="#modal-sm">
            <i class="fas fa-plus"></i>Add
            </a>
          </div>
      </div>

      <div class="card-body">
     

    
      <?php 
      //pesan 

                        use App\Controllers\Verifikasi;

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
                <th >foto</th>
                <th>Nama Siswa</th>
                <th >Kelas</th>
                <th >Jenis Kelamin </th>
                <th >No Handpone</th>
               
                <th >pasword</th>
               
                <th >Action</th>

            </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($anggota as $key => $value) {?>
              <tr>
                <td><?= $no++ ?></td>
                <td><img class="profile-user-img img-fluid " src="<?= base_url('foto/' . $value['foto']) ?>" alt="User profile picture"></td>
                <td><?= $value['nama_siswa']; ?><br>
                 <?php 
                 if ($value['verifikasi'] == 1) { ?>
                    <a class="text-succes"><i class="fa fa-check-circle "></i>verifikasi</a>
                <?php   } else  { ?>
                    <a class="text-danger"><i class="fas fa-times "></i>Belum Verifikasi</a><br>
                   <a class="text-warning" href="<?= base_url('Verifikasi/Verifikasi/'. $value['id_anggota']) ?>">Silahkan Verifikasi</a>
                 <?php  }
                 ?>
              </td>
                <td><?= $value['nama_kelas']; ?></td>
                <td><?= $value['jenis_kelamin']; ?></td>
                <td><?= $value['no_hp']; ?></td>
                <td><?= $value['pasword']; ?></td>
                
                <td>
                  <a href="<?= base_url('Verifikasi/EditData/'. $value['id_anggota'] ) ?>" class="btn btn-warning btn-flat btn-sm" >
                  <i class="fas fa-edit"></i>
                  </a>
                  <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value['id_anggota'] ?>">
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
  <?php foreach($anggota as $key => $value) {?>

    <div class="modal fade" id="modal-delete<?= $value['id_anggota']?>">
      <div class="modal-dialog modal-sms">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit <?= $judul ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" >&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo form_open(base_url('Verifikasi/DeleteData/'. $value['id_anggota'])) ?>
            <div class="form-group">
              Apakah Anda Yakin Menghapus data <?= $value['nama_siswa'] ?>
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