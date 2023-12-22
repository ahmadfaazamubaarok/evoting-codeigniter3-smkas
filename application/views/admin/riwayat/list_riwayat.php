<?php $this->load->view('admin/_partials/head') ?>
<?php $this->load->view('admin/_partials/sidebar') ?>
<!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark">Admin</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pemilih</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Pilihan</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
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
            <div class="card-header d-flex justify-content-between">
              <h6>Tabel Pemilih Terdaftar</h6>
              <div>
                <a href="<?= site_url('admin/pemilih/tambah_pemilih') ?>" class="btn bg-gradient-primary w-100">Tambah pemilih</a>
              </div> 
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-aos="fade-up">Nama</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-aos="fade-up" data-aos-delay="50">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-aos="fade-up" data-aos-delay="100">Waktu memilih</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-aos="fade-up" data-aos-delay="150">Aksi</th>
                    </tr>
                  </thead>
                   <tbody>
                    <?php foreach($pemilih_terdaftar as $pemilih) : ?>
                    <tr class="mb-4">
                      <td data-aos="fade-right" data-aos-delay="200">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $pemilih->username ?></h6>
                            <p class="text-xs text-secondary mb-0"><?= $pemilih->email ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm" data-aos="fade-right" data-aos-delay="250">
                        <span class="badge badge-sm bg-gradient-<?php if ($pemilih->status === 'sudah') {echo "success";} else {echo "secondary";} ?>"><?= $pemilih->status ?></span>
                      </td>
                      <td class="align-middle text-center" data-aos="fade-right" data-aos-delay="300">
                        <span class="text-secondary text-xs font-weight-bold"><?= $pemilih->waktu_memilih ?></span>
                      </td>
                      <td class="align-middle text-center" style="display:flex; align-items: center; justify-content: center;" data-aos="fade-right" data-aos-delay="350">
                     <?php if ($pemilih->status === 'sudah') : ?>
                         <form action="<?= site_url('admin/pemilih/reset_pemilih') ?>" method="POST" data-aos="fade-right" data-aos-delay="400">
                          <button class="badge badge-sm bg-gradient-<?php echo ($pemilih->status === 'sudah') ? 'secondary' : ''; ?>" style="border:none; margin-inline: 1em; cursor: <?php echo ($pemilih->status === 'sudah') ? 'pointer' : 'default'; ?>;" <?php if ($pemilih->status === 'sudah') {echo 'name="reset_pemilih" type="submit" value="' . $pemilih->id_pemilih . '"';} else {echo "";} ?>>
                            <i class="ri-restart-line" style="font-size:1.5em;"></i>
                          </button>
                        </form>
                     <?php else : ?>
                        <div data-aos="fade-right" data-aos-delay="400">
                          <button class="badge badge-sm" style="border:none; margin-inline: 1em; cursor: default;">
                            <i class="ri-restart-line" style="font-size:1.5em;"></i>
                          </button>
                        </div>
                     <?php endif ?>                          
                        <a href="<?= site_url('admin/pemilih/edit_pemilih/' . $pemilih->id_pemilih) ?>"data-aos="fade-right" data-aos-delay="450">
                          <button class="badge badge-sm bg-gradient-success" style="border:none; margin-inline: 1em;">
                            <i class="ri-edit-fill" style="font-size:1.5em;"></i>
                          </button>
                        </a>
                        <form action="<?= site_url('admin/pemilih/hapus_pemilih') ?>" method="POST" data-aos="fade-right" data-aos-delay="500">
                          <button class="badge badge-sm bg-gradient-danger" style="border:none; margin-inline: 1em;" type="submit" name="hapus_pemilih" value="<?= $pemilih->id_pemilih ?>">
                            <i class="ri-delete-bin-7-fill" style="font-size:1.5em;"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>      
    </div>
<?php $this->load->view('admin/_partials/footer') ?>