<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Special case header tidak perlu partial header -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login Antrian Admin</title>

    <!--Style bootstrap-->
    <link rel="stylesheet" href="<?php echo base_url();?>mods/bootstrap/css/bootstrap.min.css" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>mods/signin.css" rel="stylesheet" />
  </head>
  <body>
    <form class="border bg-light form-signin" method="POST" action="<?php echo base_url('admin/login/confirm');?>">
      <div class="row mb-3">
        <div class="col-md-2 col-2">
          <img class="" src="<?php echo base_url();?>mods/logopolije.png" alt="Politeknik Negeri Jember" width="180%"/>
        </div>
        <div class="col-md-10 col-10">
          <h1 class="h3 mb-3 font-weight-normal" style="text-align: left;">
            Login Admin Prodi
          </h1>
        </div>
      </div>
      <div class="form-group">
        <label for="user_antrian" class="sr-only">Username</label>
        <input type="text" id="user_antrian" name="user_antrian" class="form-control" placeholder="Username" autofocus/>
        <div class="text-danger">
          <?php
          if (isset($error_user)) {
            echo $error_user;
          }else{
            echo form_error('user_antrian');
          }
          ?>
        </div>
      </div>
      <div class="form-group">
        <label for="pass_antrian" class="sr-only">Password</label>
        <input type="password" id="pass_antrian" name="pass_antrian" class="form-control" placeholder="Password"/>
        <div class="text-danger">
          <?php if (isset($error_pass)){
            echo $error_pass;
          }else{
            echo form_error('pass_antrian');
          }?>
        </div>
      </div>

      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me" /> Ingat saya
        </label>
      </div> -->
      <button class="btn btn-lg btn-primary btn-block" type="submit">
        Masuk
      </button>
      <p class="mt-5 mb-3 text-muted" style="text-align: center;">
        &copy;
        <script>
          var dt = new Date();
          yy = dt.getFullYear();
          document.write("" + yy);
        </script>
      </p>
    </form>

    <?php $this->load->view('_partials/footer');?>
  </body>
</html>
