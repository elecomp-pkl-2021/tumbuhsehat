<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Tambah Data Metode pembayaran</h3>
			</div>
			<form action="<?= base_url('metode-pembayaran/tambah')?>" method="POST" enctype="multipart/form-dataa">
				<div class="card-body">
					<div class="form-group">
						<label for="nama_metode">Metode Pembayaran : </label>
						<?php if (form_error('nama_metode')) : ?>
						<input type="text" class="form-control form-control-warning form-txt-warning" id="nama"
							placeholder="<?= strip_tags(form_error('nama_metode')) ?>" name="nama_metode">
						<?php else : ?>
						<input type="text" class="form-control " id="nama_metode" placeholder="Masukkan nama metode"
							name="nama_metode" value="<?= set_value('nama_metode') ?>">
						<?php endif ?>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary mr-2" type="submit">Tambah</button>
					<a href="<?= base_url('metode-pembayaran/')?>" class="btn btn-light">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
