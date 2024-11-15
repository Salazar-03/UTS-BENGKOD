<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Poliklinik </title>
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
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="<?=base_url('assets/images/faces/face1.jpg')?>" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="<?=base_url('assets/images/faces/face2.jpg')?>" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="<?=base_url('assets/images/faces/face3.jpg')?>" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="<?=base_url('assets/images/faces/face4.jpg')?>" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="<?=base_url('assets/images/faces/face5.jpg')?>" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="<?=base_url('assets/images/faces/face6.jpg')?>" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
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
                <button type="button" class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#tambahDataModal">Tambah Data</button>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Dokter</h4>
                        <div id="successDelete" class="text-success"></div>
                        <div id="failedDelete" class="text-danger"></div>
                        <div id="successUpdate" class="text-success"></div>
                        <div id="failedUpdate" class="text-danger"></div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Nama Dokter</th>
                                <th>Alamat</th>
                                <th>Nomor HP</th>
                                <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($dokter){ $x=1; foreach($dokter as $dokters){?>
                                <tr>
                                <td><?=$x++;?></td>
                                <td><?=$dokters['nama']?></td>
                                <td><?=$dokters['alamat']?></td>
                                <td><?=$dokters['no_hp']?></td>
                                <td>
                                    <button type="button" class="btn btn-warning ubahData" data-bs-toggle="modal" data-bs-target="#ubahDataModal" data-id="<?=$dokters['id']?>">Ubah</button>
                                    <button type="button" class="btn btn-danger hapusData" data-id='<?=$dokters['id']?>'>Hapus</button>
                                </td>
                                </tr>
                                <?php }}?>
                            </tbody>
                            </table>
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


    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Dokter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formTambahData">
                        <label for="namaDokter" class="form-label">Nama Dokter</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input type="text" class="form-control" id="namaDokter" name="namaDokter" required>
                        </div>
                        <div id="errorNamaDokter" class="text-danger"></div>

                        <label for="alamatDokter" class="form-label">Alamat Dokter</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="mdi mdi-home"></i></div>
                            </div>
                            <input type="text" class="form-control" id="alamatDokter" name="alamatDokter" required>
                        </div>
                        <div id="errorAlamatDokter" class="text-danger"></div>

                        <label for="nomorHP" class="form-label">No Handphone Dokter</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="mdi mdi-cellphone"></i></div>
                            </div>
                            <input type="number" class="form-control" id="nomorHP" name="nomorHP" required>
                        </div>
                        <div id="errorNomorHP" class="text-danger"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="simpanData()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ubah Data -->
    <div class="modal fade" id="ubahDataModal" tabindex="-1" aria-labelledby="ubahDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubahDataModalLabel">Ubah Data Dokter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formUbahData">
                        <input type="hidden" class="form-control" id="id_dokter" name="id_dokter" required>
                        <label for="namaDokterUpdate" class="form-label">Nama Dokter</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input type="text" class="form-control" id="namaDokterUpdate" name="namaDokterUpdate" required>
                        </div>
                        <div id="errorNamaDokterUpdate" class="text-danger"></div>

                        <label for="alamatDokterUpdate" class="form-label">Alamat Dokter</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="mdi mdi-home"></i></div>
                            </div>
                            <input type="text" class="form-control" id="alamatDokterUpdate" name="alamatDokterUpdate" required>
                        </div>
                        <div id="errorAlamatDokterUpdate" class="text-danger"></div>

                        <label for="nomorHPUpdate" class="form-label">No Handphone Dokter</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="mdi mdi-cellphone"></i></div>
                            </div>
                            <input type="number" class="form-control" id="nomorHPUpdate" name="nomorHPUpdate" required>
                        </div>
                        <div id="errorNomorHPUpdate" class="text-danger"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="updateData()">Update</button>
                </div>
            </div>
        </div>
    </div>


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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- End custom js for this page-->
    <script>
      function simpanData() {
        // Bersihkan pesan error sebelumnya
        $('#errorNamaDokter').text('');
        $('#errorAlamatDokter').text('');
        $('#errorNomorHP').text('');

        $.ajax({
          url: '<?php echo site_url("welcome/proses_data_dokter"); ?>',
          type: 'POST',
          data: $('#formTambahData').serialize(),
          dataType: 'json',
          success: function(response) {
            if (response.status === 'error') {
              // Jika terdapat error, tampilkan di form
              $('#errorNamaDokter').text(response.errors.namaDokter);
              $('#errorAlamatDokter').text(response.errors.alamatDokter);
              $('#errorNomorHP').text(response.errors.nomorHP);
            } else if (response.status === 'success') {
              // Jika berhasil, tutup modal dan tampilkan pesan sukses
              $('#tambahDataModal').modal('hide');
              alert(response.message);
              location.reload();
            }
          }
        });
      }
      
      function updateData() {
        // Bersihkan pesan error sebelumnya
        $('#errorNamaDokterUpdate').text('');
        $('#errorAlamatDokterUpdate').text('');
        $('#errorNomorHPUpdate').text('');

        $('#successUpdate').text('');
        $('#failedUpdate').text('');

        $.ajax({
          url: '<?php echo site_url("welcome/proses_update_dokter"); ?>',
          type: 'POST',
          data: $('#formUbahData').serialize(),
          dataType: 'json',
          success: function(response) {
            if (response.status === 'error') {
              // Jika terdapat error, tampilkan di form
              $('#errorNamaDokterUpdate').text(response.errors.namaDokterUpdate);
              $('#errorAlamatDokterUpdate').text(response.errors.alamatDokterUpdate);
              $('#errorNomorHPUpdate').text(response.errors.nomorHPUpdate);
              localStorage.setItem('failedUpdate', 'Gagal mengupdate data dokter.');
            } else if (response.status === 'success') {
              // Jika berhasil, tutup modal dan tampilkan pesan sukses
              $('#ubahDataModal').modal('hide');
              localStorage.setItem('successUpdate', 'Berhasil mengupdate data dokter.');
              location.reload();
            }
          }
        });
      }

        $(document).ready(function() {
          // Tampilkan pesan successDelete jika ada di localStorage
          if (localStorage.getItem('successDelete')) {
              $('#successDelete').text(localStorage.getItem('successDelete'));
              localStorage.removeItem('successDelete'); // Hapus pesan dari localStorage setelah ditampilkan
          }

          if (localStorage.getItem('successUpdate')) {
            $('#successUpdate').text(localStorage.getItem('successUpdate'));
            localStorage.removeItem('successUpdate'); // Hapus pesan dari localStorage setelah ditampilkan
          }

          $('.ubahData').click(function(event) {
            event.preventDefault();

            var id_dokter = $(this).data('id');

            $.ajax({
              url: '<?= base_url("welcome/get_data_dokter") ?>',
              type: 'POST',
              data: {id_dokter:id_dokter},
              dataType: 'json',
              success: function(data) {
                if (data) {
                  // Isi field di dalam modal dengan data yang didapat
                  $('#formUbahData input[name="id_dokter"]').val(data.id);
                  $('#formUbahData input[name="namaDokterUpdate"]').val(data.nama);
                  $('#formUbahData input[name="alamatDokterUpdate"]').val(data.alamat);
                  $('#formUbahData input[name="nomorHPUpdate"]').val(data.no_hp);
                } else {
                  alert('Data not found');
                }
              },
              error: function() {
                Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
              }
            });
          });

          $('.hapusData').click(function(event) {
            event.preventDefault();

            $('#successDelete').text('');
            $('#failedDelete').text('');

            var id_dokter = $(this).data('id');

            Swal.fire({
              title: 'Anda Yakin Untuk Menghapus Data?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, saya yakin',
              cancelButtonText: 'Tidak',
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: '<?= base_url("welcome/delete_data_dokter") ?>',
                  type: 'POST',
                  data: { id_dokter: id_dokter },
                  dataType: 'json',
                  success: function(response) {
                    if (response.status === 'success') {
                      // Simpan pesan sukses di localStorage sebelum halaman di-refresh
                      localStorage.setItem('successDelete', 'Berhasil menghapus data dokter.');
                      location.reload(); // Refresh halaman
                    } else {
                      $('#failedDelete').text('Gagal menghapus data dokter');
                    }
                  },
                  error: function() {
                    Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                  }
                });
              }
            });
          });
        });
    </script>
</body>

</html>

