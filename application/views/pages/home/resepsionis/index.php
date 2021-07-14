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
                                <select class="select2bs4" name="akun_klg" id="akun_klg" style="width: 100%;"
                                    onchange="pilih_pasien(this.value)">
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
                                    <option value="<?= $c->id_cabang ?>"><?= $c->nama_cabang ?> - <?= $c->alamat ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label>Pilih Dokter</label>
                                <select class="select2bs4" name="id_dokter" id="dokter" style="width: 100%;">
                                    <option disabled selected><?= "Pilih Dokter" ?></option>
                                    <?php foreach ($dokter as $d) : ?>
                                    <option value="<?= $d->id_dokter ?>"><?= $d->nama_dokter ?> - <?= $d->spesialis ?>
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
                        <input type="date" id="filter_t" class="form-control">
                        <?php
                        foreach ($rencana_sebelum->result_array()  as $rencana_result) {
                            $tgl_rencana[] = $rencana_result['tanggal_rencana'];
                        }
                        $f_tanggal_jadwal = json_encode($tgl_rencana);
                        ?>
                    </div>
                    <div class="col-sm-3">
                        <select class="select2bs4" name="id_dokter" id="filter_p" style=" width: 100%;">
                            <option disabled selected value=""><?= "Pilih Dokter" ?></option>
                            <option>Perlihatkan Semua Data</option>
                            <?php foreach ($dokter as $d) : ?>
                            <option value="<?= $d->id_dokter ?>"><?= $d->nama_dokter ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button class="btn btn-info" onclick="getDataJadwal()"><i class="fa fa-search"></i> Filter
                        Data</button>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h5 style="text-align: center;">Jadwal Yang Akan Datang</h5>
                        <div class="col-lg-12" id="txtfilter"
                            style="height: 400px; overflow-y: scroll; overflow-x: hidden;">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5 style="text-align: center;">Pemeriksaan Berjalan</h5>
                        <div class="col-lg-12" id="txtfilter_3"
                            style="height: 400px; overflow-y: scroll; overflow-x: hidden;">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5 style="text-align: center;">Jadwal Pemeriksaan Sebelumnya</h5>
                        <div class="col-lg-12" id="txtfilter_2"
                            style="height: 400px; overflow-y: scroll; overflow-x: hidden;">

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
    profil();
    $('#filter_p').change(function() {
        profil();
    });
});

function profil() {
    var id = $('#filter_p').val();
    var tgl = $('#filter_t').val();
    $.ajax({
        url: "<?= base_url('klinik/filter_profil') ?>",
        data: {
            id: id,
            tgl: tgl
        },
        success: function(data) {
            $('#txtfilter').html(data);
        }
    })
    $.ajax({
        url: "<?= base_url('klinik/filter_profil_2') ?>",
        data: {
            id: id,
            tgl: tgl
        },
        success: function(data) {
            $('#txtfilter_2').html(data);
        }
    })
    $.ajax({
        url: "<?= base_url('klinik/filter_profil_3') ?>",
        data: {
            id: id,
            tgl: tgl
        },
        success: function(data) {
            $('#txtfilter_3').html(data);
        }
    });

}

$(document).ready(function() {
    tgl();
    $('#filter_t').change(function() {
        // let a = $(this).val();
        // console.log(a);
        tgl();
    });
});

function tgl() {
    var tgl = $('#filter_t').val();
    var id = $('#filter_p').val();
    $.ajax({
        url: "<?= base_url('klinik/filter_tanggal') ?>",
        data: {
            tgl: tgl,
            id: id
        },
        success: function(data) {
            $('#txtfilter').html(data);
        }
    })
    $.ajax({
        url: "<?= base_url('klinik/filter_tanggal_2') ?>",
        data: {
            tgl: tgl,
            id: id
        },
        success: function(data) {
            $('#txtfilter_2').html(data);
        }
    })
    $.ajax({
        url: "<?= base_url('klinik/filter_tanggal_3') ?>",
        data: {
            tgl: tgl,
            id: id
        },
        success: function(data) {
            $('#txtfilter_3').html(data);
        }
    });
}

var enableDays = <?php echo $f_tanggal_jadwal ?>;

function enableAllTheseDays(date) {
    var sdate = $.datepicker.formatDate('yy-mm-dd', date)
    if ($.inArray(sdate, enableDays) != -1) {
        return [true];
    }
    return [false];
}
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$('#filter_t').datepicker({
    dateFormat: 'yy-mm-dd',
    beforeShowDay: enableAllTheseDays,
    onSelect: function(dateText, inst) {
        var tgl = dateText;
        var id = $('#filter_p').val();
        $.ajax({
            url: "<?= base_url('klinik/filter_tanggal') ?>",
            data: {
                tgl: tgl,
                id: id
            },
            success: function(data) {
                $('#txtfilter').html(data);
            }
        })
        $.ajax({
            url: "<?= base_url('klinik/filter_tanggal_2') ?>",
            data: {
                tgl: tgl,
                id: id
            },
            success: function(data) {
                $('#txtfilter_2').html(data);
            }
        })
        $.ajax({
            url: "<?= base_url('klinik/filter_tanggal_3') ?>",
            data: {
                tgl: tgl,
                id: id
            },
            success: function(data) {
                $('#txtfilter_3').html(data);
            }
        });
    }
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
        let buatPasienBaru =
            `<a href="${linke}pasien/tambahPasienBaruWithId/${id}">- Buat Profil Pasien Baru(Pilih opsi ini apabila calon pasien belum terdaftar)</a>`
        $('#buatPasienBaru').html(buatPasienBaru);
        $.ajax({
            type: 'GET',
            url: `<?= base_url() ?>Pasien/getDataPasien/${id}`,
            dataType: 'json',
            success: (hasil) => {
                let isi = `<option disabled selected>Pilih Profil Pasien</option>`;
                hasil.forEach(function(item) {
                    isi +=
                        `
                        <option value="${item.id_pasien}">${item.nama_depan} ${item.nama_belakang} - ${item.alamat}</option>`
                });
                $('#id_pasien').html(isi);
            }
        });
    }
}

function getDataJadwal() {
    let tanggal = document.getElementById("tanggalfilter").value;
    let dokter = document.getElementById("dokterfilter").value;
    console.log("tes");
    console.log(tanggal);
    console.log(dokter);
    if (tanggal === "" || dokter === "") {
        alert("Lengkapi semua data!")
    } else {
        console.log("Data ga kosong");
    }
}
</script>