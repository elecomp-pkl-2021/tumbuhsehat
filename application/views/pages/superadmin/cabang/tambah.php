<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Tambah Data Cabang Klinik</h3>
			</div>
			<form action="<?= base_url('cabang/tambah') ?>" method="POST" enctype="multipart/form-dataa">
				<div class="card-body">
					<div class="form-group">
						<label for="nama_cabang">Nama Cabang : </label>
						<?php if (form_error('nama_cabang')) : ?>
							<input type="text" class="form-control form-control-warning form-txt-warning" id="nama_cabang" placeholder="<?= strip_tags(form_error('nama_cabang')) ?>" name="nama_cabang">
						<?php else : ?>
							<input type="text" class="form-control " id="nama_cabang" placeholder="Masukkan nama cabang" name="nama_cabang" value="<?= set_value('nama_cabang') ?>">
						<?php endif ?>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat : </label>
						<?php if (form_error('alamat')) : ?>
							<input type="text" class="form-control form-control-warning form-txt-warning" id="nama_cabang" placeholder="<?= strip_tags(form_error('alamat')) ?>" name="alamat">
						<?php else : ?>
							<input type="text" class="form-control " id="alamat" placeholder="Masukkan nama cabang" name="alamat" value="<?= set_value('alamat') ?>">
						<?php endif ?>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary mr-2" type="submit">Tambah</button>
					<a href="<?= base_url('cabang/') ?>" class="btn btn-light">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>