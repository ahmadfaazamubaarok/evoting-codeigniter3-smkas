<?php $this->load->view('user/_partials/head') ?>
<body class="">
      <div style="display:flex; align-items:center; justify-content:center; height:100vh; background-image: url('<?= base_url('upload/tema/' . $tema) ?>'); background-size: cover;">
        <div class="card col-lg-3" data-aos="fade-up">
          <div class="card-body">
            <center>
              <h4 class="mb-4">Login <?= $judul_voting ?></h4>
            </center>
            <form action="" method="POST">
              <input type="text" name="username" placeholder="Username" required class="form-control mb-2">
              <input type="email" name="email" placeholder="Email" required class="form-control">
              <h6 class="text-white bg-gradient-danger mb-2" style="border-radius:5px; padding: 0px 10px 0px 10px;"><?= $this->session->flashdata('salah') ?></h6>
              <h6 class="text-white bg-gradient-danger mb-1" style="border-radius:5px; padding: 0px 10px 0px 10px;"><?= $this->session->flashdata('pemilih_tidak_ditemukan') ?></h6>
              <div class="d-flex justify-content-end"> 
                  <button type="submit" class="btn bg-gradient-primary my-4" id="myButton">Masuk</button>
              </div>
            </form>
          </div>
        </div>
      </div>    
</body>
<?php $this->load->view('user/_partials/footer') ?>
