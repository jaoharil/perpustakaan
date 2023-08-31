<div class="login-box">
<div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= base_url('Auth') ?>" class="h1"><b>Login</b>Anggota</a>
    </div>
    <div class="card-body">
    <?php 
    //notif
    $errors = session() ->getFlashdata('errors');
    if (!empty($errors)) { ?>
      <div class="alert alert-denger" role="alert">
        <h4>periksa empty form</h4>
        <ul>
        <?php foreach ($errors as $key => $error) {?>
           <li><?= esc($error); ?></li>
        <?php }?>
        </ul>
      </div>


    <?php } ?>

    
    <?php 
    //pesan 
    if (session() ->getFlashdata('pesan') ){
      echo '<div class="alert alert-denger" role="alert">';
      echo (session() ->getFlashdata('pesan') );
      echo '</div>';
    }
    ?>
      <?php echo form_open('Auth/CekLoginAnggota') ?>
        <div class="input-group mb-3">
          <input type="taxt" class="form-control" name="nis" placeholder="NIS">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="pasword" placeholder="Pasword">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
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
            <button type="submit" class="btn btn-primary btn-block" >Login</button>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close() ?>
      <div class="social-auth-links text-center mb-3">
        <br>
        <br>
          <a href=" <?= base_url('Auth/Register') ?> " class="btn btn-block btn-warning">
          <i class="fa fa-user-plus "></i> new register
            </a>
             
              </div>
      
      <!-- /.social-auth-links -->

      <p class="mb-0">
        <a href="<?= base_url()  ?>" class="text-center">Back</a>
      </p>
      
    </div>
    <!-- /.card-body -->
  </div>
  </div>