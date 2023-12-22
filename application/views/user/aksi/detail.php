<?php $this->load->view('user/_partials/head') ?>
<body style="background-image: url('<?= base_url('upload/tema/' . $tema) ?>'); background-size: cover;">
  <div style="display:flex; align-items:center; justify-content:center; height:100vh; background-image: url('<?= base_url('upload/tema/' . $tema) ?>'); background-size: cover;">
        <div class="card p-3 m-3 shadow" style="position:absolute; top: 0; right: 0;">Pemilih : <b><?= $username ?></b></div>
    

          <div class="card col-7" data-aos="fade-up">
            <div class="card-body">
              <div class="card-header d-flex justify-content-between">
                <a href="<?= site_url('aksi') ?>">
                  <i class="ri-arrow-left-line"></i>
                </a>
                <div class="d-flex justify-content-center" style="width: 100%;">
                  <h4>Detail <?= $pilihan_voting->nama_pilihan  ?></h4>
                </div>
              </div>             

              <div class="row">
                <div class="col-lg-3">
                  <img src="<?= base_url('upload/thumbnail/pilihan/' . $pilihan_voting->thumbnail) ?>" class="img-fluid shadow border-radius-xl mb-4" style="width: 100%">
                </div>
                <div class="col-lg-9">
                  <p><?= $pilihan_voting->deskripsi ?></p>
                  <div class="d-flex justify-content-end">
                    <form action="<?= site_url('aksi/tambah_suara') ?>" method="POST">
                        <button class="btn badge badge-sm bg-gradient-success" value="<?= $pilihan_voting->id_pilihan_voting ?>" type="submit" name="suara"  onClick="return confirm('Apakah yakin dengan pilihan anda?')">
                            Pilih
                        </button>
                    </form>    
                  </div>                 
                </div>
              </div>
          </div>
        </div>

  </div>
  
</body>
<?php $this->load->view('user/_partials/footer') ?>
