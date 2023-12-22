<?php $this->load->view('user/_partials/head') ?>
<body class="">
      <div style="display:flex; align-items:center; justify-content:center; height:100vh; background-image: url('<?= base_url('upload/tema/' . $tema) ?>'); background-size: cover;">
        <div class="card p-3 m-3 shadow" style="position:absolute; top: 0; right: 0;">Pemilih : <b><?= $username ?></b></div>
        
        <div class="card col-lg-3" data-aos="fade-up">
          <div class="card-body">
            <div class="d-flex justify-content-between">
          		<a href="<?= site_url('aksi/mulai') ?>"><i class="ri-arrow-go-back-fill"></i></a>
            	<div class="d-flex justify-content-center w-100">
            	  <h4>Selesai Voting</h4>
            	</div>
          	</div> 
            <div class="text-center">
              <a href="<?= site_url('mulai/hasil_voting') ?>">
                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Lihat Hasil</button>
              </a>
            </div>
          </div>
        </div>
      </div>
</body>
<?php $this->load->view('user/_partials/footer') ?>
