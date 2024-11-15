<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Poliklinik</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url('assets/vendors/feather/feather.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/mdi/css/materialdesignicons.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/ti-icons/css/themify-icons.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/typicons/typicons.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/simple-line-icons/css/simple-line-icons.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/css/vendor.bundle.base.css')?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url('assets/css/vertical-layout-light/style.css')?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url('assets/images/favicon.png')?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?=base_url('assets/images/logo.svg')?>" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="fw-light">Sign in to start session.</h6>
              <!-- Tampilkan pesan sukses atau error -->
              <?php if ($this->session->flashdata('success')): ?>
                  <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
              <?php endif; ?>
              <?php if ($this->session->flashdata('error')): ?>
                  <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
              <?php endif; ?>
              <form action="<?= base_url('welcome/login_auth'); ?>" method="post" class="pt-3">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" name="username" placeholder="Username">
                  <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="pass" placeholder="Password">
                  <?= form_error('pass', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn tombolLogin">SIGN IN</button>
                </div>
                <div class="text-center mt-4 fw-light">
                  Belum punya akun? <a href="<?=base_url('welcome/daftar_page')?>" class="text-primary">Sign Up</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?=base_url('assets/vendors/js/vendor.bundle.base.js')?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?=base_url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')?>"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?=base_url('assets/js/off-canvas.js')?>"></script>
  <script src="<?=base_url('assets/js/hoverable-collapse.js')?>"></script>
  <script src="<?=base_url('assets/js/template.js')?>"></script>
  <script src="<?=base_url('assets/js/settings.js')?>"></script>
  <script src="<?=base_url('assets/js/todolist.js')?>"></script>
</body>

</html>
