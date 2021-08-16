<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Tambah Data Layanan</h3>
			</div>
			<form action="<?= base_url('layanan/tambah')?>" method="POST" enctype="multipart/form-dataa">
				<div class="card-body">
					<div class="form-group">
						<label for="layanan">Nama Layanan : </label>
						<?php if (form_error('layanan')) : ?>
						<input type="text" class="form-control form-control-warning form-txt-warning" id="layanan"
							placeholder="<?= strip_tags(form_error('layanan')) ?>" name="layanan">
						<?php else : ?>
						<input type="text" class="form-control " id="layanan" placeholder="Masukkan nama Layanan"
							name="layanan" value="<?= set_value('layanan') ?>">
						<?php endif ?>
					</div>

					<div class="form-group">
						<label for="harga">Harga : </label>
						<?php if (form_error('harga')) : ?>
						<input type="text" class="form-control form-control-warning form-txt-warning" id="harga"
							placeholder="<?= strip_tags(form_error('harga')) ?>" name="harga">
						<?php else : ?>
						<input type="text" class="form-control " id="harga" placeholder="Masukkan nominal harga layanan"
							name="harga" value="<?= set_value('harga') ?>">
						<?php endif ?>
					</div>

					<div class="form-group">
						<label for="status">Status</label>
						<?php if (form_error('status')) : ?>
						<select class="form-control form-control-warning form-txt-warning" id="status" name="status">
							<option value=""><?= strip_tags(form_error('status')) ?></option>
							<option value="1">Aktif</option>
							<option value="0">Tidak Aktif</option>
						</select>
						<?php else : ?>
						<select class="form-control" id="status" name="status">
							<option value="">Pilih status</option>
							<option value="1">Aktif</option>
							<option value="0">Tidak Aktif</option>
						</select>
						<?php endif ?>
					</div>

				</div>
				<div class="card-footer">
					<button class="btn btn-primary mr-2" type="submit">Tambah</button>
					<a href="<?= base_url('layanan/')?>" class="btn btn-light">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
