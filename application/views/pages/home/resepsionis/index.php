<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3>Buat Janji Pemeriksaan</h3>
            </div>
            <div class="card-body">
                <form method="GET" action="">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label>Cari Akun Keluarga</label>
                                <select class="select2bs4" name="akun_klg" id="akun_klg" style="width: 100%;"
                                    onchange="pilih_pasien(this.value)">
                                    <option><?= "Pilih Akun Keluarga" ?></option>
                                    <?php foreach ($keluarga as $k) : ?>
                                    <option value="<?= $k->id_user ?>">
                                        <?= $k->nama_depan_u . ' ' .  $k->nama_belakang_u . ' - ' . $k->no_hp ?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label>Pilih Profil</label>
                                <select class="select2bs4" name="profil" id="profil" style="width: 100%;">
                                    <option><?= "Pilih Profil Pasien" ?></option>
                                    <option><?= "isi data 1" ?></option>
                                    <option><?= "isi data 2" ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-6 col-12">
                                <label>Pilih Cabang</label>
                                <select class="select2bs4" name="cabang" id="cabang" style="width: 100%;">
                                    <option><?= "Pilih Cabang Klinik" ?></option>
                                    <option><?= "isi data 1" ?></option>
                                    <option><?= "isi data 2" ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label>Pilih Dokter</label>
                                <select class="select2bs4" name="dokter" id="dokter" style="width: 100%;">
                                    <option><?= "Pilih Dokter" ?></option>
                                    <option><?= "isi data 1" ?></option>
                                    <option><?= "isi data 2" ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Cari Jadwal</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>