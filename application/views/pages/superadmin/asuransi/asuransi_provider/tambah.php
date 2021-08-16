<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Tambah Data Provider Asuransi di Klinik</h3>
			</div>
			<form action="<?= base_url('provider-asuransi/tambah')?>" method="POST" enctype="multipart/form-dataa">
				<div class="card-body">
					<div class="form-group">
						<label for="nama_provider">Nama Provider : </label>
						<?php if (form_error('nama_provider')) : ?>
						<input type="text" class="form-control form-control-warning form-txt-warning" id="nama_provider"
							placeholder="<?= strip_tags(form_error('nama_provider')) ?>" name="nama_provider">
						<?php else : ?>
						<input type="text" class="form-control " id="nama_provider" placeholder="Masukkan nama provider asuransi baru"
							name="nama_provider" value="<?= set_value('nama_provider') ?>">
						<?php endif ?>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary mr-2" type="submit">Tambah</button>
					<a href="<?= base_url('provider-asuransi/')?>" class="btn btn-light">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
