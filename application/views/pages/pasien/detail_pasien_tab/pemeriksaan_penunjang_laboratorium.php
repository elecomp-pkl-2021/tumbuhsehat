<div class="col-md-12">
	<div class="row">
		<div class="col">
			<div class="border-checkbox-section">
				<?php if (strpos($info_lab['laboratorium'], 'Darah Rutin') !== false) : ?>
				<div class="border-checkbox-group border-checkbox-group-primary">
					<input class="border-checkbox" type="checkbox" id="checkbox1" checked disabled>
					<label class="border-checkbox-label font-weight-bold text-dark" for="checkbox1">Darah Rutin</label>
				</div>
				<div class="border-checkbox-group border-checkbox-group-primary">
					<input class="border-checkbox" type="checkbox" id="checkbox2" disabled>
					<label class="border-checkbox-label font-weight-bold text-dark" for="checkbox2">Lainya</label>
				</div>
				<?php else : ?>
				<div class="border-checkbox-group border-checkbox-group-primary">
					<input class="border-checkbox" type="checkbox" id="checkbox1" disabled>
					<label class="border-checkbox-label font-weight-bold text-dark" for="checkbox1">Darah Rutin</label>
				</div>
				<div class="border-checkbox-group border-checkbox-group-primary">
					<input class="border-checkbox" type="checkbox" id="checkbox2" checked disabled>
					<label class="border-checkbox-label font-weight-bold text-dark" for="checkbox2">Lainya</label>
				</div>
				<?php endif?>
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				<?php if (strpos($info_lab['laboratorium'], 'Darah Rutin') !== false) : ?>
				<input type="text" class="form-control" value="" readonly>
				<?php else: ?>
				<input type="text" class="form-control" value="<?= $info_lab['laboratorium']?>" readonly>
				<?php endif?>
			</div>
		</div>
	</div>

	<div class="row mt-1">
		<div class="col">
			<textarea class="form-control" id="exampleTextarea1" rows="4" readonly><?= $info_lab['keterangan_laboratorium']?></textarea>
		</div>
	</div>
	<div class="row mt-3">
	<div class="col">
			<input type="hidden" name="foto_radiologi_download" id="foto_radiologi_download" value="<?= $info_lab['foto_laboratorium']?>">
			<?php if($info_lab['foto_laboratorium'] != null): ?>
			<button class="btn btn-danger mb-3" onclick="download_foto_laboratorium()">Download Foto</button>
			<?php else: ?>
			<button class="btn btn-danger mb-3"">Tidak Ada Foto</button>
			<?php endif?>
		</div>
	</div>
</div>
