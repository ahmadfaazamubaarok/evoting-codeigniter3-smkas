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
          </ol>
          <h6 class="font-weight-bolder mb-0">Tambah pemilih</h6>
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
            <div class="card-body row">
              <a href="<?= site_url('admin/pemilih') ?>" style="margin-right: 30px;" class="col-1">
                <i class="ri-arrow-left-line"></i>
              </a>
              <div class="d-flex justify-content-between col-lg-10 ">
                <div>
                  
              	   <h4>Tambah pemillih</h4>
              	   <p class="mb-1 pt-2 text-bold">Klik upload untuk menambah pemilih dengan file Excel</p>
                </div>
              <a href="<?= site_url('admin/pemilih/import') ?>" class="badge bg-gradient-success col-lg-2" style="height: 35px; font-size: 16px;" data-aos="fade-up" data-aos-delay="100">
                Upload <i class="ri-upload-2-fill"></i>
              </a>                 
              </div>
            </div>
            <div class="card-body">
              <form action="" method="POST">
                <input class="form-control mb-4" type="text" name="username" placeholder="Username" required data-aos="fade-up" data-aos-delay="200">
                <input class="form-control mb-4" type="email" name="email" placeholder="Email" required data-aos="fade-up" data-aos-delay="300">
                <div class="d-flex justify-content-end" data-aos="fade-up" data-aos-delay="200">
                  <button type="submit" class="btn bg-gradient-primary mt-3">Tambahkan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>      
    </div>
<?php $this->load->view('admin/_partials/footer') ?>