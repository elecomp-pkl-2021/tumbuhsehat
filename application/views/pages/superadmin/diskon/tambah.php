<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Tambah Data Diskon Klinik</h3>
			</div>
			<form action="<?= base_url('diskon/tambah')?>" method="POST" enctype="multipart/form-dataa">
				<div class="card-body">
					<div class="form-group">
						<label for="nama_diskon">Nama Diskon : </label>
						<?php if (form_error('nama_diskon')) : ?>
						<input type="text" class="form-control form-control-warning form-txt-warning" id="nama_diskon"
							placeholder="<?= strip_tags(form_error('nama_diskon')) ?>" name="nama_diskon">
						<?php else : ?>
						<input type="text" class="form-control " id="nama_diskon" placeholder="Masukkan nama diskon"
							name="nama_diskon" value="<?= set_value('nama_diskon') ?>">
						<?php endif ?>
					</div>

					<div class="form-group">
						<label for="nilai_diskon">Nilai Persentase Diskon: </label>
						<?php if (form_error('nilai_diskon')) : ?>
						<input type="text" class="form-control form-control-warning form-txt-warning" id="nilai_diskon"
							placeholder="<?= strip_tags(form_error('nilai_diskon')) ?>" name="nilai_diskon">
						<?php else : ?>
						<input type="text" class="form-control " id="nilai_diskon" placeholder="Masukkan bersar persentase nilai diskon"
							name="nilai_diskon" value="<?= set_value('nilai_diskon') ?>">
						<?php endif ?>
					</div>

					<div class="form-group">
						<label for="status_diskon">Status Diskon</label>
						<?php if (form_error('status_diskon')) : ?>
						<select class="form-control form-control-warning form-txt-warning" id="status_diskon" name="status_diskon">
							<option value=""><?= strip_tags(form_error('status_diskon')) ?></option>
							<option value="1">Aktif</option>
							<option value="0">Tidak Aktif</option>
						</select>
						<?php else : ?>
						<select class="form-control" id="status_diskon" name="status_diskon">
							<option value="">Pilih status diskon</option>
							<option value="1">Aktif</option>
							<option value="0">Tidak Aktif</option>
						</select>
						<?php endif ?>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary mr-2" type="submit">Tambah</button>
					<a href="<?= base_url('diskon/')?>" class="btn btn-light">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
