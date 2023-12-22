<?php $this->load->view('admin/_partials/head') ?>
<body class="">
      <div style="display:flex; align-items:center; justify-content:center; height:100vh; background-image: url('<?= base_url('upload/tema/' . $tema) ?>'); background-size: cover;">
        <div class="card col-3" data-aos="fade-up">
          <div class="card-body">
            <center>
              <h4>Login Admin</h4>
            </center>
            <form action="" method="POST">
              <input type="text" name="username" placeholder="Username" required class="form-control mb-2">
              <input type="email" name="email" placeholder="Email" required class="form-control mb-2">
              <input type="password" name="password" placeholder="Password" required class="form-control mb-2">
              <p class="text-white text-center bg-gradient-danger mb-2" style="border-radius:5px; padding: 0px 10px 0px 10px;"><?= $this->session->flashdata('salah') ?></p>
              <button type="submit" class="btn bg-gradient-primary my-4 mb-2 w-100" id="myButton">Masuk</button>
            </form>
          </div>
        </div>
      </div>    
</body>
<?php $this->load->view('admin/_partials/footer') ?>