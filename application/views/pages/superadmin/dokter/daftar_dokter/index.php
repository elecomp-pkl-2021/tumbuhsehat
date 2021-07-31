<?php $no=1?>
<div class="berhasil" data-flashdata="<?php echo $this->session->flashdata('berhasil'); ?>"></div>
<div class="gagal" data-flashdata="<?php echo $this->session->flashdata('gagal'); ?>"></div>
<div class="nama" data-flashdata="Daftar Dokter"></div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Daftar Dokter</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<a href="<?= base_url('daftar-dokter/tambah')?>" class="btn btn-success">Tambah Data</a>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table p-3" id="data_table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama</th>
									<th>Spesialis</th>
									<th>Pengalaman</th>
									<th class="nosort">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($dokter as $d): ?>
								<tr>
									<td><?= $no?></td>
									<td><?= $d->nama_dokter?></td>
									<td><?= $d->spesialis?></td>
									<td><?= $d->pengalaman?> Tahun</td>
									<td>
										<div class="table-actions">
										<a href="<?= base_url('daftar-dokter/detail/'). $d->id_dokter.'/'.$d->id_user?>"><i
													class="ik ik-eye text-primary"></i></a>
											<a href="<?= base_url('daftar-dokter/edit/'). $d->id_dokter.'/'.$d->id_user?>"><i
													class="ik ik-edit text-success"></i></a>
											<a href="<?= base_url('daftar-dokter/hapus/'). $d->id_dokter.'/'.$d->id_user?>"
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
