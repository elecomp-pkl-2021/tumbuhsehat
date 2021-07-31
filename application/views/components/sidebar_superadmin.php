<div class="sidebar-content">
	<div class="nav-container">
		<nav id="main-menu-navigation" class="navigation-main">
			<div class="nav-lavel">Navigation</div>
			<div class="nav-item <?= $this->uri->segment(1) == 'home' || $this->uri->segment(1) == 'pemeriksaan' ? 'active' : '' ?>">
				<a href="<?= base_url('home')?>"><i class="ik ik-home"></i><span>Home</span></a>
			</div>

			<div class="nav-lavel">Data Master</div>
			<div class="nav-item has-sub 
				<?= $this->uri->segment(1) == 'daftar-dokter' || $this->uri->segment(1) == 'cabang-dokter' ||
					$this->uri->segment(1) == 'jadwal-dokter' ? 'active open' : '' ?>">
				<a href="javascript:void(0)"><i class="ik ik-list"></i><span>Data Dokter</span></a>
				<div class="submenu-content">
					<a href="<?= base_url('daftar-dokter')?>" class="menu-item <?= $this->uri->segment(1) == 'daftar-dokter' ? 'active' : '' ?>">Daftar Dokter</a>
					<a href="<?= base_url('cabang-dokter')?>" class="menu-item <?= $this->uri->segment(1) == 'cabang-dokter' ? 'active' : '' ?>">Cabang Dokter</a>
					<a href="<?= base_url('jadwal-dokter')?>" class="menu-item <?= $this->uri->segment(1) == 'jadwal-dokter' ? 'active' : '' ?>">Jadwal Dokter</a>
				</div>
			</div>

			<div class="nav-item <?= $this->uri->segment(1) == 'cabang' ? 'active' : '' ?>">
				<a href="<?= base_url('cabang')?>"><i class="ik ik-map-pin"></i><span>Data Cabang Klinik</span></a>
			</div>

			<nav class="nav-item <?= $this->uri->segment(1) == 'layanan' ? 'active' : '' ?>">
				<a href="<?= base_url('layanan')?>"><i class="ik ik-git-commit"></i><span>Data Layanan</span></a>
			</nav>

			<nav class="nav-item <?= $this->uri->segment(1) == 'metode-pembayaran' ? 'active' : '' ?>">
				<a href="<?= base_url('metode-pembayaran')?>"><i class="ik ik-credit-card"></i><span>Data Metode
						Pembayaran</span></a>
			</nav>

			<div class="nav-lavel">Janji Pasien</div>
			<div class="nav-item <?= $this->uri->segment(1) == 'konfirmasi_janji' ? 'active' : '' ?>">
				<a href="<?= base_url('konfirmasi_janji')?>"><i class="ik ik-calendar"></i><span>Konfirmasi Janji</span></a>
			</div>
			<nav class="nav-item">
				<a href="<?= base_url('home')?>"><i class="ik ik-check-circle"></i><span>Daftar / Ubah Janji</span></a>
			</nav>

			<div class="nav-lavel">Pasien</div>
			<div class="nav-item <?= $this->uri->segment(1) == 'pasien' ? 'active' : '' ?>">
				<a href="<?= base_url('pasien')?>"><i class="ik ik-users"></i><span>Informasi Pasien</span></a>
			</div>

			<div class="nav-lavel">Keuangan</div>
			<div class="nav-item">
				<a href="<?= base_url('home')?>"><i class="ik ik-credit-card"></i><span>Pembayaran</span></a>
			</div>

			<div class="nav-lavel">Laporan</div>
			<div class="nav-item">
				<a href="<?= base_url('home')?>"><i class="ik ik-book"></i><span>Laporan Pemeriksaan</span></a>
			</div>
			<div class="nav-item">
				<a href="<?= base_url('home')?>"><i class="ik ik-book"></i><span>Laporan Harian</span></a>
			</div>
		</nav>
	</div>
</div>
</div>
