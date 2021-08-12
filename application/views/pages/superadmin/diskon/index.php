<?php $no=1?>
<div class="berhasil" data-flashdata="<?php echo $this->session->flashdata('berhasil'); ?>"></div>
<div class="gagal" data-flashdata="<?php echo $this->session->flashdata('gagal'); ?>"></div>
<div class="nama" data-flashdata="Diskon"></div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Daftar Diskon</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<a href="<?= base_url('/diskon/tambah')?>" class="btn btn-success">Tambah Data</a>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table p-3" id="data_table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama Diskon</th>
									<th>Persentase Diskon</th>
									<th>Status Diskon</th>
									<th class="nosort">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($diskon as $d): ?>
								<tr>
									<td><?= $no?></td>
									<td><?= $d->nama_diskon?></td>
									<td><?= $d->nilai_diskon?></td>
									<td>
										<?php if ($d->status_diskon == "1") :?>
										<span class="badge badge-success">Aktif</span>
										<?php else: ?>
										<span class="badge badge-warning">Tidak Aktif</span>
										<?php endif?>
									</td>
									<td>
										<div class="table-actions">
											<a href="<?= base_url('/diskon/edit/'). $d->id_diskon?>"><i
													class="ik ik-edit text-success"></i></a>
											<a href="<?= base_url('/diskon/hapus/'). $d->id_diskon?>"
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
