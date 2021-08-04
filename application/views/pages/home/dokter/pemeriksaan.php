<div class="bs-stepper" id="stepper">
    <div class="card">
        <div class="bs-stepper-header" role="tablist">
            <!-- your steps here -->
            <div class="step" data-target="#anamnesa-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="anamnesa-part" id="anamnesa-part-trigger">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label">Anamnesa</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#odontogram-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="odontogram-part" id="odontogram-part-trigger">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">Odontogram (Before)</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#klinis-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="klinis-part" id="klinis-part-trigger">
                    <span class="bs-stepper-circle">3</span>
                    <span class="bs-stepper-label">Pemeriksaan Klinis</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#diagnosa-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="diagnosa-part" id="diagnosa-part-trigger">
                    <span class="bs-stepper-circle">4</span>
                    <span class="bs-stepper-label">Diagnosa</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#perawatan-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="perawatan-part" id="perawatan-part-trigger">
                    <span class="bs-stepper-circle">5</span>
                    <span class="bs-stepper-label">Perawatan</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#odontogram-after-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="odontogram-after-part" id="odontogram-after-part-trigger">
                    <span class="bs-stepper-circle">6</span>
                    <span class="bs-stepper-label">Odontogram (after)</span>
                </button>
            </div>
        </div>
    </div>
    <div class="bs-stepper-content">
        <!-- your steps content here -->
        <div id="anamnesa-part" class="content" role=" tabpanel" aria-labelledby="anamnesa-part-trigger" style="margin: 0 -1%;">
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
                            <input type="text" class="form-control" name="alergi" id="alergi" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rwyt-penyakit">Riwayat Penyakit Umum</label>
                        <input type="text" class="form-control" name="rwyt-penyakit" id="rwyt-penyakit" value="" autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="mx-4">
                    <h4 class="mt-4">Keluhan (Anamnesa)</h4>
                    <div class="line my-3"></div>
                    <div class="form-group">
                        <label for="anamnesa">Deskripsi anamnesa</label>
                        <textarea class="form-control" name="anamnesa" id="anamnesa" cols="20" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
        </div>

        <div id="odontogram-part" class="content" role="tabpanel" aria-labelledby="odontogram-part-trigger" style="margin: 0 -1%;">
            <div class="card">
                <div class="mx-4">
                    <h4 class="mt-4">Ini odontogram</h4>
                    <div class="line my-3"></div>
                    <?php $this->load->view('pages/home/dokter/odontogram'); ?>
                </div>
            </div>
            <button class="btn btn-secondary" onclick="stepper.previous()">Back</button>
            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
        </div>

        <div id="klinis-part" class="content" role="tabpanel" aria-labelledby="klinis-part-trigger" style="margin: 0 -1%;">
            <!-- EKSTRA ORAL -->
            <div class="card">
                <div class="mx-4">
                    <h4 class="mt-4">Pemeriksaan Klinis Umum</h4>
                    <div class="line my-3"></div>
                    <div class="row">
                        <div class="col">
                            <h5>Ekstra Oral :</h5>
                            <div id="ekstra-oral" class="ml-4">
                                <fieldset class="form-group row">
                                    <legend class="col-form-label col-sm-1 px-2 float-sm-right pt-0"><b>Wajah</b>
                                    </legend>
                                    <div class="col-sm-10">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="wajah1" name="wajah" class="custom-control-input" value="Simetri">
                                            <label class="custom-control-label" for="wajah1">Simetri</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="wajah2" name="wajah" class="custom-control-input" value="Asimetri">
                                            <label class="custom-control-label" for="wajah2">Asimetri</label>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group row">
                                    <legend class="col-form-label col-sm-1 float-sm-right pt-0"><b>Bibir</b></legend>
                                    <div class="col-sm-10">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline1" name="customRadioInline" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">Normal</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline2" name="customRadioInline" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">Lainnya</label>
                                            <input class="form-control ml-3" type="text" name="gridRadios" id="bibir-lain" placeholder="Jenis Bibir" autocomplete="off">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col">
                            <h5>Kelenjar Getah Bening :</h5>
                            <div id="getah-bening" class="ml-4">
                                <fieldset class="form-group row">
                                    <legend class="col-form-label col-sm-3 float-sm-right pt-0">
                                        <b>Submandibula Kanan <span class="pl-2 ml-1">1. </span></b>
                                    </legend>
                                    <div class="col-sm-7">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="subman-kanan1" name="subman-kanan-raba" class="custom-control-input">
                                            <label class="custom-control-label" for="subman-kanan1">Teraba</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="subman-kanan2" name="subman-kanan-raba" class="custom-control-input">
                                            <label class="custom-control-label" for="subman-kanan2">Tidak Teraba</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 text-right mt-1">
                                        <span class="mx-2"><b>2. </b></span>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="subman-kanan3" name="subman-kanan-sakit" class="custom-control-input">
                                            <label class="custom-control-label" for="subman-kanan3">Sakit</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="subman-kanan4" name="subman-kanan-sakit" class="custom-control-input">
                                            <label class="custom-control-label" for="subman-kanan4">Tidak Sakit</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 mt-1 text-right">
                                        <span class="mx-2"><b>3. </b></span>
                                    </div>
                                    <div class="col-sm-9 mt-1">
                                        <select class="form-control" name="subman-kanan-ket">
                                            <option>Pilih Keterangan</option>
                                            <option value="Lunak">Lunak</option>
                                            <option value="Kenyal">Kenyal</option>
                                            <option value="Keras">Keras</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group row">
                                    <legend class="col-form-label col-sm-3 float-sm-right pt-0">
                                        <b>Submandibula Kiri &nbsp;&nbsp;<span class="pl-2 ml-3">1. </span></b>
                                    </legend>
                                    <div class="col-sm-7">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="subman-kiri1" name="subman-kiri-raba" class="custom-control-input">
                                            <label class="custom-control-label" for="subman-kiri1">Teraba</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="subman-kiri2" name="subman-kiri-raba" class="custom-control-input">
                                            <label class="custom-control-label" for="subman-kiri2">Tidak Teraba</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 text-right mt-1">
                                        <span class="mx-2"><b>2. </b></span>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="subman-kiri3" name="subman-kiri-sakit" class="custom-control-input">
                                            <label class="custom-control-label" for="subman-kiri3">Sakit</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="subman-kiri4" name="subman-kiri-sakit" class="custom-control-input">
                                            <label class="custom-control-label" for="subman-kiri4">Tidak Sakit</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 mt-1 text-right">
                                        <span class="mx-2"><b>3. </b></span>
                                    </div>
                                    <div class="col-sm-9 mt-1">
                                        <select class="form-control" name="subman-kiri-ket">
                                            <option>Pilih Keterangan</option>
                                            <option value="Lunak">Lunak</option>
                                            <option value="Kenyal">Kenyal</option>
                                            <option value="Keras">Keras</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group row">
                                    <legend class="col-form-label col-sm-2 float-sm-right pt-0">
                                        <b>Lainnya :</b>
                                    </legend>
                                    <div class="col-sm-10">
                                        <input type="text" name="getah-bening-lain" id="" class="form-control" placeholder="keterangan getah bening lain">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- INTRA ORAL -->
            <div class="card">
                <div class="mx-4">
                    <h4 class="mt-4">Pemeriksaan Intra Oral</h4>
                    <div class="line my-3"></div>
                    <div class="row">
                        <div class="col">
                            <!-- STAIN -->
                            <fieldset class="form-group row">
                                <legend class="col-form-label col-sm-2 float-sm-right pt-0"><b>Stain</b>
                                </legend>
                                <div class="col-sm-8">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="stain" name="stain" class="custom-control-input" value="Ada">
                                        <label class="custom-control-label" for="stain">Ada</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="stain2" name="stain" class="custom-control-input" value="Normal">
                                        <label class="custom-control-label" for="stain2">Normal</label>
                                    </div>
                                </div>
                            </fieldset>
                            <!-- KALKULUS -->
                            <fieldset class="form-group row">
                                <legend class="col-form-label col-sm-2 float-sm-right pt-0"><b>Kalkulus</b>
                                </legend>
                                <div class="col-sm-7">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="kalkulus" name="kalkulus" class="custom-control-input" value="Normal">
                                        <label class="custom-control-label" for="kalkulus">Normal</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="kalkulus2" name="kalkulus" class="custom-control-input" value="Subgingiva">
                                        <label class="custom-control-label" for="kalkulus2">Subgingiva</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="kalkulus3" name="kalkulus" class="custom-control-input" value="Supragingiva">
                                        <label class="custom-control-label" for="kalkulus3">Supragingiva</label>
                                    </div>
                                </div>
                            </fieldset>
                            <!-- HUB. RAHANG -->
                            <fieldset class="form-group row">
                                <legend class="col-form-label col-sm-2 float-sm-right pt-0">
                                    <b>Hubungan Rahang</b>
                                </legend>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="hub-rahang" name="hub-rahang" class="custom-control-input" value="Ortognati">
                                        <label class="custom-control-label" for="hub-rahang">Ortognati</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="hub-rahang2" name="hub-rahang" class="custom-control-input" value="Retrognati">
                                        <label class="custom-control-label" for="hub-rahang2">Retrognati</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="hub-rahang3" name="hub-rahang" class="custom-control-input" value="Prognati">
                                        <label class="custom-control-label" for="hub-rahang3">Prognati</label>
                                    </div>
                                </div>
                            </fieldset>
                            <!-- GINGIVA -->
                            <fieldset class="form-group row">
                                <legend class="col-form-label col-sm-2 float-sm-right pt-0"><b>Gingiva</b></legend>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="gingiva1" name="gingiva" class="custom-control-input" value="normal">
                                        <label class="custom-control-label" for="gingiva1">Normal</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <div class="row">
                                            <div class="col-5">
                                                <input type="radio" id="gingiva2" name="gingiva" class="custom-control-input">
                                                <label class="custom-control-label" for="gingiva2">Ada Kelainan</label>
                                            </div>
                                            <div class="col">
                                                <input class="form-control " type="text" name="gingiva" id="gingiva-lain" placeholder="Kelainan Gingiva" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <!-- DEBRIS -->
                            <fieldset class="form-group row">
                                <legend class="col-form-label col-sm-2 float-sm-right pt-0"><b>Debris</b></legend>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="debris" name="debris" class="custom-control-input" value="normal">
                                        <label class="custom-control-label" for="debris">Normal</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <div class="row">
                                            <div class="col-5">
                                                <input type="radio" id="debris2" name="debris" class="custom-control-input">
                                                <label class="custom-control-label" for="debris2">Ada Kelainan</label>
                                            </div>
                                            <div class="col">
                                                <input class="form-control " type="text" name="debris" id="debris-lain" placeholder="Kelainan Debris" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col">
                            <!-- MUKOSA -->
                            <fieldset class="form-group row">
                                <legend class="col-form-label col-sm-2 float-sm-right pt-0"><b>Mukosa</b></legend>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="mukosa" name="mukosa" class="custom-control-input" value="normal">
                                        <label class="custom-control-label" for="mukosa">Normal</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <div class="row">
                                            <div class="col-5">
                                                <input type="radio" id="mukosa2" name="mukosa" class="custom-control-input">
                                                <label class="custom-control-label" for="mukosa2">Ada Kelainan</label>
                                            </div>
                                            <div class="col">
                                                <input class="form-control " type="text" name="mukosa" id="mukosa-lain" placeholder="Kelainan Mukosa" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <!-- PALATUM -->
                            <fieldset class="form-group row">
                                <legend class="col-form-label col-sm-2 float-sm-right pt-0"><b>Palatum</b></legend>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="palatum" name="palatum" class="custom-control-input" value="Normal">
                                        <label class="custom-control-label" for="palatum">Normal</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <div class="row">
                                            <div class="col-5">
                                                <input type="radio" id="palatum2" name="palatum" class="custom-control-input">
                                                <label class="custom-control-label" for="palatum2">Ada Kelainan</label>
                                            </div>
                                            <div class="col">
                                                <input class="form-control " type="text" name="palatum" id="palatum-lain" placeholder="Kelainan Palatum" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <!-- LIDAH -->
                            <fieldset class="form-group row">
                                <legend class="col-form-label col-sm-2 float-sm-right pt-0"><b>Lidah</b></legend>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="lidah" name="lidah" class="custom-control-input" value="normal">
                                        <label class="custom-control-label" for="lidah">Normal</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <div class="row">
                                            <div class="col-5">
                                                <input type="radio" id="lidah2" name="lidah" class="custom-control-input">
                                                <label class="custom-control-label" for="lidah2">Ada Kelainan</label>
                                            </div>
                                            <div class="col">
                                                <input class="form-control " type="text" name="lidah" id="lidah-lain" placeholder="Kelainan Lidah" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <!-- DASAR MULUT -->
                            <fieldset class="form-group row">
                                <legend class="col-form-label col-sm-2 float-sm-right pt-0"><b>Dasar Mulut</b></legend>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="dsr-mulut" name="dsr-mulut" class="custom-control-input" value="normal">
                                        <label class="custom-control-label" for="dsr-mulut">Normal</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <div class="row">
                                            <div class="col-5">
                                                <input type="radio" id="dsr-mulut2" name="dsr-mulut" class="custom-control-input">
                                                <label class="custom-control-label" for="dsr-mulut2">Ada
                                                    Kelainan</label>
                                            </div>
                                            <div class="col">
                                                <input class="form-control " type="text" name="dsr-mulut" id="dsr-mulut-lain" placeholder="Kelainan Dasar Mulut" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <!-- GIGI GERIGI -->
                            <fieldset class="form-group row">
                                <legend class="col-form-label col-sm-2 float-sm-right pt-0"><b>Gigi Gerigi</b></legend>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="gerigi" name="gerigi" class="custom-control-input" value="normal">
                                        <label class="custom-control-label" for="gerigi">Normal</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <div class="row">
                                            <div class="col-5">
                                                <input type="radio" id="gerigi2" name="gerigi" class="custom-control-input">
                                                <label class="custom-control-label" for="gerigi2">Ada Kelainan</label>
                                            </div>
                                            <div class="col">
                                                <input class="form-control " type="text" name="gerigi" id="gerigi-lain" placeholder="Kelainan Gigi Gerigi" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <!-- KLINIA KHUSUS -->
            <div class="card">
                <div class="mx-4">
                    <h4 class="mt-4">Pemeriksaan Klinis Khusus</h4>
                    <div class="line my-3"></div>
                    <div class="form-group">
                        <h5>Deskripsi Klinis :</h5>
                        <div id="klinis-khusus" class="ml-4">
                            <textarea class="form-control" name="klinis-khusus" rows="3" placeholder="46 Only, vitalitas(+), palpasi(-), perkusi(+)"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- PEMERIKSAAN PENUNJANG -->
                <div class="col mx-2">
                    <div class="card">
                        <div class="mx-4">
                            <h4 class="mt-4">Pemeriksaan Penunjang</h4>
                            <div class="line my-3"></div>
                            <div class="form-group">
                                <h5>Radiologi :</h5>
                                <div id="radiologi" class="ml-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="panoramik" value="Panoramik">
                                        <label class="form-check-label" for="panoramik">Panoramik</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="Sefalometri" value="Sefalometri">
                                        <label class="form-check-label" for="Sefalometri">Sefalometri</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="Transcranial" value="Transcranial">
                                        <label class="form-check-label" for="Transcranial">Transcranial</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="Dental,Regio" value="Dental,Regio">
                                        <label class="form-check-label" for="Dental,Regio">Dental,Regio</label>
                                        <input type="text" name="radiologi-46" id="" class="form-control mx-3" placeholder="46">
                                    </div>
                                    <div class="form-group">
                                        <label for="">
                                            <b>Deskripsi Radiologi</b>
                                        </label>
                                        <textarea class="form-control" name="radiologi-desk" rows="3" col="10" placeholder="Tampak gambaran radiopak ada oklusal gigi 46 hingga dentin dalam. Tampak gambaran radiolusensi berbatas diffuse pada apical seluas kurang lebih 4 mm."></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="">
                                                        <b>Foto Radiologi Terakhir</b>
                                                    </label>
                                                    <a href="" class="btn btn-primary ml-3"> Download Foto</a>
                                                </div>
                                            </div>
                                            <img src="<?= base_url('/uploads/foto_radiologi/kpku.png'); ?>" class="rounded img-fluid" alt="Foto radiologi terupdate" style="height: 200px;">
                                        </div>
                                        <div class="col">
                                            <label for="">
                                                <b>Foto Radiologi</b>
                                            </label>
                                            <input type="file" id="input-file-now" class="dropify" data-allowed-file-extensions="jpg jpeg png raw" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- LABORATORIUM -->
                <div class="col">
                    <div class="card">
                        <div class="mx-4">
                            <h4 class="mt-4">Laboratorium</h4>
                            <div class="line my-3"></div>
                            <div class="form-group">
                                <h5>Pemeriksaan Lab :</h5>
                                <div id="laboratorium" class="ml-4">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="lab" name="lab" class="custom-control-input" value="Darah Rutin">
                                        <label class="custom-control-label" for="lab">Darah Rutin</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="lab2" name="lab" class="custom-control-input">
                                        <label class="custom-control-label" for="lab2">Lainnya</label>
                                        <input type="text" name="lab-lain" id="" class="form-control mx-3" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">
                                            <b>Deskripsi Laboratorium</b>
                                        </label>
                                        <textarea class="form-control" name="lab-desk" rows="3" col="10" placeholder="Deskripsi Keterangan Laboratorium"></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="">
                                                        <b>Foto Laboratorium Terakhir</b>
                                                    </label>
                                                    <a href="" class="btn btn-primary ml-3"> Download Foto</a>
                                                </div>
                                            </div>
                                            <img src="<?= base_url('/uploads/foto_laboratorium/kpku.png'); ?>" class="rounded img-fluid" alt="Foto laboratorium terupdate" style="height: 200px;">
                                        </div>
                                        <div class="col">
                                            <label for="">
                                                <b>Upload Foto Laboratorium</b>
                                            </label>
                                            <input type="file" id="input-file-now" class="dropify-lab" data-allowed-file-extensions="jpg jpeg png raw" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-secondary" onclick="stepper.previous()">Back</button>
            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
        </div>

        <div id="diagnosa-part" class="content" role="tabpanel" aria-labelledby="diagnosa-part-trigger" style="margin: 0 -1%;">
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

        <div id="perawatan-part" class="content" role="tabpanel" aria-labelledby="perawatan-part-trigger" style="margin: 0 -1%;">
            <div class="card">
                <div class="mx-4">
                    <h4 class="mt-4">Perawatan</h4>
                    <div class="line my-3"></div>
                    <div class="form-group">
                        <label for="perawatan">Perawatan / Tindakan</label>
                        <div class="row bg-light py-2 mb-1">
                            <div class="col"><b>Elemen Gigi</b></div>
                            <div class="col"><b>Tindakan</b></div>
                            <div class="col"><b>Detail Tindakan</b></div>
                            <div class="col"><b>Jumlah</b></div>
                            <div class="col"><b>Harga Satuan</b></div>
                            <div class="col"><b>Subtotal</b></div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col">
                                <select class="select2bs4" name="" id="" style="width: 100%;">
                                    <option><?= "Pilih Tindakan" ?></option>
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col">
                                <input type="text" name="" id="" class="form-control" placeholder="Jumlah Gigi">
                            </div>
                            <div class="col">
                                <span>Rp. 800.000,-</span>
                            </div>
                            <div class="col">
                                <span>Rp. 1.000.000.-</span>
                            </div>
                        </div>
                        <div class="row bg-light py-2 my-1">
                            <div class="col-2"><b>Total</b></div>
                            <div class="col-8"></div>
                            <div class="col-2"><b>Rp. 1.800.000,-</b></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <b>Discount / Coupon</b>
                            </div>
                            <div class="col-5">
                                <select class="select2bs4" name="" id="" style="width: 100%;">
                                    <option><?= "Pilih Discount" ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="row bg-danger py-3 mt-2">
                            <div class="col-2"><b>Grand Total</b></div>
                            <div class="col-8"></div>
                            <div class="col-2"><b>Rp.0,-</b></div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-secondary" onclick="stepper.previous()">Back</button>
            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
        </div>

        <div id="odontogram-after-part" class="content" role="tabpanel" aria-labelledby="odontogram-after-part-trigger" style="margin: 0 -1%;">
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
<script src="<?php echo base_url(); ?>assets/js/apps/rawat-tambah-after.js"></script>

<script type="text/javascript">
    var session_id = '<?php echo $id_kpesan; ?>';
    var kode_pasien = '<?php echo $id_pasien ?>';
    var link2 = "<?php echo base_url() ?>";
    var id_pemeriksaan2 = "<?php echo @$idpemeriksaan ?>";
    var id_pasien2 = "<?php echo $id_pasien ?>";
    var date = "<?php echo date('Y-m-d') ?>";
    var odontogramDataUtama = '<?php echo @$rawat['odontogram'];; ?>';
    $(document).ready(function() {

        app_rawat_tambah_after.init();

    });
</script>

<!-- STEPPER -->
<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script>
    (function() {
        'use strict'
        window.stepper = new Stepper(document.querySelector('#stepper'))
    })()
</script>

<!-- DROPIFY -->
<script src="<?= base_url() ?>assets/plugins/dropify/dist/js/dropify.min.js"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify({
            messages: {
                default: 'Upload foto radiologi (click or drag and drop)',
            }
        });
        $('.dropify-lab').dropify({
            messages: {
                default: 'Upload foto laboratorium (click or drag and drop)',
            }
        });
    });
</script>