<?php $this->load->view('admin/_partials/head') ?>
<?php $this->load->view('admin/_partials/sidebar') ?>
<!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark">Admin</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pilihan</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Pilihan</h6>
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
    <div class="container-fluid ">
    	<div class="row">
    		<div class="col-12 mt-4">
    			<div class="card mb-4" data-aos="fade-up">
		    		<div class="card-header pb-0 p-3">
		    		    <h6 class="mb-1">Pilihan Voting</h6>
		    	  </div>
		    		<div class="card-body">
            <h6 class="text-white bg-gradient-success d-flex justify-content-center" style="margin:0px 30px 0px 0px; border-radius:5px; padding: 0px 20px 0px 20px;"><?= $this->session->flashdata('reset_suara') ?></h6>
            <h6 class="text-white bg-gradient-success d-flex justify-content-center" style="margin:0px 30px 0px 0px; border-radius:5px; padding: 0px 20px 0px 20px;"><?= $this->session->flashdata('update') ?></h6>
            <h6 class="text-white bg-gradient-success d-flex justify-content-center" style="margin:0px 30px 0px 0px; border-radius:5px; padding: 0px 20px 0px 20px;"><?= $this->session->flashdata('tambah') ?></h6>
            <h6 class="text-white bg-gradient-success d-flex justify-content-center" style="margin:0px 30px 0px 0px; border-radius:5px; padding: 0px 20px 0px 20px;"><?= $this->session->flashdata('hapus') ?></h6>
            <div class="mb-3"></div>
		    		  <div class="row">
		    			
		    		  	<?php foreach($pilihan_terdaftar as $pilihan ) : ?>
		    	
		    		    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4" >
		    		      <div class="card card-blog card-plain" data-aos="fade-up" data-aos-delay="200">
		    		        <div class="position-relative">
		    		          <div class="d-block border-radius-xl" style="position: relative;">
                        <img src="<?= base_url('upload/thumbnail/pilihan/' . $pilihan->thumbnail) ?>" alt="img-blur-shadow" class="img-fluid border-radius-xl">
                      </div>
		    		        </div>
		    		        <div class="card-body px-1 pb-0">
		    		          <a href="javascript:;">
		    		            <h5 class="mb-3">
		    		              <?=  $pilihan->nama_pilihan ?>
		    		            </h5>
		    		          </a>
		    		          <div class="d-flex align-items-center">
		    		            <a href="<?= site_url('admin/pilihan/detail/' . $pilihan->id_pilihan_voting) ?>">
		    		            	<button class="badge badge-sm bg-gradient-info" style="border:none; margin-inline: 1em;">
			    		            	<i class="ri-information-line" style="font-size:1.5em;"></i>
		    		            	</button>
		    		            </a>
		    		            <a href="<?= site_url('admin/pilihan/edit_pilihan/'.$pilihan->id_pilihan_voting) ?>">
		    		            	<button class="badge badge-sm bg-gradient-success" style="border:none; margin-inline: 1em;">
			    		            	<i class="ri-edit-fill" style="font-size:1.5em;"></i>
		    		            	</button>
		    		            </a>
		    		            <a href="<?= site_url('admin/pilihan/hapus_pilihan/' . $pilihan->id_pilihan_voting) ?>">
                          <button class="badge badge-sm bg-gradient-danger" style="border:none; margin-inline: 1em;" type="submit" name="hapus_pilihan" value="<?= $pilihan->id_pilihan_voting ?>" onClick="return confirm('Apakah anda ingin menghapus pilihan tersebut?')">
                            <i class="ri-delete-bin-7-fill" style="font-size:1.5em;"></i>
                          </button>
                        </a>
		    		          </div>
		    		        </div>
		    		      </div>
		    		    </div>
		    	
		    			<?php endforeach ?>
		    	
		    		    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4" data-aos="fade-up" data-aos-delay="400">
		    		      <a href="<?= site_url('admin/pilihan/tambah_pilihan') ?>">
		    		    		<div class="card h-100 card-plain border">
		    		    		  <div class="card-body d-flex flex-column justify-content-center text-center">
		    		    		      <h1 class=" text-secondary">+</h1>
		    		    		  </div>
		    		    		</div>
		    		      </a>
		    		    </div>
		    		  </div>
		    		</div>
		    	</div>
		  	</div>
    	</div>
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
              <div class="d-flex justify-content-end">
                <a style="margin-right: 20px;" class="badge bg-gradient-secondary" href="<?= site_url('admin/pilihan/reset_suara') ?>" onClick="return confirm('Apakah anda ingin mereset semua suara?')">Reset suara  <i class="ri-restart-line" style="font-size:1.5em;"></i></a>
              </div>
            </div>
          </div>
    </div>
    <br>
    <br>
    <br>
<?php $this->load->view('admin/_partials/footer') ?>