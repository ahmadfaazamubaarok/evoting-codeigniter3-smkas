<?php $this->load->view('admin/_partials/head') ?>
  <?php $this->load->view('admin/_partials/sidebar') ?>
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark">Admin</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
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
    <div class="container-fluid py-4">    
      <div class="row">
        <?php if (isset($waktu_habis)) : ?>
            <div class="mb-3 ml-1" data-aos="zoom-in">
              <div class="card text-white bg-gradient-danger p-2">
                <div class="text-center text-bold">
                  <?= $waktu_habis ?>
                </div>
              </div>
            </div>
        <?php endif ?>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4" data-aos="fade-up">
          <a href="<?= site_url('admin/pilihan') ?>">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Pilihan</p>
                      <h5 class="font-weight-bolder mb-0">
                        <?= $jumlah_pilihan ?>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ri-star-fill text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4" data-aos="fade-up" data-aos-delay="100">
          <a href="<?= site_url('admin/pemilih') ?>">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pemilih</p>
                      <h5 class="font-weight-bolder mb-0">
                        <?= $total_pemilih ?>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ri-user-fill text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>       
        </div>
        
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4" data-aos="fade-up" data-aos-delay="200">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Token</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= $voting->token ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ri-key-fill text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4" data-aos="fade-up" data-aos-delay="300">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Batas Waktu Voting</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= $voting->batas_waktu ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ri-timer-fill text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4" data-aos="fade-up" data-aos-delay="200">
          <div class="card mb-4">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-7">
                  <div class="d-flex flex-column h-300">
                    <h4 class="font-weight-bolder"><?= $voting->judul_voting ?></h4>
                    <p class="mb-1 pt-2 text-bold">Web Evoting oleh: Barok Studio</p>
                    <p class="mb-5">Proyek 4 dengan Framework Codeigniter 3</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php if ($total_pemilih > 0) : ?>
            <div class="card" data-aos="fade-up" data-aos-delay="300">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <p class="mb-3 text-bold">Persentasi pemilih sudah voting</p>
                  <div class="badge badge-sm bg-gradient-success mb-2"><?= $persentase_pemilih_sudah_voting ?></div>
                </div>              
                <div class="progress">
                  <div class="progress-bar bg-gradient-info" style="width: <?= $persentase_pemilih_sudah_voting ?>;"></div>
                </div>
              </div>
            </div>
          <?php endif ?>

        </div>
        <div class="col-lg-5 mb-lg-0 mb-4" data-aos="fade-up" data-aos-delay="400">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <h5 class="font-weight-bolder text-center">Hasil <?= $voting->judul_voting ?></h5>
              </div>
              <div class="row">
                <div class="">
                  <!-- Donut Chart -->
                    <div id="donutChart" style="min-height: 300px;" class="echart"></div>
                    <script>
                      document.addEventListener("DOMContentLoaded", () => {
                        echarts.init(document.querySelector("#donutChart")).setOption({
                          tooltip: {
                            trigger: 'item'
                          },
                          legend: {
                            top: '5%',
                            left: 'center'
                          },
                          series: [{
                            name: 'Access From',
                            type: 'pie',
                            radius: ['40%', '70%'],
                            avoidLabelOverlap: false,
                            label: {
                              show: false,
                              position: 'center'
                            },
                            emphasis: {
                              label: {
                                show: true,
                                fontSize: '18',
                                fontWeight: 'bold'
                              }
                            },
                            labelLine: {
                              show: false
                            },
                            data: [
                              <?php foreach ($persentase_pilihan as $pp) : ?>
                              {
                                value: <?= $pp['persentase'] ?>,
                                name: '<?= $pp['nama_pilihan'] ?>'
                              },
                              <?php endforeach; ?>
                            ]
                          }]
                        });
                      });
                    </script>
                    <!-- End Donut Chart -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <?php $this->load->view('admin/_partials/footer') ?>
      