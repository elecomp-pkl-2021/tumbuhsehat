<?php $no=1;?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Detail Data Dokter</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-3 border-right">
						<center>
							<img src="<?= base_url('uploads/foto_dokter/').$dokter['foto']?>"
								alt="foto <?= $dokter['nama_dokter']?>" class="img img-fluid img-thumbnail"
								width="250px">
						</center>
					</div>
					<div class="col-md-9">
						<nav>
							<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-umum-tab" data-toggle="tab" href="#nav-umum"
									role="tab" aria-controls="nav-umum" aria-selected="true">Informasi Umum</a>
								<a class="nav-item nav-link" id="nav-cabang-dokter-tab" data-toggle="tab"
									href="#nav-cabang-dokter" role="tab" aria-controls="nav-cabang-dokter"
									aria-selected="false">Informasi Cabang Kerja Dokter</a>
								<a class="nav-item nav-link" id="nav-jadwal-dokter-tab" data-toggle="tab"
									href="#nav-jadwal-dokter" role="tab" aria-controls="nav-jadwal-dokter"
									aria-selected="false">Informasi Jadwal Dokter</a>
							</div>
						</nav>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active p-3" id="nav-umum" role="tabpanel"
								aria-labelledby="nav-home-tab">
								<div class="row mt-3">
									<div class="col-md-6">
										<h4 class="sub-title font-weight-bold">Data Diri Dokter</h4>
										<div class="row">
											<div class="col">
												<table style="width:100%">
													<tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Nama Dokter</td>
														<td><?= $dokter['nama_dokter']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Tanggal Lahir</td>
														<td><?= $user['tanggal_lahir']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Jenis Kelamin</td>
														<td><?= $user['jenis_kelamin']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Email</td>
														<td><?= $user['email']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">No. HP</td>
														<td><?= $user['no_hp']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Alamat</td>
														<td><?= $user['alamat']?></td>
													</tr>
												</table>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<h4 class="sub-title font-weight-bold">Data Keahlian Dokter</h4>
										<div class="row">
											<div class="col">
												<table style="width:100%">
													<tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Spesialis</td>
														<td><?= $dokter['spesialis']?></td>
													</tr>
													<tr style="height:30px">
														<td class="font-weight-bold">Lama Pengalaman</td>
														<td><?= $dokter['pengalaman']?> Tahun</td>
													</tr>
												</table>
											</div>
										</div>
									</div>
								</div>
								<div class="row mt-4 pt-4">
									<div class="col-md-12">
										<h4 class="sub-title font-weight-bold">Data Sharing Fee Personal Dokter</h4>
										<table style="width:100%">
											<tr style="height:30px">
												<td style="width:19.5%;" class="font-weight-bold">Persentase Sharing Fee
												</td>
												<td><?= $dokter['sharingfee_pers']?> %</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="tab-pane fade show p-3" id="nav-cabang-dokter" role="tabpanel"
								aria-labelledby="nav-home-tab">
								<div class="row mt-3">
									<div class="col-md-12">
										<h4 class="sub-title font-weight-bold">Lokasi Klinik Kerja Dokter</h4>
										<?php foreach($cabang as $c):?>
										<table class="mt-2">
											<tr style="height:30px">
												<td style="width: 1%;"><i class="ik ik-map-pin"></i></td>
												<td style="width:40%;" class="font-weight-bold"><?= $c->nama_cabang?>
												</td>
											</tr>
											<tr>
												<td style="width: 1%;">&nbsp;</td>
												<td><?= $c->alamat?></td>
											</tr>
										</table>
										<?php endforeach?>
									</div>
								</div>
							</div>
							<div class="tab-pane fade show p-3" id="nav-jadwal-dokter" role="tabpanel"
								aria-labelledby="nav-home-tab">
								<div class="row mt-3">
									<div class="col-md-12">
										<h4 class="sub-title font-weight-bold">Jadwal Dokter</h4>
										<table class="table p-3" id="data_table">
											<thead>
												<tr>
													<th>#</th>
													<th>Hari</th>
													<th>Jam Mulai-Tutup</th>
													<th>Kuota</th>
													<th>Keterangan</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($jadwal as $j): ?>
												<tr>
													<td><?= $no?></td>
													<td>
														<?php if($j->hari == "Mon") : ?>
														Senin
														<?php elseif($j->hari == "Tue"):?>
														Selasa
														<?php elseif($j->hari == "Wed"):?>
														Rabu
														<?php elseif($j->hari == "Thur"):?>
														Kamis
														<?php elseif($j->hari == "Fri"):?>
														Jumat
														<?php elseif($j->hari == "Sat"):?>
														Sabtu
														<?php elseif($j->hari == "Sun"):?>
														Minggu
														<?php else:?>
														<?php endif?>
													</td>
													<td><?= $j->jam_mulai?> - <?= $j->jam_tutup?></td>
													<td><?= $j->kuota?></td>
													<td><?= $j->ket?></td>
												</tr>
												<?php $no++?>
												<?php endforeach?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<a href="<?= base_url('daftar-dokter')?>" class="btn btn-light">Kembali</a>
			</div>
		</div>
	</div>
</div>
