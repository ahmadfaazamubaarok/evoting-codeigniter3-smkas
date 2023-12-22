<?php $this->load->view('user/_partials/head') ?>
<body class="">
      <div style="display:flex; align-items:center; justify-content:center; height:100vh; background-image: url('<?= base_url('upload/tema/' . $tema) ?>'); background-size: cover;">
        <div class="card p-3 m-3 shadow" style="position:absolute; top: 0; right: 0;">Pemilih : <b><?= $username ?></b></div>
        
        <div class="card col-lg-4" data-aos="fade-up">
          <div class="card-body">
          	<div class="d-flex justify-content-between">
          		<a href="<?= site_url('aksi/selesai_voting') ?>" style="margin-right: 20px;"><i class="ri-arrow-go-back-fill"></i></a>
            	<div class="w-100 mb-3">
            	  <h4>Hasil Sementara</h4>
                <p>Silahkan refresh ulang untuk menampilkan hasil voting terkini.</p>
            	</div>
          	</div>     		
            <div class="card">
          	  <div class="card-body p-3">
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
                                value: <?= $pp['persentase']   ?>,
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
              <a href="<?= site_url('mulai') ?>" class="btn bg-gradient-primary m-3">Selesai</a>
          	</div>
          </div>
        </div>
      </div>
</body>
<?php $this->load->view('user/_partials/footer') ?>
