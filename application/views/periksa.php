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
                <button type="button" class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#tambahDataModal">Tambah Data</button>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Periksa</h4>
                        <div id="successDelete" class="text-success"></div>
                        <div id="failedDelete" class="text-danger"></div>
                        <div id="successUpdate" class="text-success"></div>
                        <div id="failedUpdate" class="text-danger"></div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>Nama Dokter</th>
                                <th>Tanggal Periksa</th>
                                <th>Catatan</th>
                                <th>Obat</th>
                                <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($periksa){ $x=1; foreach($periksa as $perikso){?>
                                <tr>
                                <td><?=$x++;?></td>
                                <td><?=$perikso['nama_pasien']?></td>
                                <td><?=$perikso['nama_dokter']?></td>
                                <td><?=$perikso['tgl_periksa']?></td>
                                <td><?=$perikso['catatan']?></td>
                                <td><?=$perikso['obat']?></td>
                                <td>
                                    <button type="button" class="btn btn-warning ubahData"  data-bs-toggle="modal" data-bs-target="#ubahDataModal" data-id="<?=$perikso['id']?>">Ubah</button>
                                    <button type="button" class="btn btn-danger hapusData" data-id='<?=$perikso['id']?>'>Hapus</button>
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
                    <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Periksa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formTambahData">
                        <label for="namaPasien" class="form-label">Pasien</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="input-group mdi mdi-account"></i></div>
                            </div>
                            <select name="pasien" class="form-control" id="pasien" style="background-color: #ffffff; color: #000000;">
                                <option value="">Pilih Pasien</option>
                                <?php foreach($pasien as $listpasien){?>
                                <option value="<?=$listpasien['id']?>"><?=$listpasien['nama']?></option>
                                <?php }?>
                                <!-- Data pasien akan diisi dengan AJAX -->
                            </select>
                        </div>
                        <div id="errorPasien" class="text-danger"></div>

                        <label for="dokter" class="form-label">Dokter</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="input-group mdi mdi-stethoscope"></i></div>
                            </div>
                            <select name="dokter" class="form-control" id="dokter" style="background-color: #ffffff; color: #000000;">
                                <option value="">Pilih Dokter</option>
                                <?php foreach($dokter as $listdokter){?>
                                <option value="<?=$listdokter['id']?>"><?=$listdokter['nama']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div id="errorDokter" class="text-danger"></div>

                        <label for="tgl" class="form-label">Tanggal Periksa</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="input-group mdi mdi-calendar"></i></div>
                            </div>
                            <input type="datetime-local" class="form-control" id="tgl" name="tgl" required>
                        </div>
                        <div id="errorTgl" class="text-danger"></div>

                        <label for="catatan" class="form-label">Catatan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="input-group mdi mdi-note-text"></i></div>
                            </div>
                            <input type="text" class="form-control" id="catatan" name="catatan" required>
                        </div>
                        <div id="errorCatatan" class="text-danger"></div>

                        <label for="obat" class="form-label">Obat</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="input-group mdi mdi-hospital"></i></div>
                            </div>
                            <input type="text" class="form-control" id="obat" name="obat" required>
                        </div>
                        <div id="errorObat" class="text-danger"></div>
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
                    <h5 class="modal-title" id="ubahDataModalLabel">Ubah Data Periksa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formUbahData">
                        <input type="hidden" class="form-control" id="id_periksa" name="id_periksa" required>
                        <label for="namaPasienUpdate" class="form-label">Nama Pasien</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <div class="input-group-text"><i class="mdi mdi-account"></i></div>
                          </div>
                          <select name="pasienUpdate" class="form-control" id="pasienUpdate" style="background-color: #ffffff; color: #000000;">
                              <option value="">Pilih Pasien</option>
                              <?php foreach($pasien as $listpasien){?>
                              <option value="<?=$listpasien['id']?>"><?=$listpasien['nama']?></option>
                              <?php }?>
                              <!-- Data pasien akan diisi dengan AJAX -->
                          </select>                        
                        </div>
                        <div id="errorNamaPasienUpdate" class="text-danger"></div>

                        <label for="namaDokterUpdate" class="form-label">Nama Dokter</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <div class="input-group-text"><i class="mdi mdi-stethoscope"></i></div>
                          </div>
                          <select name="dokterUpdate" class="form-control" id="dokterUpdate" style="background-color: #ffffff; color: #000000;">
                            <option value="">Pilih Dokter</option>
                            <?php foreach($dokter as $listdokter){?>
                            <option value="<?=$listdokter['id']?>"><?=$listdokter['nama']?></option>
                            <?php }?>
                          </select>                      
                        </div>
                        <div id="errorNamaDokterUpdate" class="text-danger"></div>

                        <label for="tanggalPeriksaUpdate" class="form-label">Tanggal Periksa</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="mdi mdi-calendar"></i></div>
                            </div>
                            <input type="datetime-local" class="form-control" id="tanggalPeriksaUpdate" name="tanggalPeriksaUpdate" required>
                        </div>
                        <div id="errorTanggalPeriksaUpdate" class="text-danger"></div>

                        <label for="catatanUpdate" class="form-label">Catatan Periksa</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="mdi mdi-note-text"></i></div>
                            </div>
                            <input type="text" class="form-control" id="catatanUpdate" name="catatanUpdate" required>
                        </div>
                        <div id="errorCatatanUpdate" class="text-danger"></div>

                        <label for="obatUpdate" class="form-label">Obat</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="mdi mdi-hospital"></i></div>
                            </div>
                            <input type="text" class="form-control" id="obatUpdate" name="obatUpdate" required>
                        </div>
                        <div id="errorObatUpdate" class="text-danger"></div>
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
        function updateData() {
            // Bersihkan pesan error sebelumnya
            $('#errorNamaDokterUpdate').text('');
            $('#errorNamaPasienUpdate').text('');
            $('#errorTanggalPeriksaUpdate').text('');
            $('#errorCatatanUpdate').text('');
            $('#errorObatUpdate').text('');

            $.ajax({
                url: '<?= base_url("welcome/proses_update_periksa"); ?>',
                type: 'POST',
                data: $('#formUbahData').serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'error') {
                        // Jika terdapat error, tampilkan di form
                        $('#errorNamaDokterUpdate').text(response.errors.dokterUpdate);
                        $('#errorNamaPasienUpdate').text(response.errors.pasienUpdate);
                        $('#errorTanggalPeriksaUpdate').text(response.errors.tanggalPeriksaUpdate);
                        $('#errorCatatanUpdate').text(response.errors.catatanUpdate);
                        $('#errorObatUpdate').text(response.errors.obatUpdate);
                    } else if (response.status === 'success') {
                        // Jika berhasil, tutup modal dan tampilkan pesan sukses
                        $('#ubahDataModal').modal('hide');
                        localStorage.setItem('successUpdate', 'Berhasil mengupdate data periksa.');
                        location.reload(); // Refresh halaman
                    }
                }
            });
        }

        function simpanData() {
            // Bersihkan pesan error sebelumnya
            $('#errorDokter').text('');
            $('#errorPasien').text('');
            $('#errorTgl').text('');
            $('#errorCatatan').text('');
            $('#errorObat').text('');

            $.ajax({
                url: '<?= base_url("welcome/proses_data_periksa"); ?>',
                type: 'POST',
                data: $('#formTambahData').serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'error') {
                        // Jika terdapat error, tampilkan di form
                        $('#errorDokter').text(response.errors.dokter);
                        $('#errorPasien').text(response.errors.pasien);
                        $('#errorTgl').text(response.errors.tgl);
                        $('#errorCatatan').text(response.errors.catatan);
                        $('#errorObat').text(response.errors.obat);
                    } else if (response.status === 'success') {
                        // Jika berhasil, tutup modal dan tampilkan pesan sukses
                        $('#tambahDataModal').modal('hide');
                        alert(response.message);
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

              const id_periksa = $(this).data('id');

              // AJAX untuk mengambil data pasien, dokter, dan periksa (jika ada ID)
              $.ajax({
                url: '<?= base_url("welcome/get_data_periksa_spesifik") ?>',
                type: 'POST',
                data: { id: id_periksa },
                dataType: 'json',
                success: function(data) {
                  // Kosongkan dropdown
                  $('#pasienUpdate').empty().append('<option value="">Pilih Nama Pasien</option>');
                  $('#dokterUpdate').empty().append('<option value="">Pilih Nama Dokter</option>');

                  // Isi dropdown pasien
                  data.pasien.forEach(function(pasien) {
                    $('#pasienUpdate').append(`<option value="${pasien.id}">${pasien.nama}</option>`);
                  });

                  // Isi dropdown dokter
                  data.dokter.forEach(function(dokter) {
                    $('#dokterUpdate').append(`<option value="${dokter.id}">${dokter.nama}</option>`);
                  });

                  // Isi data periksa ke form jika data periksa ada
                  if (data.periksa) {
                    $('#id_periksa').val(data.periksa.id);
                    $('#pasienUpdate').val(data.periksa.id_pasien);
                    $('#dokterUpdate').val(data.periksa.id_dokter);
                    $('#tanggalPeriksaUpdate').val(data.periksa.tgl_periksa);
                    $('#catatanUpdate').val(data.periksa.catatan);
                    $('#obatUpdate').val(data.periksa.obat);
                  } else {
                    alert('Data periksa tidak ditemukan');
                  }
                },
                error: function() {
                  alert('Terjadi kesalahan saat mengambil data');
                }
              });
            });

            $('.hapusData').click(function(event) {
                event.preventDefault();

                $('#successDelete').text('');
                $('#failedDelete').text('');

                var id_periksa = $(this).data('id');

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
                            url: '<?= base_url("welcome/delete_data_periksa") ?>',
                            type: 'POST',
                            data: { id_periksa: id_periksa },
                            dataType: 'json',
                            success: function(response) {
                                if (response.status === 'success') {
                                    // Simpan pesan sukses di localStorage sebelum halaman di-refresh
                                    localStorage.setItem('successDelete', 'Berhasil menghapus data periksa.');
                                    location.reload(); // Refresh halaman
                                } else {
                                    $('#failedDelete').text('Gagal menghapus data periksa');
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

