<?php $this->load->view('admin/_partials/head') ?>
<?php $this->load->view('admin/_partials/sidebar') ?>
<!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark">Admin</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Setting</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Profil Admin</h6>
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
    <div class="container-fluid" data-aos="fade-up">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('<?= base_url('upload/tema/' . $tema) ?>'); background-position-y: 50%;">
        <span class="mask  opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
      <p class="text-white bg-gradient-success d-flex justify-content-center mb-1" style="margin:0px 30px 0px 0px; border-radius:5px; padding: 0px 20px 0px 20px;"><?= $this->session->flashdata('password_ganti') ?></p>
      <p class="text-white bg-gradient-success d-flex justify-content-center mb-1" style="margin:0px 30px 0px 0px; border-radius:5px; padding: 0px 20px 0px 20px;"><?= $this->session->flashdata('profil_ganti') ?></p>
        <div class="row gx-4">
          <div class="col-lg-6">
            <h5 class="mb-1" data-aos="fade-up" data-aos-delay="150">
              <?= $admin->username ?>
            </h5>
            <p class="mb-3 font-weight-bold text-sm" data-aos="fade-up" data-aos-delay="200">
              <?= $admin->email ?>
            </p>
            <p>Terahkir ubah password: <?= $admin->last_edit_password ?></p>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">

                <li class="nav-item" role="presentation" data-aos="fade-up" data-aos-delay="250">
                  <a href="<?= site_url('admin/setting/edit_profil') ?>" class="nav-link mb-0 px-0 py-1">
                    <span class="ms-1">Ubah Profil</span>
                  </a>
                </li>
                <li class="nav-item" role="presentation" data-aos="fade-up" data-aos-delay="300">
                  <a href="<?= site_url('admin/setting/edit_password') ?>" class="nav-link mb-0 px-0 py-1 ">
                    <i></i>
                    <span class="ms-1">Ubah Password</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php $this->load->view('admin/_partials/footer') ?>
