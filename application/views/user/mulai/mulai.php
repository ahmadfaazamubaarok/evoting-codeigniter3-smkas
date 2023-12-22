<?php $this->load->view('user/_partials/head') ?>
<body class="">
      <div style="display:flex; align-items:center; justify-content:center; height:100vh; background-image: url('<?= base_url('upload/tema/' . $tema) ?>'); background-size: cover;">
        <div class="card col-lg-3" data-aos="fade-up">
          <div class="card-body">
            <div>
              <h4><?= $judul_voting ?></h4>
            </div>
            <div class="text-center">
              <a href="<?= site_url('mulai/user') ?>">
                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Mulai voting</button>
              </a>
            </div>
          </div>
        </div>
      </div>
</body>
<?php $this->load->view('user/_partials/footer') ?>
