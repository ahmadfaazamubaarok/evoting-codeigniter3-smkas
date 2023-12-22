<?php $this->load->view('user/_partials/head') ?>
<body style="background-image: url('<?= base_url('upload/tema/' . $tema) ?>'); background-size: cover;">
        <div class="card p-3 m-3 shadow" style="position:absolute; top: 0; right: 0;">Pemilih : <b><?= $username ?></b></div>

      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0 mt-4" data-aos="zoom-in">
              <div class="card-body">

                <div class="d-flex justify-content-center">
                  <h4>Peraturan <?= $judul_voting ?></h4>
                </div>
                <pre class="w-100">
                    
1. Tentukan pilihan anda saat melakukan voting.
2. Jagalah kerahasiaaan pilihan anda.
3. Dilarang memberi atau menerima 
   imbalan dengan maksud untuk
   memperoleh suara.
4. Hargai pilihan orang lain.
5. Suara anda sangat berarti.
6. Dilarang melakukan voting lebih dari sekali.
7. Pilihlah sesuai dengan pilihan masing-masing
   atau bukan paksaan dari orang lain.
8. segera hubungi admin atau petugas bila
   terdapat kendala saat melakukan evoting.

   Selamat Memilih.

                </pre>

                <a href="<?= site_url('aksi') ?>" class="d-flex justify-content-center">
                    <button type="submit" class="btn bg-gradient-primary w-80 mb-2" id="myButton">Masuk</button>
                </a>
                                
              </div>
            </div>
          </div>
        </div>
      </div>
    
</body>
<?php $this->load->view('user/_partials/footer') ?>
<script type="text/javascript">
    window.onload = function() {
        var button = document.getElementById("myButton");
        var countdown = 10; // Waktu tunggu dalam detik saat halaman dimuat

        button.disabled = true;
        button.innerText = "Tunggu " + countdown + " detik";

        var countdownInterval = setInterval(function() {
            countdown--;
            button.innerText = "Tunggu " + countdown + " detik";

            if (countdown <= 0) {
                clearInterval(countdownInterval);
                button.disabled = false;
                button.innerText = "Lanjut voting";
            }
        }, 1000); // 1000 milidetik = 1 detik
    }
</script>


