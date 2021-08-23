<div class="card">
    <div class="mx-4">
        <h4 class="mt-3">Data Pasien</h4>
        <div class="line my-3"></div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="input-nama-depan">Nama Depan</label>
                <input type="text" class="form-control " name="first-name" id="input-nama-depan" value="<?= $pasien['nama_depan']; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="input-nama-belakang">Nama belakang</label>
                <input type="text" class="form-control " name="last-name" id="input-nama-belakang" value="<?= $pasien['nama_belakang']; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Tempat Lahir</label>
                <select class="select2bs4 " name="tmp-lahir" id="tmp-lahir" style="width: 100%;">
                    <option disabled selected><?= "Pilih Tempat Lahir" ?></option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="tgl-lahir">Tanggal Lahir</label>
                <input type="date" class="form-control " name="tgl-lahir" id="tgl-lahir" value="<?= $pasien['tanggal_lahir']; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="jns-kelamin">Jenis Kelamin</label>
                <select class="form-control " name="jns-kelamin" id="jns-kelamin">
                    <option value="Laki-laki" <?= strcasecmp("Laki-laki", $pasien['jenis_kelamin'])  == 0 ? 'selected' : ''; ?>>
                        Laki-laki</option>
                    <option value="Perempuan" <?= $pasien['jenis_kelamin']  == 'Perempuan' ? 'selected' : ''; ?>>Perempuan
                    </option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="status-pernikahan">Status Pernikahan</label>
                <select class="form-control " name="status-pernikahan" id="status-pernikahan">
                    <option>Pilih Status Pernikahan</option>
                    <option value="Menikah" <?= $pasien['status_nikah'] == 'Menikah' ? 'selected' : ''; ?>>
                        Menikah</option>
                    <option value="Belum Menikah" <?= $pasien['status_nikah'] == 'Belum Menikah' ? 'selected' : ''; ?>>Belum
                        Menikah
                    </option>
                    <option value="Duda" <?= $pasien['status_nikah'] == 'Duda' ? 'selected' : ''; ?>>Duda
                    </option>
                    <option value="Janda" <?= $pasien['status_nikah'] == 'Janda' ? 'selected' : ''; ?>>
                        Janda
                    </option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="pekerjaan">Pekerjaan</label>
                <select class="form-control " name="pekerjaan" id="pekerjaan">
                    <option>
                        Pilih Pekerjaan
                    </option>
                    <option value="Aparatur Sipil Negara" <?= $pasien['pekerjaan'] == 'Aparatur Sipil Negara' ? 'selected' : ''; ?>>
                        Aparatur Sipil Negara
                    </option>
                    <option value="Pegawai BUMN" <?= $pasien['pekerjaan'] == 'Pegawai BUMN' ? 'selected' : ''; ?>>
                        Pegawai BUMN
                    </option>
                    <option value="Pegawai Swasta" <?= $pasien['pekerjaan'] == 'Pegawai Swasta' ? 'selected' : ''; ?>>
                        Pegawai Swasta
                    </option>
                    <option value="Wiraswasta" <?= $pasien['pekerjaan'] == 'Wiraswasta' ? 'selected' : ''; ?>>
                        Wiraswasta
                    </option>
                    <option value="Tidak Bekerja" <?= $pasien['pekerjaan'] == 'Tidak Bekerja' ? 'selected' : ''; ?>>
                        Tidak Bekerja
                    </option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="pendidikan">Pendidikan</label>
                <select class="form-control " name="pendidikan" id="pendidikan">
                    <option>
                        Pilih Pendidikan
                    </option>
                    <option value="SMA/setaranya" <?= $pasien['pendidikan'] == 'SMA/setaranya' ? 'selected' : ''; ?>>
                        SMA/setaranya
                    </option>
                    <option value="S1/S2/S3" <?= $pasien['pendidikan'] == 'S1/S2/S3' ? 'selected' : ''; ?>>
                        S1/S2/S3
                    </option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="jns-id">Jenis ID</label>
                <select class="form-control " name="jns-id" id="jns-id">
                    <option>Pilih Jenis ID</option>
                    <option value="Umum" <?= $pasien['jenis_id'] == 'Umum' ? 'selected' : ''; ?>>Umum
                    </option>
                    <option value="KTP" <?= $pasien['jenis_id'] == 'KTP' ? 'selected' : ''; ?>> KTP
                    </option>
                    <option value="SIM" <?= $pasien['jenis_id'] == 'SIM' ? 'selected' : ''; ?>> SIM
                    </option>
                    <option value="Paspor" <?= $pasien['jenis_id'] == 'Paspor' ? 'selected' : ''; ?>>
                        Paspor
                    </option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="no-id">Nomer ID</label>
                <input type="text" class="form-control " name="no-id" id="no-id" value="<?= $pasien['no_id']; ?>">
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
                <input type="email" class="form-control " name="email" id="email" value="<?= $pasien['email']; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="no-hp">Nomor HP</label>
                <input type="text" class="form-control " name="no-hp" id="no-hp" value="<?= $pasien['no_hp']; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Provinsi</label>
                <select class="select2bs4 " name="provinsi" id="provinsi" style="width: 100%;">
                    <option disabled selected><?= "Pilih Provinsi" ?></option>
                </select>
                <input type="hidden" name="provinsi-nama" id="pn" value="">
            </div>
            <div class="form-group col-md-4">
                <label>Kota</label>
                <select class="select2bs4 " name="kota" id="kota" style="width: 100%;">
                </select>
                <input type="hidden" name="kota-nama" id="kn" value="">
            </div>
            <div class="form-group col-md-4">
                <label>Kodepos</label>
                <input type="text" class="form-control " name="kode-pos" id="kode-pos" value="<?= $pasien['kode_pos']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="jalan">Nama Jalan</label>
            <input type="text" class="form-control " name="jalan" id="jalan" value="<?= $pasien['alamat']; ?>">
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
                <select class="form-control " name="gol-dar" id="gol-dar">
                    <option>
                        Pilih Golongan Darah
                    </option>
                    <option value="A" <?= $pasien['gol_darah'] == 'A' ? 'selected' : ''; ?>>A</option>
                    <option value="AB" <?= $pasien['gol_darah'] == 'AB' ? 'selected' : ''; ?>>AB
                    </option>
                    <option value="B" <?= $pasien['gol_darah'] == 'B' ? 'selected' : ''; ?>>B</option>
                    <option value="O" <?= $pasien['gol_darah'] == 'O' ? 'selected' : ''; ?>>O</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="alergi">Alergi</label>
                <input type="text" class="form-control " name="alergi" id="alergi" value="<?= $pasien['alergi']; ?>" autocomplete="off">
            </div>
        </div>
        <div class="form-group">
            <label for="rwyt-penyakit">Riwayat Penyakit Umum</label>
            <input type="text" class="form-control " name="rwyt-penyakit" id="rwyt-penyakit" value="<?= $pasien['riwayat_penyakit']; ?>" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="">Kondisi Kesehatan Pasien</label> <br>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="baik" name="kondisi-kesehatan" class="custom-control-input a-p" value="Baik">
                <label class="custom-control-label" for="baik">
                    Baik
                </label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="sedang" name="kondisi-kesehatan" class="custom-control-input a-p" value="Sedang">
                <label class="custom-control-label" for="sedang">
                    Sedang
                </label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="buruk" name="kondisi-kesehatan" class="custom-control-input a-p" value="Buruk">
                <label class="custom-control-label" for="buruk">
                    Buruk
                </label>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="mx-4">
        <h4 class="mt-4">Keluhan (Anamnesa)</h4>
        <div class="line my-3"></div>
        <div class="form-group">
            <label for="anamnesa">Deskripsi anamnesa</label>
            <textarea class="form-control a-p" name="anamnesa" id="anamnesa" cols="20" rows="5"><?= $pasien['keluhan_utama'];?></textarea>
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary" id="btn-anamnesa" onclick="stepper.next()">Next</button>
