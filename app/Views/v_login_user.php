<div class="login-box">
<div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= base_url('AdminLTE') ?>/index2.html" class="h1"><b>Login</b>Admin</a>
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

      
<?php echo form_open('Auth/CekLoginUser') ?>
     
        <div class="input-group mb-3">
          <input type="email" name="email"   class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="pasword" name="pasword" class="form-control" placeholder="Pasword">
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
            <button type="submit" class="btn btn-primary btn-block" >Sign In</button>
          </div>
          <!-- /.col -->
        </div>
    
      
      <!-- /.social-auth-links -->

      
      <p class="mb-0">
        <a href="<?= base_url()  ?>" class="text-center">Back</a>
      </p>
    </div>
    <?php echo form_close() ?>
    <!-- /.card-body -->
  </div>
  </div>