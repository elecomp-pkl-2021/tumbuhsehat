<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Edit Cabang Dokter</h3>
			</div>
			<form action="<?= base_url('dokter_cabang/edit_cabang_aksi/').$dok_cabang['id_cbdokter']?>" method="POST"
				enctype="multipart/form-data">
				<input type="hidden" name="id_cbdokter" value="<?= $dok_cabang['id_cbdokter']?>">
				<div class="card-body">
					<div class="form-group">
						<label for="id_dokter">Nama Dokter</label>
						<select class="form-control" id="id_dokter" name="id_dokter">
							<?php foreach($dokter as $d) : ?>
							<?php if($d->id_dokter == $dok_cabang['id_dokter']):?>
							<option value="<?= $d->id_dokter?>" selected><?= $d->nama_dokter?></option>
							<?php else:?>
							<option value="<?= $d->id_dokter?>"><?= $d->nama_dokter?></option>
							<?php endif?>
							<?php endforeach?>
						</select>
					</div>

					<div class="form-group">
						<label for="id_cabang">Nama Cabang</label>
						<select class="form-control" id="id_cabang" name="id_cabang">
							<?php foreach($cabang as $c) : ?>
							<?php if($c->id_cabang == $dok_cabang['id_cabang']):?>
							<option value="<?= $c->id_cabang?>" selected><?= $c->nama_cabang?></option>
							<?php else :?>
							<option value="<?= $c->id_cabang?>"><?= $c->nama_cabang?></option>
							<?php endif?>
							<?php endforeach?>
						</select>
					</div>

				</div>
				<div class="card-footer">
					<button class="btn btn-primary mr-2" type="submit">Edit</button>
					<a href="<?= base_url('cabang-dokter/')?>" class="btn btn-light">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
