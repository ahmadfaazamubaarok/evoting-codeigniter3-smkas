<?php $this->load->view('admin/_partials/head') ?>
<?php $this->load->view('admin/_partials/sidebar') ?>
<!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark">Admin</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark">Pemilih</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah</li>
          </ol><h6>Petunjuk</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4" data-aos="fade-up">
            <div class="card-body">
              <div class="card-header d-flex justify-content-between">
                <a href="<?= site_url('admin/pemilih/tambah_pemilih') ?>" style="margin-right: 30px;">
                  <i class="ri-arrow-left-line"></i>
                </a>
                <div class=" w-100">
                  <h4>Petunjuk Import Excel</h4>
                </div>
              </div>             

              <div class="row">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                  <img src="<?= base_url('aset/gambar/petunjuk_import.png') ?>" class="img-fluid shadow border-radius-xl mb-4" style="width: 100%">
                </div>
                <div class="col-lg-8">
                  <pre data-aos="fade-up" data-aos-delay="200">
Pastikan data yang akan diunggah sudah disiapkan dalam bentuk file Excel (.xlsx atau .xls).
Letakkan kolom username pada kolom pertama (kolom A).
Letakkan kolom email pada kolom kedua (kolom B).
                  </pre>
                  <?= form_open_multipart('admin/pemilih/import_excel') ?>
                    <input type="file" class="form-control mb-3" id="importexcel" name="importexcel" accept=".xlsx,.xls" style="margin-right:20px;" data-aos="fade-up" data-aos-delay="300">
                    <div class="d-flex justify-content-end" data-aos="fade-up" data-aos-delay="400">
                      <button type="submit" class="btn bg-gradient-success" onClick="return confirm('Pastikan file yang diupload sesuai dengan ketentuan!')">Import</button> 
                    </div>                        
                  <?= form_close(); ?> 
              </div>
            </div>    
          </div>
        </div>
      </div>
    </div>      
  </div>
<?php $this->load->view('admin/_partials/footer') ?>