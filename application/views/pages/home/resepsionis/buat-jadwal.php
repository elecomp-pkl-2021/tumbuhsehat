<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3>Buat Jadwal Pemeriksaan</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= base_url() ?>Klinik/add_booking">

                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <!-- your steps here -->
                            <div class="step" data-target="#jadwal-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="jadwa;-part"
                                    id="jadwal-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Pilih Jadwal</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#data-diri-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="data-diri-part"
                                    id="data-diri-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Data Diri</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#keluhan-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="keluhan-part"
                                    id="keluhan-part-trigger">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Keluhan</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#pembayaran-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="pembayaran-part"
                                    id="pembayaran-part-trigger">
                                    <span class="bs-stepper-circle">4</span>
                                    <span class="bs-stepper-label">Pembayaran</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#konfirmasi-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="konfirmasi-part"
                                    id="konfirmasi-part-trigger">
                                    <span class="bs-stepper-circle">5</span>
                                    <span class="bs-stepper-label">Konfirmasi</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <!-- your steps content here -->
                            <div id="jadwal-part" class="content" role="tabpanel" aria-labelledby="jadwal-part-trigger">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <label>Cari Akun Keluarga</label>
                                            <select class="select2bs4" name="akun_klg" id="akun_klg"
                                                style="width: 100%;" onchange="pilih_pasien(this.value)">
                                                <option disabled selected><?= "Pilih Akun Keluarga" ?></option>
                                                <?php foreach ($keluarga as $k) : ?>
                                                <option value="<?= $k->id_user ?>">
                                                    <?= $k->nama_depan_u . ' ' .  $k->nama_belakang_u . ' - ' . $k->no_hp ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label>Pilih Profil Calon Pasien</label> <b style="color: blue;"
                                                id="buatPasienBaru"></b>
                                            <select class="select2bs4" name="id_pasien" id="id_pasien"
                                                style="width: 100%;">
                                                <option><?= "Pilih Profil Pasien" ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-md-6 col-12">
                                            <label>Pilih Cabang</label>
                                            <select class="select2bs4" name="id_cabang" id="cabang"
                                                style="width: 100%;">
                                                <option disabled selected><?= "Pilih Cabang Klinik" ?></option>
                                                <?php foreach ($cabang as $c) : ?>
                                                <option value="<?= $c->id_cabang ?>"><?= $c->nama_cabang ?> -
                                                    <?= $c->alamat ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label>Pilih Dokter</label>
                                            <select class="select2bs4" name="id_dokter" id="dokter"
                                                style="width: 100%;">
                                                <option disabled selected><?= "Pilih Dokter" ?></option>
                                                <?php foreach ($dokter as $d) : ?>
                                                <option value="<?= $d->id_dokter ?>"><?= $d->nama_dokter ?> -
                                                    <?= $d->spesialis ?>
                                                    (Pengalaman = <?= $d->pengalaman ?> Tahun)</option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary">Buat Jadwal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="data-diri-part" class="content" role="tabpanel"
                                aria-labelledby="data-diri-part-trigger">

                            </div>
                            <div id="keluhan-part" class="content" role="tabpanel"
                                aria-labelledby="keluhan-part-trigger">

                            </div>
                            <div id="pembayaran-part" class="content" role="tabpanel"
                                aria-labelledby="pembayaran-part-trigger">

                            </div>
                            <div id="konfirmasi-part" class="content" role="tabpanel"
                                aria-labelledby="konfirmasi-part-trigger">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

</script>