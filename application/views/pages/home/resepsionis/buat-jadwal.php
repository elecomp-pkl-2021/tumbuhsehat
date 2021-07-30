<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3>Buat Janji Pemeriksaan</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= base_url() ?>Klinik/add_booking">

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
                                                name="tgl_pemeriksaan" data-id="<?= $id_dokter; ?>" />
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
                                    <div class="form-group col-md-6">
                                        <label>Provinsi</label>
                                        <select class="select2bs4" name="provinsi" id="provinsi" style="width: 100%;">
                                            <option disabled selected><?= "Pilih Provinsi" ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Kota</label>
                                        <select class="select2bs4" name="kota" id="kota" style="width: 100%;">
                                        </select>
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
                                        <div class="form-group col-md-6">
                                            <label for="input-nama-depan-od">Nama Depan</label>
                                            <input type="text" class="form-control i-od" name="first-name-od"
                                                id="input-nama-depan-od">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="input-nama-belakang-od">Nama belakang</label>
                                            <input type="text" class="form-control i-od" name="last-name-od"
                                                id="input-nama-belakang-od">
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
                                        <div class="form-group col-md-6">
                                            <label>Provinsi</label>
                                            <select class="select2bs4 i-od" name="provinsi-od" id="provinsi-od"
                                                style="width: 100%;">
                                                <option disabled selected><?= "Pilih Provinsi-od" ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Kota</label>
                                            <select class="select2bs4 i-od" name="kota-od" id="kota-od"
                                                style="width: 100%;">
                                            </select>
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
                                        <option value="Asuransi">Asuransi</option>
                                        <option value="Kartu Debit">Kartu Debit</option>
                                        <option value="Tunai">Tunai</option>
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

<!-- STEPPER -->
<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
<!-- DATEPICKER -->
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css"
    type="text/css" media="all">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
var tmp_lahir_pasien = "<?= $data_pasien['tempat_lahir'];?>";
var id_provinsi = "<?= $data_pasien['province_id'];?>";
var id_city = "<?= $data_pasien['city_id'];?>";
var id_provinsi_input = "<?= $data_pasien['province_id'];?>";

$(document).ready(function() {
    // FOR PASIEN
    loadCity('#tmp-lahir', 'ApiRajaOngkir/get_api_kota/', tmp_lahir_pasien);
    loadProvinsi('#provinsi', id_provinsi);
    loadCityByProvince('#kota', id_provinsi_input, id_city);
    $('#provinsi').on('change', function() {
        if ($('#kota').val() !=
            '') {
            loadCityByProvince('#kota', $('#provinsi').val(), id_city);
        }
    });
    // FOR ORANG DEKAT PASIEN
    $('#btn-stepper-od').addClass('d-none');
    $('#form-list-keluarga').addClass('d-none');
    $('#form-input-baru').addClass('d-none');


    // ALLOW ONLY NUMBERS INPUT
    setInputFilter(document.getElementById("no-id"),
        function(value) {
            return /^\d*\.?\d*$/.test(value);
        });
    setInputFilter(document.getElementById("no-hp"), function(value) {
        return /^\d*\d*$/.test(value);
    });

});

const tambahOrangDekat = () => {
    $('#od').addClass('d-none');
    $('#form-input-baru').removeClass('d-none');
    showBtnDO();
    loadCity('#tmp-lahir-od', 'ApiRajaOngkir/get_api_kota/', "");
    loadProvinsi('#provinsi-od', '');
    loadCityByProvince('#kota-od', $('#provinsi-od').val(), '');
    $('#provinsi-od').on('change', function() {
        if ($('#kota-od').val() !=
            '') {
            loadCityByProvince('#kota-od', $('#provinsi-od').val(), id_city);
        }
    });
}

const pilihOrangDekat = () => {
    $('#od').addClass('d-none');
    $('#form-list-keluarga').removeClass('d-none');
    showBtnDO();
}

const tampilMenuOD = () => {
    $('#btn-stepper-od').addClass('d-none');
    $('#form-list-keluarga').addClass('d-none');
    $('#form-input-baru').addClass('d-none');
    $('#od').removeClass('d-none');
    $('input.i-od').val('');
    $('select.i-od option[value=""]').prop("selected", true);
    $('select#org_dekat option[value=""]').prop("selected", true);
}

const showBtnDO = () => {
    $('#btn-stepper-od').removeClass('d-none');
}

document.addEventListener('DOMContentLoaded', function() {
    stepper = new Stepper(document.querySelector('#stepper'), {
        linear: true,
        animation: true
    })
})

// datepicker
var dateToday = new Date();
var day = null;
var dates = $("#tgl_pemeriksaan").datepicker({
    defaultDate: "+1w",
    changeMonth: true,
    numberOfMonths: 1,
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "tgl_pemeriksaan" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat ||
                $.datepicker._defaults.dateFormat,
                selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
        day = String(date).split(' ');
        const id = $(this).data('id');
        $.ajax({
            url: '<?= base_url('/Pemeriksaan/json_get_jam_praktik_dokter'); ?>/' +
                id + '/' +
                day[0],
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                if (data.length > 0) {
                    $('#waktu-pemeriksaan').empty();
                    $('#message').empty();
                    $.each(data, function(key, entry) {
                        $('#waktu-pemeriksaan').append(
                            $( // prettier-ignore
                                `<label class="card-input">
                                    <input name="plan" class="radio" type="radio" id="input-waktu" value="">
                                    <span class="plan-details">
                                        <span class="plan-type">${entry.jam_mulai} - ${entry.jam_tutup}</span>
                                        <span class="mt-2 font-weight-bold">${entry.ket}</span>
                                    </span>
                                </label>`
                            ));
                    });
                } else {
                    $('#waktu-pemeriksaan').empty();
                    $('#message').empty();
                    $('#message').append(
                        "<h4 class='text-danger'>Jadwal Praktik Dokter Tidak tersedia Di Tanggal Ini < /h4>"
                    )
                }
            }
        });
    }
});

// RAJA ONGKIR API LOAD ALAMAT
function loadCity(id, url, tag) {
    $.ajax({
        url: '<?php echo base_url(); ?>' + url,
        dataType: 'json',
        success: function(response) {
            $(id).html('');
            city = '';
            city = ' <option> --Pilih Kota-- </option>';
            city = city + '';
            $(id).append(city);
            $.each(response['rajaongkir']['results'],
                function(i, n) {
                    if (tag == n['type'] + " " + n['city_name']) {
                        city = ' <option value = "' + n['type'] + " " + n['city_name'] +
                            '" selected > ' + n['type'] + " " + n['city_name'] + '</option>';
                    } else {
                        city = '<option value="' + n['type'] + " " + n['city_name'] + '">' + n['type'] +
                            " " + n['city_name'] + '</option>';
                    }
                    city = city + '';
                    $(id).append(city);
                });
        },
        error: function() {
            $(id).html('ERROR');
        }
    });
}

function loadProvinsi(id, id_provinsi) {
    $.ajax({
        url: '<?php echo base_url("ApiRajaOngkir/get_api_provinsi/"); ?>',
        dataType: 'json',
        success: function(response) {
            $(id).html('');
            province = '';
            province = '<option value=""> -- Pilih Provinsi-- </option>';
            province = province + '';
            $(id).append(province);

            $.each(response['rajaongkir']['results'], function(i, n) {
                if (id_provinsi == n['province_id']) {
                    province = '<option value="' + n['province_id'] + '" selected>' + n[
                        'province'] + '</option>';
                } else {
                    province = '<option value="' + n['province_id'] + '">' + n['province'] +
                        '</option>';
                }
                province = province + '';
                $(id).append(province);
                //$('#nama_provinsi').val(n['province']);
            });
        },
        error: function() {
            alert('ERROR ! Check your internet connection');
            //$(id).html('ERROR');
        }
    });
}

function loadCityByProvince(id, id_provinsi_input, idcity) {
    $.ajax({
        url: '<?php echo base_url("ApiRajaOngkir/get_api_kota_byProvinsi/"); ?>' +
            '/' + id_provinsi_input,
        dataType: 'json',
        data: {
            province: id_provinsi_input
        },
        success: function(response) {
            $(id).html('');
            city = '';
            city = '<option> -- Pilih Kota-- </option>';
            city = city + '';
            $(id).append(city);
            $.each(response['rajaongkir']['results'], function(i, n) {
                if (idcity == n['city_id']) {
                    city = '<option value="' + n['city_id'] + '" selected>' + n['type'] + " " + n[
                        'city_name'] + '</option>';
                } else {
                    city = '<option value="' + n['city_id'] + '">' + n['type'] + " " + n[
                        'city_name'] + '</option>';
                }
                city = city + '';
                $(id).append(city);
            });
        },
        error: function() {
            $(id).html('ERROR');
        }
    });
}


// FILTER FORM ONLY NUMBER INPUT
function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select",
        "contextmenu", "drop"
    ].forEach(function(event) {
        textbox.addEventListener(event, function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
        });
    });
}
</script>