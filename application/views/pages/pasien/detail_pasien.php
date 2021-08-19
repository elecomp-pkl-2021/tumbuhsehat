<?php 
    $awal  = strtotime($info['tanggal_lahir']); 
    $akhir = time(); 
    $diff  = $akhir - $awal;
	$id_pasien = $info_umum['id_pasien'];
?>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header justify-content-between">
				<h3>Informasi Pasien</h3>
			</div>
			<div class="card-body">
				<div class="row mb-4">
					<div class="col-md-4">
						<h5 class="mb-3"><?= $info['nama_depan']?> <?= $info['nama_belakang']?></h5>
						<p><?= $info['jenis_kelamin']?>, <?= floor($diff / (60 * 60 * 24 * 365)) . ' Tahun'?></p>
						<p><?= $info['hubungan']?></p>
						<p>No. Rekam Medis <span class="font-weight-bold"><?= $info['id_rekam_medis']?></span></p>
					</div>
					<div class="col-md-4">
						<h5 class="mb-3">Pemeriksaan terdekat</h5>
						<p><?= $info['tanggal_rencana']?> <span class="ml-4"><?= $info['nama_dokter']?></span></p>
						<p>(<?= $info['jam_rencana_mulai']?> - <?= $info['jam_rencana_selesai']?>)
							<?php if($info['status'] == "0"): ?>
							<span class="badge badge-pill badge-warning ml-4">Menunggu Pendaftaran</span>
							<?php else: ?>
							<span class="badge badge-pill badge-success ml-4">Telah terdaftar</span>
							<?php endif?>
						</p>
					</div>
					<div class="col-md-4">
						<h5 class="mb-3">Kontak Pasien</h5>
						<p><span class="font-weight-bold">No HP : </span><?= $info['no_hp']?></p>
						<p><span class="font-weight-bold">Email : </span><?= $info['email']?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<nav>
							<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-umum-tab" data-toggle="tab" href="#nav-umum"
									role="tab" aria-controls="nav-umum" aria-selected="true">Umum</a>
								<a class="nav-item nav-link" id="nav-pemeriksaan-klinis-tab" data-toggle="tab"
									href="#nav-pemeriksaan-klinis" role="tab" aria-controls="nav-pemeriksaan-klinis"
									aria-selected="false">Pemeriksaan
									Klinis</a>
								<a class="nav-item nav-link" id="nav-pemeriksan-penunjang-tab" data-toggle="tab"
									href="#nav-pemeriksan-penunjang" role="tab" aria-controls="nav-pemeriksan-penunjang"
									aria-selected="false">Pemeriksaan
									Penunjang</a>
								<a class="nav-item nav-link" id="nav-rekam-medis-tab" data-toggle="tab"
									href="#nav-rekam-medis" role="tab" aria-controls="nav-rekam-medis"
									aria-selected="false">Summary Rekam Medis</a>
								<a class="nav-item nav-link" id="nav-odontogram-tab" data-toggle="tab"
									href="#nav-odontogram" role="tab" aria-controls="nav-odontogram"
									aria-selected="false">Odontogram</a>
								<a class="nav-item nav-link" id="nav-pembayaran-tab" data-toggle="tab"
									href="#nav-pembayaran" role="tab" aria-controls="nav-pembayaran"
									aria-selected="false">Metode Pembayaran</a>
							</div>
						</nav>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active p-3" id="nav-umum" role="tabpanel"
								aria-labelledby="nav-home-tab">
								<div class="row mt-3">
									<div class="col-md-6">
										<h4 class="sub-title font-weight-bold">Data Diri</h4>
										<div class="row">
											<div class="col">
												<table style="width:100%">
													<tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Nama Depan</td>
														<td><?= $info_umum['nama_depan']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Tempat Lahir</td>
														<td><?= $info_umum['tempat_lahir']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Jenis Kelamin</td>
														<td><?= $info_umum['jenis_kelamin']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Pekerjaan</td>
														<td><?= $info_umum['pekerjaan']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Jenis ID</td>
														<td><?= $info_umum['jenis_id']?></td>
													</tr>
												</table>
											</div>
											<div class="col">
												<table style="width:100%">
													<tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Nama Belakang
														</td>
														<td><?= $info_umum['nama_belakang']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Tanggal Lahir</td>
														<td><?= $info_umum['tanggal_lahir']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Status Pernikahan</td>
														<td><?= $info_umum['status_nikah']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Pendidikan</td>
														<td><?= $info_umum['pendidikan']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">No ID</td>
														<td><?= $info_umum['no_id']?></td>
													</tr>
												</table>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<h4 class="sub-title font-weight-bold">Informasi Orang Terdekat</h4>
										<div class="row">
											<div class="col">
												<table style="width:100%">
													<tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Nama
															Depan</td>
														<td><?= $info_umum['nama_depan_dekat']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Tempat Lahir</td>
														<td><?= $info_umum['tempat_lahir_dekat']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Jenis Kelamin</td>
														<td><?= $info_umum['jenis_kelamin_dekat']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Jenis ID</td>
														<td><?= $info_umum['jenis_id_dekat']?></td>
													</tr>
												</table>
											</div>
											<div class="col">
												<table style="width:100%">
													<tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Nama Belakang
														</td>
														<td><?= $info_umum['nama_belakang_dekat']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Tanggal Lahir</td>
														<td><?= $info_umum['tanggal_lahir_dekat']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Hub. Pasien</td>
														<td><?= $info_umum['hubungan_dekat']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">No ID</td>
														<td><?= $info_umum['no_id_dekat']?></td>
													</tr>
												</table>
											</div>
										</div>
									</div>
								</div>

								<div class="row mt-4">
									<div class="col-md-6">
										<h4 class="sub-title font-weight-bold">Alamat & Kontak yang bisa
											dihubungi</h4>
										<div class="row">
											<div class="col">
												<table style="width:100%">
													<tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Nama
															Jalan</td>
														<td><?= $info_umum['alamat']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Kota/Kab</td>
														<td><?= $info_umum['kota_kab']?></td>
													</tr>
												</table>
											</div>
											<div class="col">
												<table style="width:100%">
													<tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">
															Provinsi
														</td>
														<td><?= $info_umum['provinsi']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Kode Pos</td>
														<td><?= $info_umum['kode_pos']?></td>
													</tr>
												</table>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<h4 class="sub-title font-weight-bold">Alamat & Kontak Orang
											Terdekat yang bisa dihubungi</h4>
										<div class="row">
											<div class="col">
												<table style="width:100%">
													<tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Nama
															Jalan</td>
														<td><?= $info_umum['alamat_dekat']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Kota/Kab</td>
														<td><?= $info_umum['kota_kab_dekat']?></td>
													</tr>
												</table>
											</div>
											<div class="col">
												<table style="width:100%">
													<tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">
															Provinsi
														</td>
														<td><?= $info_umum['provinsi_dekat']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Kode Pos</td>
														<td><?= $info_umum['kode_pos_dekat']?></td>
													</tr>
												</table>
											</div>
										</div>
									</div>
								</div>

								<div class="row mt-4">
									<div class="col-md-6">
										<h4 class="sub-title font-weight-bold">Kondisi Kesehatan Umum</h4>
										<div class="row">
											<div class="col">
												<table style="width:100%">
													<tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">
															Golongan
															Darah</td>
														<td><?= $info_umum['gol_darah']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Riwayat Penyakit</td>
														<td><?= $info_umum['alergi']?></td>
													</tr>
												</table>
											</div>
											<div class="col">
												<table style="width:100%">
													<tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">
															Alergi
															(bila ada)</td>
														<td><?= $info_umum['riwayat_penyakit']?></td>
													</tr>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade p-3" id="nav-pemeriksaan-klinis" role="tabpanel"
								aria-labelledby="nav-pemeriksaan-klinis-tab">
								<div class="row mt-3">
									<div class="col-md-12">
										<div class="row">
											<div class="col">
												<p class="font-weight-bold">Pemeriksaan Klinis Umum 
													<span class="ml-4 font-weight-normal"> 
														<?php if($info_klinis != null ) : ?>	
															(Terakhir Update <?= $info_klinis['tanggal_periksa']?>)
														<?php endif?>
													</span>
												</p>
											</div>
											<div class="col-3">
												<input class="form-control" type="date"
													id="filter_tanggal_pemeriksaan_klinis_umum">
											</div>
										</div>
										<div class="row">
											<div class="col">
												<hr>
											</div>
										</div>
										<?php if($info_klinis != null ) : ?>	
											<input id="id_pasien" value="<?= $info_klinis['id_pasien']?>" hidden>
											<?php else: ?>
											<input id="id_pasien" value="0" hidden>
										<?php endif?>
										<div class="row" id="tampilan_pemeriksaan_klinis_umum"></div>
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-md-12">
										<div class="row">
											<div class="col">
												<p class="font-weight-bold">Pemeriksaan Klinis Khusus 
													<span class="ml-4 font-weight-normal">
														<?php if($info_klinis != null ) : ?>	
															(Terakhir Update <?= $info_klinis['tanggal_periksa']?>)
														<?php endif?>
													</span>
												</p>
											</div>
											<div class="col-3">
												<input class="form-control" type="date"
													id="filter_tanggal_pemeriksaan_klinis_khusus">
											</div>
										</div>
										<div class="row">
											<div class="col">
												<hr>
											</div>
										</div>
										<div class="row" id="tampilan_pemeriksaan_klinis_khusus"></div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade p-3" id="nav-pemeriksan-penunjang" role="tabpanel"
								aria-labelledby="nav-pemeriksan-penunjang-tab">
								<div class="row mt-3">
									<div class="col-md-12">
										<div class="row">
											<div class="col">
												<p class="font-weight-bold">Radiologi 
													<span class="ml-4 font-weight-normal">
														<?php if($info_klinis != null ) : ?>	
															(Terakhir Update <?= $info_penunjang['tanggal_periksa']?>)
														<?php endif?>
													</span>
												</p>
											</div>
											<div class="col-3">
												<input class="form-control" type="date"
													id="filter_tanggal_pemeriksaan_penunjang_radiologi">
											</div>
										</div>
										<div class="row">
											<div class="col">
												<hr>
											</div>
										</div>
										<div class="row" id="tampilan_pemeriksaan_penunjang_radiologi">

										</div>
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-md-12">
										<div class="row">
											<div class="col">
												<p class="font-weight-bold">Laboratorium
													<span class="ml-4 font-weight-normal">
														<?php if($info_klinis != null ) : ?>	
															(Terakhir Update <?= $info_penunjang['tanggal_periksa']?>)
														<?php endif?>
													</span>
												</p>
											</div>
											<div class="col-3">
												<input class="form-control" type="date"
													id="filter_tanggal_pemeriksaan_penunjang_laboratorium">
											</div>
										</div>
										<div class="row">
											<div class="col">
												<hr>
											</div>
										</div>
										<div class="row" id="tampilan_pemeriksaan_penunjang_laboratorium">

										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade p-3" id="nav-rekam-medis" role="tabpanel"
								aria-labelledby="nav-rekam-medis-tab">
								<div class="row">
									<div class="col">
										<div class="d-flex">
											<div class="pt-3">
												<p class="font-weight-bold">Riwayat Rekam medis</p>
											</div>
											<div class="ml-auto pt-3">
												<div class="form-inline">
													<input class="form-control" type="date" id="filter_t">
													<select class="form-control ml-2" id="filter_p">
														<option>Pilih Dokter</option>
														<?php foreach($dokter as $d) : ?>
														<option value="<?= $d->id_dokter ?>"><?= $d->nama_dokter?>
														</option>
														<?php endforeach?>
													</select>
													<button type="submit" class="btn btn-warning ml-2 btn-sm"
														id="filter_all">Tampilkan</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<hr>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<table data-toggle="table" style="width: 100%;"
											data-url="<?php echo base_url('pasien_informasi/get_summary_rekam_medis/'.$info_umum['id_pasien']);?>"
											data-search="true" data-pagination="true" id="table_summary">
											<thead>
												<tr>
													<th data-formatter="runningFormatter" data-sortable="true"
														style="width:20%">No</th>
													<th data-field="nama_dokter" data-sortable="true" style="width:20%">
														Nama Dokter</th>
													<th data-field="tanggal_periksa" data-sortable="true"
														style="width:20%">Tanggal
														Periksa</th>
													<th data-field="jam_mulai_periksa|jam_selesai_periksa"
														data-sortable="true" data-align="right"
														data-formatter="jam_periksa" style="width:20%">Jam Pemeriksaan
													</th>
													<th data-field="keluhan_utama|keterangan|radiologi|keterangan_radiologi|keterangan_laboratorium"
														data-formatter="summary" data-sortable="true" style="width:20%">
														Summary</th>
												</tr>
											</thead>
										</table>
									</div>
								</div>
							</div>
							<div class="tab-pane fade p-3" id="nav-odontogram" role="tabpanel"
								aria-labelledby="nav-odontogram-tab">
								<?php foreach ($info_odontogram->result() as $info) : ?>
									<?php $tgl_latest_odontogram = $info->tanggal_periksa;?>
									<div class="row mt-3">
										<div class="col">
											<p class="font-weight-bold">Informasi Odontogram 
												<span class="font-weight-normal ml-2">(Terakhir update <?= $info->tanggal_periksa?>)</span> 
											</p>
										</div>
										<div class="col-3">
											<input class="form-control" type="date" id="filter_o">
										</div>
									</div>
									<div class="row">
										<div class="col">
											<hr>
										</div>
									</div>
								<?php endforeach;  ?>
								<div class="row d-flex justify-content-center mt-2" id="kota">

								</div>
							</div>
							<div class="tab-pane fade p-3" id="nav-pembayaran" role="tabpanel"
								aria-labelledby="nav-nav-pembayara">
								<div class="row mt-3">
									<div class="col-md-12">
										<h4 class="sub-title font-weight-bold">Informasi Pembayaran</h4>
										<div class="row">
											<div class="col-md-3 mb-3">
												<table style="width:100%">
													<tr style="height:30px">
														<td style="width:50%;" class="font-weight-bold">
															Jenis Pembayaran</td>
														<td><?= $info_bayar['nama_metode']?></td>
													</tr>
												</table>
											</div>
										</div>

										<?php if($info_bayar['nama_metode'] == "Asuransi") : ?>
										<h4 class="sub-title font-weight-bold mt-4">Detail Asuransi</h4>
										<div class="row">
											<div class="col-md-3">
												<table style="width:100%">
													<tr style="height:30px">
														<td style="width:50%;" class="font-weight-bold">
															Provider Asuransi</td>
														<td><?= $info_bayar['nama_provider']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">
															Kategori Asuransi</td>
														<td><?= $info_bayar['nama_kategori']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">
															Nomor Kartu Asuransi</td>
														<td><?= $info_bayar['nomor_asuransi']?></td>
													</tr>
												</table>
											</div>
											<div class="col">
												<p class="font-weight-bold">Foto Kartu Asuransi</p>
												<img src="<?= base_url('uploads/kartu_asuransi/')?><?= $info_bayar['foto_asuransi']?>"
													alt="" width="350px" class="img-thumbnail">
											</div>
										</div>
										<?php endif?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	var tgl_latest_odontogram = '<?= $tgl_latest_odontogram?>'
	var tgl_pemeriksaan = tgl_latest_odontogram;
	var id_pasien = <?php echo @$id_pasien ?>;

	$(document).ready(function () {
		load_odontogram_init();

		pemeriksaan_klinis_umum();
		$('#filter_tanggal_pemeriksaan_klinis_umum').change(function () {
			pemeriksaan_klinis_umum();
		});

		pemeriksaan_klinis_khusus();
		$('#filter_tanggal_pemeriksaan_klinis_khusus').change(function () {
			pemeriksaan_klinis_khusus();
		});

		pemeriksaan_penunjang_radiologi();
		$('#filter_tanggal_pemeriksaan_penunjang_radiologi').change(function () {
			pemeriksaan_penunjang_radiologi();
		});

		pemeriksaan_penunjang_laboratorium();
		$('#filter_tanggal_pemeriksaan_penunjang_laboratorium').change(function () {
			pemeriksaan_penunjang_laboratorium();
		});
		
		
		$('#filter_o').change(function () {
			load_odontogram();
		});

	});

	function pemeriksaan_klinis_umum() {
		var tgl = $('#filter_tanggal_pemeriksaan_klinis_umum').val();
		var id = $('#id_pasien').val();
		$.ajax({
			type: "POST",
			url: "<?= base_url('pasien_informasi/filter_pemeriksaan_klinis_umum') ?>",
			data: {
				tgl: tgl,
				id: id
			},
			success: function (data) {
				$('#tampilan_pemeriksaan_klinis_umum').html(data);
			}
		});
	}

	function pemeriksaan_klinis_khusus() {
		var tgl = $('#filter_tanggal_pemeriksaan_klinis_khusus').val();
		var id = $('#id_pasien').val();
		$.ajax({
			type: "POST",
			url: "<?= base_url('pasien_informasi/filter_pemeriksaan_klinis_khusus') ?>",
			data: {
				tgl: tgl,
				id: id
			},
			success: function (data) {
				$('#tampilan_pemeriksaan_klinis_khusus').html(data);
			}
		});
	}

	function pemeriksaan_penunjang_radiologi() {
		var tgl = $('#filter_tanggal_pemeriksaan_penunjang_radiologi').val();
		var id = $('#id_pasien').val();
		$.ajax({
			type: "POST",
			url: "<?= base_url('pasien_informasi/filter_pemeriksaan_penunjang_radiologi') ?>",
			data: {
				tgl: tgl,
				id: id
			},
			success: function (data) {
				$('#tampilan_pemeriksaan_penunjang_radiologi').html(data);
			}
		});
	}

	function download_foto_radiologi() {
		let foto = $('#foto_radiologi_download').val();
		window.location.href = "<?php echo base_url().'pasien_informasi/download_foto_radiologi/'?>" + foto;
	}

	function pemeriksaan_penunjang_laboratorium() {
		var tgl = $('#filter_tanggal_pemeriksaan_penunjang_laboratorium').val();
		var id = $('#id_pasien').val();
		$.ajax({
			type: "POST",
			url: "<?= base_url('pasien_informasi/filter_pemeriksaan_penunjang_laboratorium') ?>",
			data: {
				tgl: tgl,
				id: id
			},
			success: function (data) {
				$('#tampilan_pemeriksaan_penunjang_laboratorium').html(data);
			}
		});
	}

	function download_foto_laboratorium() {
		let foto = $('#foto_laboratorium_download').val();
		window.location.href = "<?php echo base_url().'pasien_informasi/download_foto_laboratorium/'?>" + foto;
	}

	function runningFormatter(value, row, index) {
		return index + 1;
	}

	function jam_periksa(value, row, index) {
		return row.jam_mulai_periksa + ' - ' + row.jam_selesai_periksa;
	}

	function summary(value, row, index) {
		return `
		  	<p class="font-weight-bold text-danger">S : <span class="font-weight-normal text-dark">${row.keluhan_utama}</span> </p>
		  	<p><font style="color: #F6336D; font-weight: bold; "> O : </font><span><b>Pemeriksaan Klinis Khusus: </b>${row.keterangan}</span>
		  	<p><b>Pemeriksaan Penunjang:</b>
		  		<ul>
		    		<li><b>Radiologi ${row.radiologi}: </b> ${row.keterangan_radiologi}</li>
		        	<li><b>Laboratorium: </b> ${row.keterangan_laboratorium}</li>
		    	</ul>
			</p>
		    <p><font style="color: #F6336D; font-weight: bold; "> A : </font><span>Gigi ${row.elemen_gigi} ${row.diagnosis}</span></p>
			<p><font style="color: #F6336D; font-weight: bold; "> P : </font><span>${row.layanan} ${row.elemen_gigi}(${row.detail_layanan})</span></p>
		`;
	}

	function load_odontogram() {
		let tgl_awal = $('#filter_o').val();
		tgl_pemeriksaan = $('#filter_o').val();
		let id_pasien3 = '<?php echo $info_umum['id_pasien'] ?>';
		$.get("<?php echo base_url() ?>pasien_informasi/create_load", {
			tgl_awal: tgl_awal,
			id_pasien3: id_pasien3
		}, function (data) {
			$('#kota').html(data);
		});
	}

	function load_odontogram_init() {
		var tgl_latest_odontogram = '<?= $tgl_latest_odontogram?>'		
		let tgl_awal = tgl_latest_odontogram;
		let id_pasien3 = '<?php echo $info->id_pasien ?>';

		$.get("<?php echo base_url() ?>pasien_informasi/create_load", {tgl_awal:tgl_awal, id_pasien3:id_pasien3}, function(data){
			$('#kota').html(data);
		});
	}

	$("#filter_all").click(function () {
		var tgl = $("#filter_t").val();
		var dokter = $("#filter_p").val();
		var id_pasien2 = '<?php echo $info_umum['id_pasien']?>';
		console.log(dokter);
		$('#table_summary').bootstrapTable('refresh', {
			url: '<?php echo base_url() ?>pasien_informasi/get_summary_rekam_medis/' + (id_pasien2 != "" ? id_pasien2 : '') + (dokter != "" ? '/' + dokter : '') + (tgl != "" ? '/' + tgl : '')
		});
	});

</script>
