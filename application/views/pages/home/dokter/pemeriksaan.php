<div class="bs-stepper" id="stepper">
    <div class="card">
        <div class="bs-stepper-header" role="tablist">
            <!-- your steps here -->
            <div class="step" data-target="#anamnesa-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="anamnesa-part"
                    id="anamnesa-part-trigger">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label">Anamnesa</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#odontogram-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="odontogram-part"
                    id="odontogram-part-trigger">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">Odontogram (Before)</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#klinis-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="klinis-part"
                    id="klinis-part-trigger">
                    <span class="bs-stepper-circle">3</span>
                    <span class="bs-stepper-label">Pemeriksaan Klinis</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#diagnosa-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="diagnosa-part"
                    id="diagnosa-part-trigger">
                    <span class="bs-stepper-circle">4</span>
                    <span class="bs-stepper-label">Diagnosa</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#perawatan-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="perawatan-part"
                    id="perawatan-part-trigger">
                    <span class="bs-stepper-circle">5</span>
                    <span class="bs-stepper-label">Perawatan</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#odontogram-after-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="odontogram-after-part"
                    id="odontogram-after-part-trigger">
                    <span class="bs-stepper-circle">6</span>
                    <span class="bs-stepper-label">Odontogram (after)</span>
                </button>
            </div>
        </div>
    </div>
    <div class="bs-stepper-content">
        <!-- your steps content here -->
        <div id="anamnesa-part" class="content" role=" tabpanel" aria-labelledby="anamnesa-part-trigger"
            style="margin: 0 -1%;">
            <div class="card">
                <div class="mx-4">
                    <h4 class="mt-3">Data Pasien</h4>
                    <div class="line my-3"></div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="input-nama-depan">Nama Depan</label>
                            <input type="text" class="form-control" name="first-name" id="input-nama-depan" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input-nama-belakang">Nama belakang</label>
                            <input type="text" class="form-control" name="last-name" id="input-nama-belakang" value="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tempat Lahir</label>
                            <select class="select2bs4" name="tmp-lahir" id="tmp-lahir" style="width: 100%;">
                                <option disabled selected><?= "Pilih Tempat Lahir" ?></option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tgl-lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl-lahir" id="tgl-lahir" value="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="jns-kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jns-kelamin" id="jns-kelamin">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status-pernikahan">Status Pernikahan</label>
                            <select class="form-control" name="status-pernikahan" id="status-pernikahan">
                                <option>Pilih
                                    Status Pernikahan</option>
                                <option value="Menikah">
                                    Menikah</option>
                                <option value="Belum Menikah">
                                    Belum Menikah</option>
                                <option value="Duda">Duda
                                </option>
                                <option value="Janda">Janda
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="pekerjaan">Pekerjaan</label>
                            <select class="form-control" name="pekerjaan" id="pekerjaan">
                                <option>
                                    Pilih Pekerjaan
                                </option>
                                <option value="Aparatur Sipil Negara">
                                    Aparatur Sipil Negara
                                </option>
                                <option value="Pegawai BUMN">
                                    Pegawai BUMN
                                </option>
                                <option value="Pegawai Swasta">
                                    Pegawai Swasta
                                </option>
                                <option value="Wiraswasta">
                                    Wiraswasta
                                </option>
                                <option value="Tidak Bekerja">
                                    Tidak Bekerja
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pendidikan">Pendidikan</label>
                            <select class="form-control" name="pendidikan" id="pendidikan">
                                <option>Pilih
                                    Pendidikan
                                </option>
                                <option value="SMA/setaranya">
                                    SMA/setaranya
                                </option>
                                <option value="S1/S2/S3">
                                    S1/S2/S3
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="jns-id">Jenis ID</label>
                            <select class="form-control" name="jns-id" id="jns-id">
                                <option>Pilih Jenis ID</option>
                                <option value="Umum">Umum </option>
                                <option value="KTP"> KTP</option>
                                <option value="SIM"> SIM</option>
                                <option value="Paspor">Paspor </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="no-id">Nomer ID</label>
                            <input type="text" class="form-control" name="no-id" id="no-id" value="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="mx-4">
                    <h4 class="mt-3">Alamat dan Kontak</h4>
                    <div class="line my-3"></div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="no-hp">Nomor HP</label>
                            <input type="text" class="form-control" name="no-hp" id="no-hp" value="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Provinsi</label>
                            <select class="select2bs4" name="provinsi" id="provinsi" style="width: 100%;">
                                <option disabled selected><?= "Pilih Provinsi" ?></option>
                            </select>
                            <input type="hidden" name="provinsi-nama" id="pn" value="">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Kota</label>
                            <select class="select2bs4" name="kota" id="kota" style="width: 100%;">
                            </select>
                            <input type="hidden" name="kota-nama" id="kn" value="">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Kodepos</label>
                            <input type="text" class="form-control" name="kode-pos" id="kode-pos" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jalan">Nama Jalan</label>
                        <input type="text" class="form-control" name="jalan" id="jalan" value="">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="mx-4">
                    <h4 class="mt-4">Kondisi Kesehatan Umum</h4>
                    <div class="line my-3"></div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="gol-dar">Golongan Darah</label>
                            <select class="form-control" name="gol-dar" id="gol-dar">
                                <option>
                                    Pilih Golongan Darah
                                </option>
                                <option value="A">A</option>
                                <option value="AB">AB</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alergi">Alergi</label>
                            <input type="text" class="form-control" name="alergi" id="alergi" value=""
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rwyt-penyakit">Riwayat Penyakit Umum</label>
                        <input type="text" class="form-control" name="rwyt-penyakit" id="rwyt-penyakit" value=""
                            autocomplete="off">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
        </div>

        <div id="odontogram-part" class="content" role="tabpanel" aria-labelledby="odontogram-part-trigger"
            style="margin: 0 -1%;">
            <div class="card">
                <div class="mx-4">
                    <h4 class="mt-4">Ini odontogram</h4>
                    <div class="line my-3"></div>
                </div>
            </div>
            <button class="btn btn-secondary" onclick="stepper.previous()">Back</button>
            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
        </div>

        <div id="klinis-part" class="content" role="tabpanel" aria-labelledby="klinis-part-trigger"
            style="margin: 0 -1%;">
            <div class="card">
                <div class="mx-4">
                    <h4 class="mt-4">Pemeriksaan Klinis Umum</h4>
                    <div class="line my-3"></div>
                    <div class="form-group">
                        <p><b>Wajah</b></p>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="simetri-wajah" name="oral-wajah" class="custom-control-input"
                                value="Simetri">
                            <label class="custom-control-label" for="simetri-wajah">Simetri</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="asimetri-wajah" name="oral-wajah" class="custom-control-input"
                                value="Asimetri">
                            <label class="custom-control-label" for="asimetri-wajah">Asimetri</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="mx-4">
                    <h4 class="mt-4">Pemeriksaan Intra Oral</h4>
                    <div class="line my-3"></div>
                </div>
            </div>
            <div class="card">
                <div class="mx-4">
                    <h4 class="mt-4">Pemeriksaan Klinis Khusus</h4>
                    <div class="line my-3"></div>
                </div>
            </div>
            <div class="card">
                <div class="mx-4">
                    <h4 class="mt-4">Pemeriksaan Penunjang</h4>
                    <div class="line my-3"></div>
                </div>
            </div>
            <button class="btn btn-secondary" onclick="stepper.previous()">Back</button>
            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
        </div>

        <div id="diagnosa-part" class="content" role="tabpanel" aria-labelledby="diagnosa-part-trigger"
            style="margin: 0 -1%;">
            <div class="card">
                <div class="mx-4">
                    <h4 class="mt-4">Diagnosa</h4>
                    <div class="line my-3"></div>
                    <div class="form-group">
                        <label for="diagnosa">Diagnosa Pasien</label>
                        <textarea class="form-control" name="diagnosa" id="diagnosa" cols="20" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-secondary" onclick="stepper.previous()">Back</button>
            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
        </div>

        <div id="perawatan-part" class="content" role="tabpanel" aria-labelledby="perawatan-part-trigger"
            style="margin: 0 -1%;">
            <div class="card">
                <div class="mx-4">
                    <h4 class="mt-4">Perawatan</h4>
                    <div class="line my-3"></div>
                    <div class="form-group">
                        <label for="perawatan">Perawatan Pasien</label>
                        <textarea class="form-control" name="perawatan" id="perawatan" cols="20" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-secondary" onclick="stepper.previous()">Back</button>
            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
        </div>

        <div id="odontogram-after-part" class="content" role="tabpanel" aria-labelledby="odontogram-after-part-trigger"
            style="margin: 0 -1%;">
            <div class="card">
                <div class="mx-4">
                    <h4 class="mt-4">Odontogram</h4>
                    <div class="line my-3"></div>
                </div>
            </div>
            <button class="btn btn-secondary" onclick="stepper.previous()">Back</button>
            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
        </div>
    </div>
</div>

<!-- STEPPER -->
<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script>
(function() {
    'use strict'
    window.stepper = new Stepper(document.querySelector('#stepper'))
})()
</script>