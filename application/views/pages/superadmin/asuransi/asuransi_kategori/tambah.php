<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Tambah Data Kategori Asuransi di Klinik</h3>
			</div>
			<form action="<?= base_url('kategori-asuransi/tambah')?>" method="POST" enctype="multipart/form-dataa">
				<div class="card-body">
					<div class="form-group">
						<label for="nama_kategori">Nama Kategori : </label>
						<?php if (form_error('nama_kategori')) : ?>
						<input type="text" class="form-control form-control-warning form-txt-warning" id="nama_kategori"
							placeholder="<?= strip_tags(form_error('nama_kategori')) ?>" name="nama_kategori">
						<?php else : ?>
						<input type="text" class="form-control " id="nama_kategori" placeholder="Masukkan nama kategori asuransi baru"
							name="nama_kategori" value="<?= set_value('nama_kategori') ?>">
						<?php endif ?>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary mr-2" type="submit">Tambah</button>
					<a href="<?= base_url('kategori-asuransi/')?>" class="btn btn-light">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
