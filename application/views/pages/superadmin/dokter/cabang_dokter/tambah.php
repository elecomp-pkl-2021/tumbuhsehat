<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Tambah Cabang Dokter</h3>
			</div>
			<form action="<?= base_url('cabang-dokter/tambah')?>" method="POST" enctype="multipart/form-dataa">
				<div class="card-body">
					<div class="form-group">
						<label for="id_dokter">Nama Dokter</label>
						<?php if (form_error('id_dokter')) : ?>
						<select class="form-control form-control-warning form-txt-warning" id="id_dokter" name="id_dokter">
							<option value=""><?= strip_tags(form_error('id_dokter')) ?></option>
							<?php foreach($dokter as $d) : ?>
							<option value="<?= $d->id_dokter?>"><?= $d->nama_dokter?></option>
							<?php endforeach?>
						</select>
						<?php else : ?>
						<select class="form-control" id="id_dokter" name="id_dokter">
							<option value="">Pilih Dokter</option>
							<?php foreach($dokter as $d) : ?>
							<option value="<?= $d->id_dokter?>"><?= $d->nama_dokter?></option>
							<?php endforeach?>
						</select>
						<?php endif ?>
					</div>

					<div class="form-group">
						<label for="id_cabang">Nama Cabang</label>
						<?php if (form_error('id_cabang')) : ?>
						<select class="form-control form-control-warning form-txt-warning" id="id_cabang" name="id_cabang">
							<option value=""><?= strip_tags(form_error('id_cabang')) ?></option>
							<?php foreach($cabang as $c) : ?>
							<option value="<?= $c->id_cabang?>"><?= $c->nama_cabang?></option>
							<?php endforeach?>
						</select>
						<?php else : ?>
						<select class="form-control" id="id_cabang" name="id_cabang">
							<option value="">Pilih Cabang</option>
							<?php foreach($cabang as $c) : ?>
							<option value="<?= $c->id_cabang?>"><?= $c->nama_cabang?></option>
							<?php endforeach?>
						</select>
						<?php endif ?>
					</div>

				</div>
				<div class="card-footer">
					<button class="btn btn-primary mr-2" type="submit">Tambah</button>
					<a href="<?= base_url('cabang-dokter/')?>" class="btn btn-light">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
