<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3>Buat Janji Pemeriksaan</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= base_url('/klinik/buat-janji') ?>">
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
        let buatPasienBaru =
            `<a href="${linke}pasien/tambahPasienBaruWithId/${id}">- Buat Profil Pasien Baru(Pilih opsi ini apabila calon pasien belum terdaftar)</a>`
        $('#buatPasienBaru').html(buatPasienBaru);
        $.ajax({
            type: 'GET',
            url: `<?= base_url() ?>Pasien/getDataPasien/${id}`,
            dataType: 'json',
            method: 'get',
            hasil: {
                id: id
            },
            success: (hasil) => {
                let isi = `<option disabled selected>Pilih Profil Pasien</option>`;
                hasil.forEach(function(item) {
                    console.log('item.alamat');
                    isi +=
                        `
                        <option value="${item.id_pasien}">${item.nama_depan} ${item.nama_belakang} - ${item.alamat}</option>`
                });
                $('#id_pasien').html(isi);
            }
        });
    }
}
</script>