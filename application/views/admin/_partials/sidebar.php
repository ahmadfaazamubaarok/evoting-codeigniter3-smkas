<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <img src="<?= base_url('aset/gambar/evoting.png') ?>" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Web Evoting</span>
    </div>
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item" data-aos="fade-right">
          <a class="nav-link  <?php if(!empty($halaman_dashboard)){ echo "active"; } ?>" href="<?= site_url('admin') ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ri-home-fill"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>        
        <li class="nav-item" data-aos="fade-right" data-aos-delay="100">
          <a class="nav-link <?php if(!empty($halaman_voting)){ echo "active"; } ?>" href="<?= site_url('admin/voting') ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ri-pie-chart-2-fill"></i>
            </div>
            <span class="nav-link-text ms-1">Voting</span>
          </a>
        </li>
        <li class="nav-item" data-aos="fade-right" data-aos-delay="200">
          <a class="nav-link  <?php if(!empty($halaman_pilihan)){ echo "active"; } ?>" href="<?= site_url('admin/pilihan') ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ri-star-fill"></i>
            </div>
            <span class="nav-link-text ms-1">Pilihan</span>
          </a>
        </li>
        <li class="nav-item" data-aos="fade-right" data-aos-delay="300">
          <a class="nav-link  <?php if(!empty($halaman_pemilih)){ echo "active"; } ?>" href="<?= site_url('admin/pemilih') ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ri-user-fill"></i>
            </div>
            <span class="nav-link-text ms-1">Pemilih</span>
          </a>
        </li>
        <li class="nav-item" data-aos="fade-right" data-aos-delay="300">
          <a class="nav-link  <?php if(!empty($halaman_setting)){ echo "active"; } ?>" href="<?= site_url('admin/setting') ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ri-settings-3-fill"></i>
            </div>
            <span class="nav-link-text ms-1">Setting</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="" style="display:flex; justify-content:end; flex-direction: column; height:200px;">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('auth/logout') ?>" onClick="return confirm('Apakah anda ingin logout?')">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ri-logout-box-line"></i>
            </div>
            logout
          </a>
        </li>
      </ul>      
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " style=" font-family: 'Roboto', sans-serif;">