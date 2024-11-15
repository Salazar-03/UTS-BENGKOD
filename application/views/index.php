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
  <link rel="stylesheet" href="<?=base_url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/js/select.dataTables.min.css')?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url('assets/css/vertical-layout-light/style.css')?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url('assets/images/favicon.png')?>" />
</head>
<body>
  <div class="container-scroller"> 
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="<?=base_url('assets/images/logo.svg')?>" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="<?=base_url('assets/images/logo-mini.svg')?>" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Welcome, <span class="text-black fw-bold"><?=$user['username']?></span></h1>
            <h3 class="welcome-sub-text">Selamat Datang di Poliklinik </h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="<?=base_url('assets/images/faces/face8.jpg')?>" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="<?=base_url('assets/images/faces/face8.jpg')?>" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold"><?=$user['username']?></p>
              </div>
              <a class="dropdown-item" href="<?=base_url('welcome/logout')?>"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('welcome')?>">
              <i class="mdi mdi-view-dashboard menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Manage Data</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-database"></i>
              <span class="menu-title">Data Master</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?=base_url('welcome/data_dokter_page')?>">Data Dokter</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?=base_url('welcome/data_pasien_page')?>">Data Pasien</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('welcome/data_periksa_page')?>">
              <i class="mdi mdi-heart-pulse menu-icon"></i>
              <span class="menu-title">Data Periksa</span>
            </a>
          </li>
          <li class="nav-item nav-category">Auth</li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('welcome/logout')?>">
              <i class="mdi mdi-logout menu-icon"></i>
              <span class="menu-title">Sign Out</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                    </li>
                  </ul>
                </div>
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="statistics-details d-flex align-items-center justify-content-between">
                          <div>
                            <p class="statistics-title">Dokter</p>
                            <h3 class="rate-percentage"><?=$dokter?></h3>
                          </div>
                          <div>
                            <p class="statistics-title">Pasien</p>
                            <h3 class="rate-percentage"><?=$pasien?></h3>
                          </div>
                          <div>
                            <p class="statistics-title">Total Periksa</p>
                            <h3 class="rate-percentage"><?=$periksa?></h3>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title"></p>
                            <h3 class="rate-percentage"></h3>
                            <p class="text-success d-flex"><span></span></p>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title"></p>
                            <h3 class="rate-percentage"></h3>
                            <p class="text-danger d-flex"><span></span></p>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title"></p>
                            <h3 class="rate-percentage"></h3>
                            <p class="text-success d-flex"><span></span></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?=base_url('assets/vendors/js/vendor.bundle.base.js')?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?=base_url('assets/vendors/chart.js/Chart.min.js')?>"></script>
  <script src="<?=base_url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')?>"></script>
  <script src="<?=base_url('assets/vendors/progressbar.js/progressbar.min.js')?>"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?=base_url('assets/js/off-canvas.js')?>"></script>
  <script src="<?=base_url('assets/js/hoverable-collapse.js')?>"></script>
  <script src="<?=base_url('assets/js/template.js')?>"></script>
  <script src="<?=base_url('assets/js/settings.js')?>"></script>
  <script src="<?=base_url('assets/js/todolist.js')?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?=base_url('assets/js/dashboard.js')?>"></script>
  <script src="<?=base_url('assets/js/Chart.roundedBarCharts.js')?>"></script>
  <!-- End custom js for this page-->
</body>

</html>

