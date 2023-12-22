<?php $this->load->view('admin/_partials/head') ?>
<?php $this->load->view('admin/_partials/sidebar') ?>
<!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark">Admin</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark">Pilihan</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail</li>
          </ol>
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
                <a href="<?= site_url('admin/pilihan') ?>">
                  <i class="ri-arrow-left-line"></i>
                </a>
                <div class="d-flex justify-content-center" style="width: 100%;">
                  <h4>Detail <?= $pilihan_voting->nama_pilihan  ?></h4>
                </div>
              </div>             

              <div class="row">
                <div class="col-lg-3">
                  <img src="<?= base_url('upload/thumbnail/pilihan/' . $pilihan_voting->thumbnail) ?>" class="img-fluid shadow border-radius-xl mb-4" style="width: 100%">
                </div>
                <div class="col-lg-9">
                <p><?= $pilihan_voting->deskripsi ?></p>                  
              </div>
            </div>    
          </div>
        </div>
      </div>
    </div>      
  </div>
<?php $this->load->view('admin/_partials/footer') ?>