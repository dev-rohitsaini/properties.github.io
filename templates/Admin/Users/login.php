

<!DOCTYPE html>
<html lang="en">
<head>
<?php 
// $this->layout = false;
$this->disableAutoLayout('new');
?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>
  <?= $this->Html->CSS('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')  ?>
  <?= $this->Html->CSS('../plugins/fontawesome-free/css/all.min')  ?>
    <?= $this->Html->CSS('../plugins/datatables-bs4/css/dataTables.bootstrap4.min')  ?>
    <?= $this->Html->CSS('../plugins/datatables-responsive/css/responsive.bootstrap4.min')  ?>
    <?= $this->Html->CSS('../plugins/icheck-bootstrap/icheck-bootstrap.min.css')  ?>
    <?= $this->Html->CSS('../plugins/datatables-buttons/css/buttons.bootstrap4.min')  ?>
    <?= $this->Html->CSS('../dist/css/adminlte.min.css')  ?>
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?= $this->Form->create(null, ['id' => 'form']) ?>
        <div class="input-group mb-3">
        <?= $this->Form->control('email', ['required' => false, 'class' => 'form-control']) ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <?= $this->Form->control('password', ['required' => false, 'class' => 'form-control']) ?>
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
          <?= $this->Form->submit(__('Login'), [' class' => 'btn btn-primary btn-block']); ?>
          </div>
          <!-- /.col -->
        </div>
        <?= $this->Form->end() ?>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="#" class="text-center">Register a new membership</a>
      </p>
    </div>

  </div>
</div>

<?= $this->Html->Script('../plugins/jquery/jquery.min')  ?>
        <?= $this->Html->Script('../plugins/bootstrap/js/bootstrap.bundle.min')  ?>
        <?= $this->Html->Script('../plugins/datatables/jquery.dataTables.min')  ?>
        <?= $this->Html->Script('../plugins/datatables-bs4/js/dataTables.bootstrap4.min')  ?>
        <?= $this->Html->Script('../plugins/datatables-responsive/js/dataTables.responsive.min')  ?>
        <?= $this->Html->Script('../plugins/datatables-responsive/js/responsive.bootstrap4.min')  ?>
        <?= $this->Html->Script('../plugins/datatables-buttons/js/dataTables.buttons.min')  ?>
        <?= $this->Html->Script('../plugins/datatables-buttons/js/buttons.bootstrap4.min')  ?>
        <?= $this->Html->Script('../plugins/jszip/jszip.min')  ?>
        <?= $this->Html->Script('../plugins/pdfmake/pdfmake.min')  ?>
        <?= $this->Html->Script('../plugins/datatables-buttons/js/buttons.html5.min')  ?>
        <?= $this->Html->Script('../plugins/datatables-buttons/js/buttons.print.min')  ?>
        <?= $this->Html->Script('../plugins/datatables-buttons/js/buttons.colVis.min')  ?>
        <?= $this->Html->Script('../dist/js/adminlte.min')  ?>
        <?php  echo $this->Html->script('jquery-3.6.0.min.js');
  echo $this->Html->script('jquery.validate.js');
echo $this->Html->script('regit.js');?>

</body>
</html>










