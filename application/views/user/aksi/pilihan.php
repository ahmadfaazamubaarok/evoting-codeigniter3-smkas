<?php $this->load->view('user/_partials/head') ?>
<body style="background-image: url('<?= base_url('upload/tema/' . $tema) ?>'); background-size: cover;">
  <div class="card p-3 m-3 shadow" style="position:absolute; top: 0; right: 0;">Pemilih : <b><?= $username ?></b></div>
  
  <div class="container-fluid ">
      <div class="row d-flex justify-content-center">
        <div class="col-9 mt-4">
          <div class="card mb-4" data-aos="fade-up">
            <div class="card-header pb-0 p-3 d-flex justify-content-center">
                <h6 class="mb-1">Pilihan Voting</h6>
            </div>
            <div class="card-body">
              <div class="row d-flex justify-content-center">
              
                <?php foreach($pilihan_voting as $pilihan ) : ?>
          
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4" >
                  <div class="card card-blog card-plain" data-aos="fade-up" data-aos-delay="200">
                    <div class="position-relative">
                      <a class="d-block shadow-xl border-radius-xl">
                        <img src="<?= base_url('upload/thumbnail/pilihan/' . $pilihan->thumbnail) ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl" >
                      </a>
                    </div>
                    <div class="card-body px-1 pb-0">
                      <a href="javascript:;">
                        <h5 class="mb-3">
                          <?=  $pilihan->nama_pilihan ?>
                        </h5>
                      </a>
                      <div class="d-flex align-items-center">
                        <a href="<?= site_url('aksi/detail/' . $pilihan->id_pilihan_voting) ?>">
                          <button class="btn badge badge-sm bg-gradient-info" style="border:none; margin-inline: 1em;">
                            Detail
                          </button>
                        </a>
                        <form action="<?= site_url('aksi/tambah_suara') ?>" method="POST">
                            <button class="btn badge badge-sm bg-gradient-success" value="<?= $pilihan->id_pilihan_voting ?>" type="submit" name="suara"  onClick="return confirm('Apakah yakin dengan pilihan anda?')">
                                Pilih
                            </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
          
              <?php endforeach ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>       
</body>
<?php $this->load->view('user/_partials/footer') ?>




