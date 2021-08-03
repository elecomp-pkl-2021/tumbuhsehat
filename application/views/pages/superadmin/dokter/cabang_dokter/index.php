<?php $no=1?>
<div class="berhasil" data-flashdata="<?php echo $this->session->flashdata('berhasil'); ?>"></div>
<div class="gagal" data-flashdata="<?php echo $this->session->flashdata('gagal'); ?>"></div>
<div class="nama" data-flashdata="Daftar Cabang Dokter"></div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Daftar Cabang Dokter</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<a href="<?= base_url('cabang-dokter/tambah')?>" class="btn btn-success">Tambah Data</a>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table p-3" id="data_table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama Cabang</th>
									<th>Nama Dokter</th>
									<th class="nosort">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($cabang as $c): ?>
								<tr>
									<td><?= $no?></td>
									<td><?= $c->nama_cabang?></td>
									<td><?= $c->nama_dokter?></td>
									<td>
										<div class="table-actions">
											<a href="<?= base_url('cabang-dokter/edit/'). $c->id_cbdokter?>"><i
													class="ik ik-edit text-success"></i></a>
											<a href="<?= base_url('cabang-dokter/hapus/'). $c->id_cbdokter?>"
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
