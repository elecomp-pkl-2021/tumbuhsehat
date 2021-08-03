<?php $no=1?>
<div class="berhasil" data-flashdata="<?php echo $this->session->flashdata('berhasil'); ?>"></div>
<div class="gagal" data-flashdata="<?php echo $this->session->flashdata('gagal'); ?>"></div>
<div class="nama" data-flashdata="Layanan"></div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Daftar Layanan</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<a href="<?= base_url('layanan/tambah')?>" class="btn btn-success">Tambah Data</a>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table p-3" id="data_table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama layanan</th>
									<th>Harga</th>
									<th>Status</th>
									<th class="nosort">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($layanan as $l): ?>
								<tr>
									<td><?= $no?></td>
									<td class="nama_layanan"><?= $l->layanan?></td>
									<td><?= $l->harga?></td>
									<td>
										<?php if ($l->status == "1") :?>
										<span class="badge badge-success">Aktif</span>
										<?php else: ?>
										<span class="badge badge-warning">Tidak Aktif</span>
										<?php endif?>
									</td>
									<td>
										<div class="table-actions">
											<a href="<?= base_url('layanan/edit/'). $l->id_layanan?>"><i
													class="ik ik-edit text-success"></i></a>
											<a href="<?= base_url('layanan/hapus/'). $l->id_layanan?>"
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
