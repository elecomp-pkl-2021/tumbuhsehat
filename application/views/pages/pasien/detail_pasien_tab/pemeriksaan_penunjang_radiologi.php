<div class="col-md-12">
	<div class="row">
		<div class="col">
			<div class="border-checkbox-section">
				<div class="border-checkbox-group border-checkbox-group-primary">
					<?php if(strpos($info_radiologi['radiologi'], 'Panoramik') !== false) : ?>
					<input class="border-checkbox" type="checkbox" id="checkbox1" disabled checked>
					<?php else : ?>
					<input class="border-checkbox" type="checkbox" id="checkbox1" disabled>
					<?php endif?>
					<label class="border-checkbox-label font-weight-bold text-dark" for="checkbox1">Panoramik</label>
				</div>
				<div class="border-checkbox-group border-checkbox-group-primary">
					<?php if(strpos($info_radiologi['radiologi'], 'Sefalometri') !== false) : ?>
					<input class="border-checkbox" type="checkbox" id="checkbox1" disabled checked>
					<?php else : ?>
					<input class="border-checkbox" type="checkbox" id="checkbox1" disabled>
					<?php endif?>
					<label class="border-checkbox-label font-weight-bold text-dark" for="checkbox2">Sefalometri </label>
				</div>
				<div class="border-checkbox-group border-checkbox-group-primary">
					<?php if(strpos($info_radiologi['radiologi'], 'Transcranial') !== false) : ?>
					<input class="border-checkbox" type="checkbox" id="checkbox1" disabled checked>
					<?php else : ?>
					<input class="border-checkbox" type="checkbox" id="checkbox1" disabled>
					<?php endif?>
					<label class="border-checkbox-label font-weight-bold text-dark"
						for="checkbox3">Transcranial</label>
				</div>
				<div class="border-checkbox-group border-checkbox-group-primary">
					<?php if(strpos($info_radiologi['radiologi'], 'Dental Regio') !== false) : ?>
					<input class="border-checkbox" type="checkbox" id="checkbox1" disabled checked>
					<?php else : ?>
					<input class="border-checkbox" type="checkbox" id="checkbox1" disabled>
					<?php endif?>
					<label class="border-checkbox-label font-weight-bold text-dark" for="checkbox4">Dental,
						Regio</label>
				</div>
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				<input type="text" class="form-control" value="<?= $info_radiologi['gigi'] ?>" readonly
					name="elemen_gigi">
			</div>
		</div>
	</div>

	<div class="row mt-1">
		<div class="col">
			<textarea class="form-control" id="exampleTextarea1" rows="4" readonly
				name="keterangan"><?= $info_radiologi['keterangan_radiologi']?></textarea>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col">
			<input type="hidden" name="foto_radiologi_download" id="foto_radiologi_download" value="$info_radiologi['foto_radiologi']">
			<?php if($info_radiologi['foto_radiologi'] != null): ?>
			<button class="btn btn-danger mb-3" onclick="download_foto_radiologi()">Download Foto</button>
			<?php else: ?>
			<button class="btn btn-danger mb-3"">Tidak Ada Foto</button>
			<?php endif?>
		</div>
	</div>
</div>
