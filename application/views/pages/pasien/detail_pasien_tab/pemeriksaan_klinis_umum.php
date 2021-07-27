<div class="col-md-6">
	<h4 class="sub-title font-weight-bold">Pemeriksaan Ekstra
		Oral</h4>
	<table style="width:100%" class="mb-3">
		<tr style="height:30px">
			<td style="width:40%;" class="font-weight-bold">
				Wajah</td>
			<td><?= $info_klinis_umum['wajah']?></td>
		</tr>
		<tr style="height:30px">
			<td style="width:40%;" class="font-weight-bold">
				Bibir</td>
			<td><?= $info_klinis_umum['bibir']?></td>
		</tr>
		<tr style="height:30px">
			<td style="width:40%;" class="font-weight-bold">
				Kelenjar Getah Bening</td>
		</tr>
		<tr style="height:30px">
			<td style="width:40%;" class="font-weight-bold pl-3">
				Submandibula Kanan</td>
			<td><?= $info_klinis_umum['submandibula_kanan']?>
			</td>
		</tr>
		<tr style="height:30px">
			<td style="width:40%;" class="font-weight-bold pl-3">
				Submandibula Kiri</td>
			<td><?= $info_klinis_umum['submandibula_kiri']?></td>
		</tr>
		<tr style="height:30px">
			<td style="width:40%;" class="font-weight-bold pl-3">
				Lainnya</td>
			<td><?= $info_klinis_umum['lainnya']?></td>
		</tr>
	</table>
</div>
<div class="col-md-6">
	<h4 class="sub-title font-weight-bold">Pemeriksaan Intra
		Oral</h4>
	<div class="row">
		<div class="col">
			<table style="width:100%">
				<tr style="height:30px">
					<td style="width:40%;" class="font-weight-bold">
						Gingiva</td>
					<td><?= $info_klinis_umum['gingiva']?></td>
				</tr>
				<tr style="height:30px">
					<td style="width:40%;" class="font-weight-bold">
						Debris</td>
					<td><?= $info_klinis_umum['debris']?></td>
				</tr>
				<tr style="height:30px">
					<td style="width:40%;" class="font-weight-bold">
						Stain</td>
					<td><?= $info_klinis_umum['stain']?></td>
				</tr>
				<tr style="height:30px">
					<td style="width:40%;" class="font-weight-bold">
						Kalkulus</td>
					<td><?= $info_klinis_umum['kalkulus']?></td>
				</tr>
				<tr style="height:30px">
					<td style="width:40%;" class="font-weight-bold">
						Mukosa</td>
					<td><?= $info_klinis_umum['mukosa']?></td>
				</tr>
			</table>
		</div>
		<div class="col">
			<table style="width:100%">
				<tr style="height:30px">
					<td style="width:40%;" class="font-weight-bold">
						Palatum
					</td>
					<td><?= $info_klinis_umum['palatum']?></td>
				</tr>
				<tr style="height:30px">
					<td style="width:40%;" class="font-weight-bold">
						Lidah
					</td>
					<td><?= $info_klinis_umum['lidah']?></td>
				</tr>
				<tr style="height:30px">
					<td style="width:40%;" class="font-weight-bold">
						Dasar
						Mulut
					</td>
					<td><?= $info_klinis_umum['dasar_mulut']?></td>
				</tr>
				<tr style="height:30px">
					<td style="width:40%;" class="font-weight-bold">
						Hubungan Rahang</td>
					<td>
						<?php if($info_klinis_umum['hubungan_rahang'] != null): ?>
						<?= $info_klinis_umum['hubungan_rahang']?>
						<?php else:?>
						-
						<?php endif?>
					</td>
				</tr>
				<tr style="height:30px">
					<td style="width:40%;" class="font-weight-bold"> Kelainan Gigi Geligi</td>
					<td>
						<?php if($info_klinis_umum['kelainan_gigi_geligi'] != null): ?>
						<?= $info_klinis_umum['kelainan_gigi_geligi']?>
						<?php else:?>
						-
						<?php endif?>
					</td>
				</tr>
				<tr style="height:30px">
					<td style="width:40%;" class="font-weight-bold">
						Lainnya
					</td>
					<td>Tidak ada</td>
				</tr>
			</table>
		</div>
	</div>
</div>
