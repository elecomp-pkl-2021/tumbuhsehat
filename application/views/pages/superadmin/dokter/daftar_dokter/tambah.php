<?php $new_id_user = $last_id_user['id_user'] + 1;?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Tambah Data Dokter</h3>
			</div>
			<form action="<?= base_url('daftar-dokter/tambah')?>" method="POST" enctype="multipart/form-data">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<h4 class="sub-title font-weight-bold">Data Diri Dokter</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama_depan_u">Nama Depan : </label>
								<?php if (form_error('nama_depan_u')) : ?>
								<input type="text" class="form-control form-control-warning form-txt-warning"
									id="nama_depan_u" placeholder="<?= strip_tags(form_error('nama_depan_u')) ?>"
									name="nama_depan_u">
								<?php else : ?>
								<input type="text" class="form-control " id="nama_depan_u"
									placeholder="Masukkan nama depan dokter" name="nama_depan_u"
									value="<?= set_value('nama_depan_u') ?>">
								<?php endif ?>
							</div>
							<div class="form-group">
								<label for="tanggal_lahir">Tanggal Lahir : </label>
								<?php if (form_error('tanggal_lahir')) : ?>
								<input type="date" class="form-control form-control-warning form-txt-warning"
									id="tanggal_lahir" placeholder="<?= strip_tags(form_error('tanggal_lahir')) ?>"
									name="tanggal_lahir">
								<?php else : ?>
								<input type="date" class="form-control " id="tanggal_lahir"
									placeholder="Masukkan tanggal lahir dokter" name="tanggal_lahir"
									value="<?= set_value('tanggal_lahir') ?>">
								<?php endif ?>
							</div>
							<div class="form-group">
								<label for="alamat">Alamat : </label>
								<?php if (form_error('alamat')) : ?>
								<input type="text" class="form-control form-control-warning form-txt-warning"
									id="alamat" placeholder="<?= strip_tags(form_error('alamat')) ?>" name="alamat">
								<?php else : ?>
								<input type="text" class="form-control " id="alamat"
									placeholder="Masukkan alamat rumah dokter" name="alamat"
									value="<?= set_value('alamat') ?>">
								<?php endif ?>
							</div>
							<div class="form-group">
								<label>Foto Diri</label>
								<input type="file" name="img_diri" class="file-upload-default">
								<div class="input-group col-xs-12">
									<?php if (form_error('img_diri')) : ?>
									<input type="text"
										class="form-control file-upload-info form-control-warning form-txt-warning"
										disabled placeholder="<?= strip_tags(form_error('img_diri')) ?>">
									<?php else : ?>
									<input type="text" class="form-control file-upload-info" readonly
										placeholder="Unggah foto diri">
									<?php endif ?>
									<span class="input-group-append">
										<button class="file-upload-browse btn btn-primary" type="button">Upload</button>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama_belakang_u">Nama Belakang : </label>
								<?php if (form_error('nama_belakang_u')) : ?>
								<input type="text" class="form-control form-control-warning form-txt-warning"
									id="nama_belakang_u" placeholder="<?= strip_tags(form_error('nama_belakang_u')) ?>"
									name="nama_belakang_u">
								<?php else : ?>
								<input type="text" class="form-control " id="nama_belakang_u"
									placeholder="Masukkan nama belakang dokter" name="nama_belakang_u"
									value="<?= set_value('nama_belakang_u') ?>">
								<?php endif ?>
							</div>
							<div class="form-group">
								<label for="jenis_kelamin">Jenis Kelamin</label>
								<?php if (form_error('jenis_kelamin')) : ?>
								<select class="form-control form-control-warning form-txt-warning" id="jenis_kelamin"
									name="jenis_kelamin">
									<option value=""><?= strip_tags(form_error('jenis_kelamin')) ?></option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
								<?php else : ?>
								<select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
									<option value="">Pilih jenis kelamin</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
								<?php endif ?>
							</div>
							<div class="form-group">
								<label for="no_hp">Nomor Hp : </label>
								<?php if (form_error('no_hp')) : ?>
								<input type="text" class="form-control form-control-warning form-txt-warning"
									id="no_hp" placeholder="<?= strip_tags(form_error('no_hp')) ?>" name="no_hp">
								<?php else : ?>
								<input type="text" class="form-control " id="no_hp"
									placeholder="Masukkan nomor hp dokter" name="no_hp"
									value="<?= set_value('no_hp') ?>">
								<?php endif ?>
							</div>
						</div>
					</div>

					<div class="row mt-3">
						<div class="col-md-12">
							<h4 class="sub-title font-weight-bold">Keahlian Dokter</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="spesialis">Spesialis : </label>
								<?php if (form_error('spesialis')) : ?>
								<input type="text" class="form-control form-control-warning form-txt-warning"
									id="spesialis" placeholder="<?= strip_tags(form_error('spesialis')) ?>"
									name="spesialis">
								<?php else : ?>
								<input type="text" class="form-control " id="spesialis"
									placeholder="Masukkan spesialis dokter" name="spesialis"
									value="<?= set_value('spesialis') ?>">
								<?php endif ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="pengalaman">Lama Pengalaman : </label>
								<?php if (form_error('pengalaman')) : ?>
								<input type="text" class="form-control form-control-warning form-txt-warning"
									id="pengalaman" placeholder="<?= strip_tags(form_error('pengalaman')) ?>"
									name="pengalaman">
								<?php else : ?>
								<input type="text" class="form-control " id="pengalaman"
									placeholder="Masukkan berapa tahun pengalaman dokter" name="pengalaman"
									value="<?= set_value('pengalaman') ?>">
								<?php endif ?>
							</div>
						</div>
					</div>

					<div class="row mt-3">
						<div class="col-md-12">
							<h4 class="sub-title font-weight-bold">Data Keuangan</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="sharingfee_pers">Sharing Fee : </label>
								<?php if (form_error('sharingfee_pers')) : ?>
								<input type="text" class="form-control form-control-warning form-txt-warning"
									id="sharingfee_pers" placeholder="<?= strip_tags(form_error('sharingfee_pers')) ?>"
									name="sharingfee_pers">
								<?php else : ?>
								<input type="text" class="form-control " id="sharingfee_pers"
									placeholder="Masukkan jumlah sharing fee" name="sharingfee_pers"
									value="<?= set_value('sharingfee_pers') ?>">
								<?php endif ?>
							</div>
						</div>
					</div>

					<div class="row mt-3">
						<div class="col-md-12">
							<h4 class="sub-title font-weight-bold">Akun Dokter</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Email : </label>
								<?php if (form_error('email')) : ?>
								<input type="text" class="form-control form-control-warning form-txt-warning" id="email"
									placeholder="<?= strip_tags(form_error('email')) ?>" name="email">
								<?php else : ?>
								<input type="text" class="form-control " id="email" placeholder="Masukkan email dokter"
									name="email" value="<?= set_value('email') ?>">
								<?php endif ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="password">Password : </label>
								<?php if (form_error('password')) : ?>
								<input type="password" class="form-control form-control-warning form-txt-warning"
									id="password" placeholder="<?= strip_tags(form_error('password')) ?>"
									name="password">
								<?php else : ?>
								<input type="password" class="form-control " id="password"
									placeholder="Masukkan password untuk akun dokter" name="password"
									value="<?= set_value('password') ?>">
								<?php endif ?>
								<input type="hidden" name="level" value="Dokter">
								<input type="hidden" name="id_user" value="<?= $new_id_user?>">
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary mr-2" type="submit">Tambah</button>
					<a href="<?= base_url('daftar-dokter/')?>" class="btn btn-light">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
