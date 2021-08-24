<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3>Buat Janji Pemeriksaan</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= base_url() ?>Pemeriksaan/addJadwalPemeriksaan">
                    <input type="hidden" name="id_keluarga" value="<?= $id_keluarga;?>">
                    <input type="hidden" name="id_pasien" value="<?= $id_pasien;?>">
                    <input type="hidden" name="id_cabang" value="<?= $id_cabang;?>">
                    <input type="hidden" name="id_dokter" value="<?= $id_dokter;?>">
                    <div class="bs-stepper" id="stepper">
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
                            <div class="step" data-target="#orang-dekat-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="orang-dekat-part"
                                    id="orang-dekat-part-trigger">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Data Orang Dekat</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#keluhan-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="keluhan-part"
                                    id="keluhan-part-trigger">
                                    <span class="bs-stepper-circle">4</span>
                                    <span class="bs-stepper-label">Keluhan</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#pembayaran-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="pembayaran-part"
                                    id="pembayaran-part-trigger">
                                    <span class="bs-stepper-circle">5</span>
                                    <span class="bs-stepper-label">Survei & Pembayaran</span>
                                </button>
                            </div>
                        </div>

                        <div class="bs-stepper-content">
                            <!-- your steps content here -->
                            <div id="jadwal-part" class="content" role="tabpanel" aria-labelledby="jadwal-part-trigger">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <label for="tgl_pemeriksaan">Tanggal Pemeriksaan</label>
                                            <input type="text" class="form-control" id="tgl_pemeriksaan"
                                                name="tgl_pemeriksaan" data-id="<?= $id_dokter; ?>" autocomplete="off"/>
                                                <input type="hidden" name="day" id="day">
                                        </div>
                                        <div class="col-md-6 col-12">

                                            <label for="">Waktu Pemeriksaan</label>
                                            <div id="message">
                                                <input type="text" class="form-control"
                                                    placeholder="Pilih Tanggal Terlebih Dahulu" disabled>
                                            </div>
                                            <div class="grid" id="waktu-pemeriksaan">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-3">
                                        <button type="button" id="step-btn-1" class="btn btn-primary btn-next-form"
                                            onclick="stepper.next()">Selanjutnya</button>
                                    </div>
                                </div>
                            </div>

                            <div id="data-diri-part" class="content" role="tabpanel"
                                aria-labelledby="data-diri-part-trigger">
                                <p class="h6">Data Pasien</p>
                                <div class="line my-3"></div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="input-nama-depan">Nama Depan</label>
                                        <input type="text" class="form-control" name="first-name" id="input-nama-depan"
                                            value="<?= $data_pasien['nama_depan'];?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="input-nama-belakang">Nama belakang</label>
                                        <input type="text" class="form-control" name="last-name"
                                            id="input-nama-belakang" value="<?= $data_pasien['nama_belakang'];?>">
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
                                        <input type="date" class="form-control" name="tgl-lahir" id="tgl-lahir"
                                            value="<?= $data_pasien['tanggal_lahir'];?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="jns-kelamin">Jenis Kelamin</label>
                                        <select class="form-control" name="jns-kelamin" id="jns-kelamin">
                                            <option value="Laki-laki"
                                                <?= $data_pasien['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '';?>>
                                                Laki-laki</option>
                                            <option value="Perempuan"
                                                <?= $data_pasien['jenis_kelamin'] == 'Perempuan' ? 'selected' : '';?>>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="status-pernikahan">Status Pernikahan</label>
                                        <select class="form-control" name="status-pernikahan" id="status-pernikahan">
                                            <option <?= $data_pasien['status_nikah'] == '' ? 'selected' : '';?>>Pilih
                                                Status Pernikahan</option>
                                            <option value="Menikah"
                                                <?= $data_pasien['status_nikah'] == 'Menikah' ? 'selected' : '';?>>
                                                Menikah</option>
                                            <option value="Belum Menikah"
                                                <?= $data_pasien['status_nikah'] == 'Belum Menikah' ? 'selected' : '';?>>
                                                Belum Menikah</option>
                                            <option value="Duda"
                                                <?= $data_pasien['status_nikah'] == 'Duda' ? 'selected' : '';?>>Duda
                                            </option>
                                            <option value="Janda"
                                                <?= $data_pasien['status_nikah'] == 'Janda' ? 'selected' : '';?>>Janda
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <select class="form-control" name="pekerjaan" id="pekerjaan">
                                            <option <?= $data_pasien['pekerjaan'] == '' ? 'selected' : '';?>>
                                                Pilih Pekerjaan</option>
                                            <option value="Aparatur Sipil Negara"
                                                <?= $data_pasien['pekerjaan'] == 'Aparatur Sipil Negara' ? 'selected' : '';?>>
                                                Aparatur Sipil Negara</option>
                                            <option value="Pegawai BUMN"
                                                <?= $data_pasien['pekerjaan'] == 'Pegawai BUMN' ? 'selected' : '';?>>
                                                Pegawai
                                                BUMN</option>
                                            <option value="Pegawai Swasta"
                                                <?= $data_pasien['pekerjaan'] == 'Pegawai Swasta' ? 'selected' : '';?>>
                                                Pegawai
                                                Swasta</option>
                                            <option value="Wiraswasta"
                                                <?= $data_pasien['pekerjaan'] == 'Wiraswasta' ? 'selected' : '';?>>
                                                Wiraswasta</option>
                                            <option value="Tidak Bekerja"
                                                <?= $data_pasien['pekerjaan'] == 'Tidak Bekerja' ? 'selected' : '';?>>
                                                Tidak
                                                Bekerja</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pendidikan">Pendidikan</label>
                                        <select class="form-control" name="pendidikan" id="pendidikan">
                                            <option <?= $data_pasien['pendidikan'] == '' ? 'selected' : '';?>>Pilih
                                                Pendidikan</option>
                                            <option value="SMA/setaranya"
                                                <?= $data_pasien['pendidikan'] == 'SMA/setaranya' ? 'selected' : '';?>>
                                                SMA/setaranya</option>
                                            <option value="S1/S2/S3"
                                                <?= $data_pasien['pendidikan'] == 'S1/S2/S3' ? 'selected' : '';?>>
                                                S1/S2/S3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="jns-id">Jenis ID</label>
                                        <select class="form-control" name="jns-id" id="jns-id">
                                            <option <?= $data_pasien['jenis_id'] == '' ? 'selected' : '';?>>Pilih Jenis
                                                ID</option>
                                            <option value="Umum"
                                                <?= $data_pasien['jenis_id'] == 'Umum' ? 'selected' : '';?>>Umum
                                            </option>
                                            <option value="KTP"
                                                <?= $data_pasien['jenis_id'] == 'KTP' ? 'selected' : '';?>>
                                                KTP</option>
                                            <option value="SIM"
                                                <?= $data_pasien['jenis_id'] == 'SIM' ? 'selected' : '';?>>
                                                SIM</option>
                                            <option value="Paspor"
                                                <?= $data_pasien['jenis_id'] == 'Papor' ? 'selected' : '';?>>Paspor
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="no-id">Nomer ID</label>
                                        <input type="text" class="form-control" name="no-id" id="no-id"
                                            value="<?= $data_pasien['no_id'];?>">
                                    </div>
                                </div>

                                <p class="h6">Alamat dan Kontak</p>
                                <div class="line my-3"></div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="<?= $data_pasien['email'];?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="no-hp">Nomor HP</label>
                                        <input type="text" class="form-control" name="no-hp" id="no-hp"
                                            value="<?= $data_pasien['no_hp'];?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Provinsi</label>
                                        <select class="select2bs4" name="provinsi" id="provinsi" style="width: 100%;">
                                            <option disabled selected><?= "Pilih Provinsi" ?></option>
                                        </select>
                                        <input type="hidden" name="provinsi-nama" id="provinsi-nama">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Kota</label>
                                        <select class="select2bs4" name="kota" id="kota" style="width: 100%;">
                                        </select>
                                        <input type="hidden" name="kota-nama" id="kota-nama">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Kodepos</label>
                                        <input type="text" name="kodepos" id="kodepos" class="form-control" value="<?= $data_pasien['kode_pos'];?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jalan">Nama Jalan</label>
                                    <input type="text" class="form-control" name="jalan" id="jalan"
                                        value="<?= $data_pasien['alamat'];?>">
                                </div>

                                <p class="h6">Kondisi Kesehatan Umum</p>
                                <div class="line my-3"></div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="gol-dar">Golongan Darah</label>
                                        <select class="form-control" name="gol-dar" id="gol-dar">
                                            <option <?= $data_pasien['gol_darah'] == '' ? 'selected' : '';?>>
                                                Pilih Golongan Darah
                                            </option>
                                            <option value="A" <?= $data_pasien['gol_darah'] == 'A' ? 'selected' : '';?>>
                                                A</option>
                                            <option value="AB"
                                                <?= $data_pasien['gol_darah'] == 'AB' ? 'selected' : '';?>>AB</option>
                                            <option value="B" <?= $data_pasien['gol_darah'] == 'B' ? 'selected' : '';?>>
                                                B</option>
                                            <option value="O" <?= $data_pasien['gol_darah'] == 'O' ? 'selected' : '';?>>
                                                O</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="alergi">Alergi</label>
                                        <input type="text" class="form-control" name="alergi" id="alergi"
                                            value="<?= $data_pasien['alergi'];?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rwyt-penyakit">Riwayat Penyakit Umum</label>
                                    <input type="text" class="form-control" name="rwyt-penyakit" id="rwyt-penyakit"
                                        value="<?= $data_pasien['riwayat_penyakit'];?>">
                                </div>

                                <div class="form-group">
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-secondary btn-prev-form"
                                            onclick="stepper.previous()">Kembali</button>
                                        <button type="button" class="btn btn-primary btn-next-form"
                                            onclick="stepper.next()">Selanjutnya</button>
                                    </div>
                                </div>

                            </div>

                            <div id="orang-dekat-part" class="content" role="tabpanel"
                                aria-labelledby="orang-dekat-part-trigger">
                                <div class="container my-5" id="od">
                                    <div class="grid">
                                        <label class="card-input">
                                            <input name="plan" class="radio" type="radio" id="od-keluarga"
                                                onclick="pilihOrangDekat()">
                                            <span class="plan-details" style="height: 130px;">
                                                <span class="plan-type">Keluarga</span>
                                                <span class="mt-2 font-weight-bold">Pilih data orang terdekat pada
                                                    list akun keluarga yang telah terdaftar</span>
                                            </span>
                                        </label>
                                        <label class="card-input">
                                            <input name="plan" class="radio" type="radio" id="od-baru"
                                                onclick="tambahOrangDekat()">
                                            <span class="plan-details" style="height: 130px;">
                                                <span class="plan-type">Tambah Data Baru</span>
                                                <span class="mt-2 font-weight-bold">Tambah data baru orang
                                                    terdekat</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <div id="form-list-keluarga">
                                    <p class="h6">Data Orang Dekat Yang Telah Terdaftar</p>
                                    <div class="line my-3"></div>
                                    <div class="form-group mb-5">
                                        <label>Pilih Data Orang Dekat</label>
                                        <select class="select2bs4" name="org_dekat" id="org_dekat" style="width: 100%;">
                                            <option value="">Pilih Data</option>
                                            <?php foreach ($list_org_dekat as $od) : ?>
                                            <option value="<?= $od['id_pasien'] ?>">
                                                <?= $od['nama_depan']  . ' ' .  $od['nama_belakang']  . ' (' . $od['hubungan'].')' ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div id="form-input-baru">
                                    <p class="h6">Buat Data Orang Dekat Pasien</p>
                                    <div class="line my-3"></div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="input-nama-depan-od">Nama Depan</label>
                                            <input type="text" class="form-control i-od" name="first-name-od"
                                                id="input-nama-depan-od">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="input-nama-belakang-od">Nama belakang</label>
                                            <input type="text" class="form-control i-od" name="last-name-od"
                                                id="input-nama-belakang-od">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputUsername1">Hubungan</label>
                                            <select class="form-control i-od" name="hubungan-od" id="hubungan">
                                                <option value="">-- Pilih Hubungan --</option>
                                                <option value="Istri">Istri</option>
                                                <option value="Suami">Suami</option>
                                                <option value="Anak">Anak</option>
                                                <option value="Ayah">Ayah</option>
                                                <option value="Ibu">Ibu</option>
                                                <option value="Saudara">Saudara</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Tempat Lahir</label>
                                            <select class="select2bs4 i-od" name="tmp-lahir-od" id="tmp-lahir-od"
                                                style="width: 100%;">
                                                <option value=""><?= "Pilih Tempat Lahir" ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tgl-lahir-od">Tanggal Lahir</label>
                                            <input type="date" class="form-control i-od" name="tgl-lahir-od"
                                                id="tgl-lahir-od">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="jns-kelamin-od">Jenis Kelamin</label>
                                            <select class="form-control i-od" name="jns-kelamin-od" id="jns-kelamin-od">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="status-pernikahan-od">Status Pernikahan</label>
                                            <select class="form-control i-od" name="status-pernikahan-od"
                                                id="status-pernikahan-od">
                                                <option value="">Pilih Status Pernikahan</option>
                                                <option value="Menikah">Menikah</option>
                                                <option value="Belum Menikah">Belum Menikah</option>
                                                <option value="Duda">Duda</option>
                                                <option value="Janda">Janda</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="pekerjaan-od">Pekerjaan</label>
                                            <select class="form-control i-od" name="pekerjaan-od" id="pekerjaan-od">
                                                <option value="">Pilih Pekerjaan</option>
                                                <option value="Aparatur Sipil Negara"> Aparatur Sipil Negara</option>
                                                <option value="Pegawai BUMN">Pegawai BUMN</option>
                                                <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                <option value="Wiraswasta">Wiraswasta</option>
                                                <option value="Tidak Bekerja">Tidak Bekerja</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="pendidikan-od">Pendidikan</label>
                                            <select class="form-control i-od" name="pendidikan-od" id="pendidikan-od">
                                                <option value="">Pilih Pendidikan</option>
                                                <option value="SMA/setaranya"> SMA/setaranya</option>
                                                <option value="S1/S2/S3"> S1/S2/S3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="jns-id-od">Jenis ID</label>
                                            <select class="form-control i-od" name="jns-id-od" id="jns-id-od">
                                                <option value="">Pilih Jenis ID</option>
                                                <option value="Umum">Umum </option>
                                                <option value="KTP">KTP</option>
                                                <option value="SIM">SIM</option>
                                                <option value="Paspor">Paspor</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="no-id-od">Nomer ID</label>
                                            <input type="text" class="form-control i-od" name="no-id-od" id="no-id-od">
                                        </div>
                                    </div>

                                    <p class="h6">Alamat dan Kontak</p>
                                    <div class="line my-3"></div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="email-od">Email</label>
                                            <input type="email" class="form-control i-od" name="email-od" id="email-od">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="no-hp-od">Nomor HP</label>
                                            <input type="text" class="form-control i-od" name="no-hp-od" id="no-hp-od">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Provinsi</label>
                                            <select class="select2bs4 i-od" name="provinsi-od" id="provinsi-od"
                                                style="width: 100%;">
                                                <option disabled selected><?= "Pilih Provinsi-od" ?></option>
                                            </select>
                                            <input type="hidden" name="provinsi-nama-od" id="provinsi-nama-od">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Kota</label>
                                            <select class="select2bs4 i-od" name="kota-od" id="kota-od"
                                                style="width: 100%;">
                                            </select>
                                            <input type="hidden" name="kota-nama-od" id="kota-nama-od">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Kodepos</label>
                                            <input type="text" name="kodepos-od" id="kodepos-od" class="form-control i-od">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jalan-od">Nama Jalan</label>
                                        <input type="text" class="form-control i-od" name="jalan-od" id="jalan-od">
                                    </div>
                                </div>

                                <div class="form-group" id="btn-stepper-od">
                                    <div class="my-3">
                                        <div class="d-flex">
                                            <button type="button" class="mr-2 btn btn-secondary btn-prev-form"
                                                onclick="stepper.previous()">Kembali</button>
                                            <button type="button" class="btn btn-primary btn-next-form"
                                                onclick="stepper.next()">Selanjutnya</button>
                                            <button type="button" class="ml-auto btn btn-danger"
                                                onclick="tampilMenuOD()">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="keluhan-part" class="content" role="tabpanel"
                                aria-labelledby="keluhan-part-trigger">
                                <div class="form-group">
                                    <label for="tgl_keluhan">Keluhan Dialami Sejak</label>
                                    <input type="date" class="form-control" name="tgl_keluhan" id="tgl_keluhan">
                                </div>
                                <div class="form-group">
                                    <label for="keluhan">Detail Keluhan</label>
                                    <textarea class="form-control" name="keluhan" id="keluhan" rows="3"
                                        placeholder="Jelaskan Detail Keluhan"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="my-3">
                                        <button type="button" class="btn btn-secondary btn-prev-form"
                                            onclick="stepper.previous()">Kembali</button>
                                        <button type="button" class="btn btn-primary btn-next-form"
                                            onclick="stepper.next()">Selanjutnya</button>
                                    </div>
                                </div>
                            </div>

                            <div id="pembayaran-part" class="content" role="tabpanel"
                                aria-labelledby="pembayaran-part-trigger">
                                <p class="h6">Pembayaran</p>
                                <div class="line my-3"></div>
                                <div class="form-group">
                                    <label for="jns-pembayaran">Jenis Pembayaran</label>
                                    <select class="form-control" name="jns-pembayaran" id="jns-pembayaran">
                                        <option>Pilih Jenis Pembayaran</option>
                                        <?php foreach($list_pembayaran as $lp):?>
                                        <option value="<?= $lp['id_metode'];?>"><?= $lp['nama_metode'];?></option>
                                        <?php endforeach;?>
                                        
                                    </select>
                                </div>
                                <p class="h6">Survei Pasien</p>
                                <div class="line my-3"></div>
                                <div class="form-group row">
                                    <label for="survei-kunjungan" class="col-sm-3 col-form-label text-right">
                                        Seberapa Sering Anda Mengunjungi Dokter Gigi?
                                    </label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="survei-kunjungan" id="survei-kunjungan">
                                            <option value="1">1</option>
                                            <option value="3">3</option>
                                            <option value="5">5</option>
                                            <option value="7">7</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="survei-klinik" class="col-sm-3 col-form-label text-right">
                                        Darimanakah kamu mengetahui klinik kami?
                                    </label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="survei-klinik" id="survei-klinik">
                                            <option value="Sosial Media">Sosial Media</option>
                                            <option value="Rekomendasi Teman">Rekomendasi Teman</option>
                                            <option value="Rekomendasi Saudara">Rekomendasi Saudara</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="survei-kontak" class="col-sm-3 col-form-label text-right">
                                        Pilih jalur komunikasi yang paling nyaman untuk kami hubungi (Reminder
                                        jadwal, Konfirmasi keluhan, dsb)
                                    </label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="survei-kontak" id="survei-kontak">
                                            <option value="WhatsApp">WhatsApp</option>
                                            <option value="SMS">SMS</option>
                                            <option value="Telegram">Telegram</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="survei-ads" class="col-sm-3 col-form-label text-right">
                                        Apakah kamu bersedia untuk mendapatkan data informasi terupdate dari klinik
                                        kami?
                                    </label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="survei-ads" id="survei-ads">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-flex my-3">
                                        <button type="button" class="btn btn-secondary btn-prev-form"
                                            onclick="stepper.previous()">Kembali</button>
                                        <button type="submit"
                                            class="btn btn-primary btn-next-form ml-auto">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('/pages/home/resepsionis/buat-jadwal-script');?>