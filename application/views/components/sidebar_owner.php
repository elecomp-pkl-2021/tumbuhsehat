<div class="sidebar-content">
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-lavel">Navigation</div>
            <div class="nav-item <?= $this->uri->segment(1) == 'home' || $this->uri->segment(1) == 'pemeriksaan' ? 'active' : '' ?>">
				<a href="<?= base_url('home')?>"><i class="ik ik-home"></i><span>Home</span></a>
			</div>

            <div class="nav-lavel">Janji Pasien</div>
            <div class="nav-item <?= $this->uri->segment(1) == 'konfirmasi_janji' ? 'active' : '' ?>">
				<a href="<?= base_url('konfirmasi_janji')?>"><i class="ik ik-calendar"></i><span>Konfirmasi Janji</span></a>
			</div>
            
            <nav class="nav-item">
				<a href="<?= base_url('janji')?>"><i class="ik ik-check-circle"></i><span>Daftar / Ubah Janji</span></a>
			</nav>

            <div class="nav-lavel">Pasien</div>
            <div class="nav-item <?= $this->uri->segment(1) == 'pasien' ? 'active' : '' ?>">
				<a href="<?= base_url('pasien')?>"><i class="ik ik-users"></i><span>Informasi Pasien</span></a>
			</div>

            <div class="nav-lavel">Keuangan</div>
            <div class="nav-item">
                <a href="#"><i class="ik ik-credit-card"></i><span>Pembayaran</span></a>
            </div>

            <div class="nav-lavel">Laporan</div>
            <div class="nav-item">
                <a href="pages/table-bootstrap.html"><i class="ik ik-book"></i><span>Laporan Pemeriksaan</span></a>
            </div>
        </nav>
    </div>
</div>
</div>