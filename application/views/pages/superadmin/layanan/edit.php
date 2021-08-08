<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Tambah Data Layanan</h3>
			</div>
			<form action="<?= base_url('layanan/edit/').$layanan['id_layanan']?>" method="POST"
				enctype="multipart/form-dataa">
				<div class="card-body">
					<div class="form-group">
						<label for="layanan">Nama Layanan : </label>
                        <input type="hidden" name="id_layanan" value="<?= $layanan['id_layanan']?>">
						<?php if (form_error('layanan')) : ?>
						<input type="text" class="form-control form-control-warning form-txt-warning" id="layanan"
							placeholder="<?= strip_tags(form_error('layanan')) ?>" name="layanan">
						<?php else : ?>
						<input type="text" class="form-control " id="layanan" placeholder="Masukkan nama Layanan"
							name="layanan" value="<?= $layanan['layanan']?>">
						<?php endif ?>
					</div>

					<div class="form-group">
						<label for="harga">Harga : </label>
						<?php if (form_error('harga')) : ?>
						<input type="text" class="form-control form-control-warning form-txt-warning" id="harga"
							placeholder="<?= strip_tags(form_error('harga')) ?>" name="harga">
						<?php else : ?>
						<input type="text" class="form-control " id="harga" placeholder="Masukkan nominal harga layanan"
							name="harga" value="<?= $layanan['harga']?>">
						<?php endif ?>
					</div>

					<div class="form-group">
						<label for="status">Status</label>
						<select class="form-control" id="status" name="status">
							<?php if ($layanan['status'] == "1"): ?>
							<option value="<?= $layanan['status']?>">Aktif</option>
							<option value="0">Tidak Aktif</option>
							<?php else : ?>
							<option value="<?= $layanan['status']?>">Tidak Aktif</option>
							<option value="1">Aktif</option>
							<?php endif?>
						</select>
					</div>

				</div>
				<div class="card-footer">
					<button class="btn btn-primary mr-2" type="submit">Edit</button>
					<a href="<?= base_url('layanan/')?>" class="btn btn-light">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
