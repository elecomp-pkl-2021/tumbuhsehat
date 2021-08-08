<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Edit Data Jadwal Dokter</h3>
			</div>
			<form action="<?= base_url('jadwal-dokter/edit/').$jadwal['id_jadwal']?>" method="POST"
				enctype="multipart/form-dataa">
				<div class="card-body">
					<div class="form-group">
                        <input type="hidden" name="id_jadwal" value="<?= $jadwal['id_jadwal']?>">
						<label for="hari">Hari Praktik :</label>
						<?php if (form_error('hari')) : ?>
						<select class="form-control form-control-warning form-txt-warning" id="hari" name="hari">
							<option value=""><?= strip_tags(form_error('hari')) ?></option>
							<?php foreach($list_hari as $lh) : ?>
							<option value="<?= $lh['day']?>"><?= $lh['hari']?></option>
							<?php endforeach?>
						</select>
						<?php else : ?>
						<select class="form-control" id="hari" name="hari">
							<?php foreach($list_hari as $lh) : ?>
							<?php if($lh['day'] == $jadwal['hari']):?>
							<option value="<?= $lh['day']?>" selected><?= $lh['hari']?></option>
							<?php else: ?>
							<option value="<?= $lh['day']?>"><?= $lh['hari']?></option>
							<?php endif?>
							<?php endforeach?>
						</select>
						<?php endif ?>
					</div>

					<div class="form-group">
						<label for="jam_mulai">Jam Mulai : </label>
						<?php if (form_error('jam_mulai')) : ?>
						<input type="text" class="form-control form-control-warning form-txt-warning" id="jam_mulai"
							placeholder="<?= strip_tags(form_error('jam_mulai')) ?>" name="jam_mulai">
						<?php else : ?>
						<input type="text" class="form-control " id="jam_mulai" placeholder="Masukkan jam mulai"
							name="jam_mulai" value="<?= $jadwal['jam_mulai']?>">
						<?php endif ?>
					</div>

					<div class="form-group">
						<label for="jam_tutup">Jam Tutup : </label>
						<?php if (form_error('jam_tutup')) : ?>
						<input type="text" class="form-control form-control-warning form-txt-warning" id="jam_tutup"
							placeholder="<?= strip_tags(form_error('jam_tutup')) ?>" name="jam_tutup">
						<?php else : ?>
						<input type="text" class="form-control " id="jam_tutup" placeholder="Masukkan jam tutup"
							name="jam_tutup" value="<?= $jadwal['jam_tutup']?>">
						<?php endif ?>
					</div>

					<div class="form-group">
						<label for="id_dokter">Nama Dokter :</label>
						<?php if (form_error('id_dokter')) : ?>
						<select class="form-control form-control-warning form-txt-warning" id="id_dokter"
							name="id_dokter">
							<option value=""><?= strip_tags(form_error('id_dokter')) ?></option>
							<?php foreach($dokter as $d):?>
							<option value="<?= $d->id_dokter?>"><?= $d->nama_dokter?></option>
							<?php endforeach?>
						</select>
						<?php else : ?>
						<select class="form-control" id="id_dokter" name="id_dokter">
							<?php foreach($dokter as $d):?>
							<?php if($d->id_dokter == $jadwal['id_dokter']):?>
							<option value="<?= $d->id_dokter?>" selected><?= $d->nama_dokter?></option>
							<?php else : ?>
							<option value="<?= $d->id_dokter?>"><?= $d->nama_dokter?></option>
							<?php endif?>
							<?php endforeach?>
						</select>
						<?php endif ?>
					</div>

					<div class="form-group">
						<label for="kuota">Kuota Pasien : </label>
						<?php if (form_error('kuota')) : ?>
						<input type="text" class="form-control form-control-warning form-txt-warning" id="kuota"
							placeholder="<?= strip_tags(form_error('kuota')) ?>" name="kuota">
						<?php else : ?>
						<input type="text" class="form-control " id="kuota" placeholder="Masukkan kuota" name="kuota"
							value="<?= $jadwal['kuota']?>">
						<?php endif ?>
					</div>

					<div class="form-group">
						<label for="ket">Keterangan Waktu : </label>
						<?php if (form_error('ket')) : ?>
						<select class="form-control form-control-warning form-txt-warning" id="ket" name="ket">
							<option value=""><?= strip_tags(form_error('ket')) ?></option>
							<?php foreach($ket as $k):?>
							<option value="<?= $k?>"><?= $k?></option>
							<?php endforeach?>
						</select>
						<?php else : ?>
						<select class="form-control" id="ket" name="ket">
							<?php foreach($ket as $k):?>
							<?php if($k == $jadwal['ket']):?>
							<option value="<?= $k?>" selected><?= $k?></option>
							<?php else :?>
							<option value="<?= $k?>"><?= $k?></option>
							<?php endif?>
							<?php endforeach?>
						</select>
						<?php endif ?>
					</div>

				</div>
				<div class="card-footer">
					<button class="btn btn-primary mr-2" type="submit">Edit</button>
					<a href="<?= base_url('jadwal-dokter/')?>" class="btn btn-light">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
