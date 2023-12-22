<?php $this->load->view('user/_partials/head') ?>
<body class="">
      <div style="display:flex; align-items:center; justify-content:center; height:100vh; background-image: url('<?= base_url('upload/tema/' . $tema) ?>'); background-size: cover;">
        <div class="card p-3 m-3 shadow" style="position:absolute; top: 0; right: 0;" data-aos="fade-down" data-aos-delay="500">Pemilih : <b><?= $username ?></b></div>
        <div class="card col-lg-3" data-aos="fade-up">
          <div class="card-body">
            <center>
              <h4 class="mb-4">Token <?= $judul_voting ?></h4>
            </center>
            <form action="" method="POST">
              <input type="text" name="token" placeholder="Token" required class="form-control mb-2">
              <p class="text-white text-center bg-gradient-danger mb-2" style="border-radius:5px; padding: 0px 10px 0px 10px;"><?= $this->session->flashdata('salah') ?></p>
              <p class="text-white text-center bg-gradient-danger mb-2" style="border-radius:5px; padding: 0px 10px 0px 10px;"><?= $this->session->flashdata('waktu_habis') ?></p>
              <div class="d-flex justify-content-end"> 
                  <button type="submit" class="btn bg-gradient-primary my-4" id="myButton">Masuk</button>
              </div>
            </form>
          </div>
        </div>
      </div>    
</body>
<?php $this->load->view('user/_partials/footer') ?>
