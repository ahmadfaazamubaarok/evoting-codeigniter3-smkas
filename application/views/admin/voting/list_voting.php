<?php $this->load->view('admin/_partials/head') ?>
  <?php $this->load->view('admin/_partials/sidebar') ?>
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark">Admin</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Voting</li>
          </ol>
          <h6 class="font-weight-bolder mb-0"><?= $voting->judul_voting ?></h6>
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

      <div class="container-fluid">
        <div class="row">
            <div class="card mb-4 p-3">
            <h6 class="text-white bg-gradient-success d-flex justify-content-center mb-3" style="border-radius:5px; padding: 0px 20px 0px 20px;"><?= $this->session->flashdata('update') ?></h6>

              <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('<?= base_url('upload/tema/' . $voting->tema) ?>');">
                <span class="mask"></span>
                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                  <h3 class="text-white font-weight-bolder mb-4 pt-2" data-aos="fade-up"><?= $voting->judul_voting ?></h3>
                  <p class="text-white mb-5" data-aos="fade-up" data-aos-delay="50">Proyek PAS, Web Evoting dengan Codeigniter 3</p>
                </div>
              </div>
            </div>
          
            <div class="card" data-aos="fade-up" data-aos-delay="100">
              <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data" data-aos="fade-up" data-aos-delay="100">
                    <div class="d-flex justify-content-between mb-2 card-body" style="background-color: whitesmoke; border-radius:5px;">
                      <label>Status voting</label>
                      <span class="badge badge-sm bg-gradient-<?php if ($voting->status === 'aktif') {echo "success";} else {echo "danger";} ?>"><?= $voting->status ?></span>
                    </div>
                    <label for="judul_voting">Judul voting</label>
                    <input type="text" name="judul_voting" value="<?= html_escape($voting->judul_voting) ?>" class="form-control mb-2">
                    <label for="token">Token</label>
                    <input type="text" name="token" value="<?= html_escape($voting->token) ?>" class="form-control mb-2">
                    <label for="batas_waktu">Batas waktu</label>
                    <input type="datetime-local" name="batas_waktu" value="<?= html_escape($voting->batas_waktu) ?>" class="form-control mb-2">
                    <label for="tema">Tema voting</label>
                    <input class="form-control mb-3" accept=".png,.jpg,.jpeg" type="file" name="tema" placeholder="Tema Voting" value="<?= html_escape($voting->tema) ?>">
                    <div class="d-flex justify-content-end">
                      <button type="submit" class="btn bg-gradient-success" onClick="return confirm('Apakah anda ingin mengubah data voting?')">Ubah Voting</button>                   
                    </div>
                </form>
              </div>
            </div>            
        </div>
      </div>
    <?php $this->load->view('admin/_partials/footer') ?>
      