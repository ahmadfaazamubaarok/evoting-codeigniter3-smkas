<?php $this->load->view('admin/_partials/head') ?>
<?php $this->load->view('admin/_partials/sidebar') ?>
<!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark">Admin/</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark">Pilihan/</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Tambah pilihan</h6>
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
            <div class="card-body d-flex justify-content-between">
              <div>
              	<h4>Tambah pilihan</h4>
              	<p class="mb-1 pt-2 text-bold">Isikan Nama, foto, dan deskripsi untuk pilihan baru</p>
              </div>             
            </div>
            <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data">
                <input class="form-control mb-4" type="text" name="nama" placeholder="Nama pilihan" required>
                <input accept=".png,.jpeg,.jpg" class="form-control mb-4" type="file" name="thumbnail" placeholder="Foto pilihan" required>

                <div id="editor"></div>
                <input type="hidden" name="deskripsi" value="" required>

                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn bg-gradient-primary mt-3">Tambahkan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>      
    </div>
<?php $this->load->view('admin/_partials/footer') ?>