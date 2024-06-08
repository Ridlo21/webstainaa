<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- <meta name="author" content="phpmu.com"> -->
  <link href="http://localhost/stai_naa/asset_web/stainaa.png" rel="icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/asset/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/asset/admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/asset/admin/plugins/iCheck/square/blue.css">
  <style type="text/css">
    .form-group {
      margin-bottom: 5px !important;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>ADMIN</b> Login</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Silahkan Login Pada Form dibawah ini</p>
      <?php
      echo $this->session->flashdata('message');
      echo $this->session->unset_userdata('message');
      echo form_open($this->uri->segment(1) . '/index');
      ?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name='a' placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name='b' placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <?php //echo $image; 
        ?>
      </div>
      <div class="form-group has-feedback">
        <!-- <input type="text" class="form-control" name='security_code' placeholder="Security Code" required> -->
      </div>

      <div class="row" style="margin-top: 10px;">
        <div class="col-xs-8">
          <a id="reset" class="btn btn-info btn-block btn-flat" >Forgot Password?</a>
        </div><!-- /.col -->
        <div class="col-xs-4">
          <input name='submit' type="submit" class="btn btn-primary btn-block btn-flat" value='Sign In'>
        </div><!-- /.col -->
      </div>
      </form>
      <br><a class='link' href='<?php echo base_url(); ?>'><span class='fa fa-arrow-left'></span> Kembali ke Halaman Awal</a>
    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->

  <!-- jQuery 2.1.4 -->
  <script src="<?php echo base_url(); ?>/asset/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="<?php echo base_url(); ?>/asset/admin/bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url(); ?>/asset/admin/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });

      setTimeout(() => {
        $('.alert').remove()
      }, 1000);

      $('#reset').on('click', function () {
        var a = confirm('apakah anda yakin untuk mereset password  anda!!');
        if (a == true) {
          window.location.href = "<?= base_url() ?>administrator/resetpassword"
        }
      });
      
    });
  </script>
</body>

</html>