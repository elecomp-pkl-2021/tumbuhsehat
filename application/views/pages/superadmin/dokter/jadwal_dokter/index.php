<?php $no=1?>
<div class="berhasil" data-flashdata="<?php echo $this->session->flashdata('berhasil'); ?>"></div>
<div class="gagal" data-flashdata="<?php echo $this->session->flashdata('gagal'); ?>"></div>
<div class="nama" data-flashdata="Jadwal Dokter"></div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Daftar Jadwal Dokter</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<a href="<?= base_url('jadwal-dokter/tambah')?>" class="btn btn-success">Tambah Data</a>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table p-3" id="data_table">
							<thead>
								<tr>
									<th>#</th>
									<th>Hari</th>
									<th>Jam Mulai-Tutup</th>
									<th>Nama Dokter</th>
									<th>Kuota</th>
									<th>Keterangan</th>
									<th class="nosort">&nbsp;</th>
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
									<td><?= $j->nama_dokter?></td>
									<td><?= $j->kuota?></td>
									<td><?= $j->ket?></td>
									<td>
										<div class="table-actions">
											<a href="<?= base_url('jadwal-dokter/edit/'). $j->id_jadwal?>"><i
													class="ik ik-edit text-success"></i></a>
											<a href="<?= base_url('jadwal-dokter/hapus/'). $j->id_jadwal?>"
												class="btn-hapus"><i class="ik ik-trash-2 text-danger"></i></a>
										</div>
									</td>
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
