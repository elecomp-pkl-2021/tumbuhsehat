<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3>Buat Janji Pemeriksaan</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= base_url() ?>Klinik/add_booking">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label>Cari Akun Keluarga</label>
                                <select class="select2bs4" name="akun_klg" id="akun_klg" style="width: 100%;" onchange="pilih_pasien(this.value)">
                                    <option disabled selected><?= "Pilih Akun Keluarga" ?></option>
                                    <?php foreach ($keluarga as $k) : ?>
                                        <option value="<?= $k->id_user ?>">
                                            <?= $k->nama_depan_u . ' ' .  $k->nama_belakang_u . ' - ' . $k->no_hp ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label>Pilih Profil Calon Pasien</label> <b style="color: blue;" id="buatPasienBaru"></b>
                                <select class="select2bs4" name="id_pasien" id="id_pasien" style="width: 100%;">
                                    <option><?= "Pilih Profil Pasien" ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-6 col-12">
                                <label>Pilih Cabang</label>
                                <select class="select2bs4" name="id_cabang" id="cabang" style="width: 100%;">
                                    <option disabled selected><?= "Pilih Cabang Klinik" ?></option>
                                    <?php foreach ($cabang as $c) : ?>
                                        <option value="<?= $c->id_cabang ?>"><?= $c->nama_cabang ?> - <?= $c->alamat ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label>Pilih Dokter</label>
                                <select class="select2bs4" name="id_dokter" id="dokter" style="width: 100%;">
                                    <option disabled selected><?= "Pilih Dokter" ?></option>
                                    <?php foreach ($dokter as $d) : ?>
                                        <option value="<?= $d->id_dokter ?>"><?= $d->nama_dokter ?> - <?= $d->spesialis ?> (Pengalaman = <?= $d->pengalaman ?> Tahun)</option>
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
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header justify-content-between">
                <h3>Timeline Jadwal</h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-1">
                        <h6>Filter Data</h6>
                    </div>
                    <div class="col-sm-3">
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-sm-3">
                        <select class="select2bs4" name="id_dokter" id="dokter" style="width: 100%;">
                            <option disabled selected><?= "Pilih Dokter" ?></option>
                            <?php foreach ($dokter as $d) : ?>
                                <option value="<?= $d->id_dokter ?>"><?= $d->nama_dokter ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button class="btn btn-info"><i class="fa fa-search"></i> Filter Data</button>
                </div>
                <div class="row">
                    <div class="col-md-4" style="height: 400px; overflow-y: scroll; overflow-x: hidden;">
                        <div class="timeline">
                            <div class="entry">
                                <div class="title">
                                    <font style="text-align: right;">
                                        <h3><b>04:00-05:00</b></h3>
                                        <p>Drg. Anjauy</p>
                                    </font>
                                </div>
                                <div class="body">
                                    <p style="font-size: 12px;"><i>
                                            Waktu tersisa tinggal 229 jam, 45 menit
                                        </i></p>
                                    <p><b>Rachma Wati - Ibu</b></p>
                                    <p>Pemeriksaan dengan drg. Lila Asri di Escalade Dental</p>
                                    <div class="form-group">
                                        <font style="background-color: lightgreen; color: black; padding: 5px" size="2px">
                                            Pemeriksaan Selesai</font><br><br>
                                        <a href="" type="button" class="col-md-10 btn-bayar">Proses Bayar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="height: 400px; overflow-y: scroll; overflow-x: hidden;">
                        <div class="timeline">
                            <div class="entry">
                                <div class="title">
                                    <font style="text-align: right;">
                                        <h3><b>04:00-05:00</b></h3>
                                        <p>Drg. Anjauy</p>
                                    </font>
                                </div>
                                <div class="body">
                                    <p style="font-size: 12px;"><i>
                                            Waktu tersisa tinggal 229 jam, 45 menit
                                        </i></p>
                                    <p><b>Rachma Wati - Ibu</b></p>
                                    <p>Pemeriksaan dengan drg. Lila Asri di Escalade Dental</p>
                                    <div class="form-group">
                                        <font style="background-color: lightgreen; color: black; padding: 5px" size="2px">
                                            Pemeriksaan Selesai</font><br><br>
                                        <a href="" type="button" class="col-md-10 btn-bayar">Proses Bayar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="height: 400px; overflow-y: scroll; overflow-x: hidden;">
                        <div class="timeline">
                            <div class="entry">
                                <div class="title">
                                    <font style="text-align: right;">
                                        <h3><b>04:00-05:00</b></h3>
                                        <p>Drg. Anjauy</p>
                                    </font>
                                </div>
                                <div class="body">
                                    <p style="font-size: 12px;"><i>
                                            Waktu tersisa tinggal 229 jam, 45 menit
                                        </i></p>
                                    <p><b>Rachma Wati - Ibu</b></p>
                                    <p>Pemeriksaan dengan drg. Lila Asri di Escalade Dental</p>
                                    <div class="form-group">
                                        <font style="background-color: lightgreen; color: black; padding: 5px" size="2px">
                                            Pemeriksaan Selesai</font><br><br>
                                        <a href="" type="button" class="col-md-10 btn-bayar">Proses Bayar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var linke = "<?php echo base_url() ?>";
    $(document).ready(function() {
        document.getElementById("id_pasien").setAttribute("disabled", "disabled");
        document.getElementById("cabang").setAttribute("disabled", "disabled");
        document.getElementById("dokter").setAttribute("disabled", "disabled");
    });

    function pilih_pasien(id) {
        if (id == "-" && id == "empty") {
            document.getElementById("id_pasien").setAttribute("disabled", "disabled");
            document.getElementById("cabang").setAttribute("disabled", "disabled");
            document.getElementById("dokter").setAttribute("disabled", "disabled");
        } else {
            document.getElementById("id_pasien").removeAttribute("disabled", "disabled");
            document.getElementById("cabang").removeAttribute("disabled", "disabled");
            document.getElementById("dokter").removeAttribute("disabled", "disabled");
            let buatPasienBaru = `<a href="${linke}pasien/tambahPasienBaruWithId/${id}">- Buat Profil Pasien Baru(Pilih opsi ini apabila calon pasien belum terdaftar)</a>`
            $('#buatPasienBaru').html(buatPasienBaru);
            $.ajax({
                type: 'GET',
                url: `<?= base_url() ?>Pasien/getDataPasien/${id}`,
                dataType: 'json',
                success: (hasil) => {
                    let isi = `<option disabled selected>Pilih Profil Pasien</option>`;
                    hasil.forEach(function(item) {
                        isi += `
                        <option value="${item.id_pasien}">${item.nama_depan} ${item.nama_belakang} - ${item.alamat}</option>`
                    });
                    $('#id_pasien').html(isi);
                }
            });
        }
    }
</script>