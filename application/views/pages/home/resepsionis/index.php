<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3>Buat Janji Pemeriksaan</h3>
            </div>
            <div class="card-body">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="exampleSelectGender">Cari Akun Keluarga <i class="fa fa-search"></i></label>
                        <div class="row">
                        <div class="col-lg-8">
                        <select class="js-example-basic-single form-control" id="exampleSelectGender" onchange="pilih_pasien(this.value)">
                            <option value="-">Pilih Data Keluarga</option>
                            <?php
                            foreach ($keluarga as $k) {
                            ?>
                                <option value="<?= $k->id_user ?>"><?= $k->nama_depan_u . ' ' .  $k->nama_belakang_u . ' - ' . $k->no_hp ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        </div>
                        <div class="col-lg-4">
                        <button class="btn btn-anim btn-white" style="width: 200px; border-radius: 5px" type="button" onclick="location.href ='<?php echo base_url('home/buatAkunKeluarga'); ?>'"><span class="btn-text">Buat Akun Keluarga</span></button></center>
                        </div>
                        </div>
                        <div id="data_pasien">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var linke = "<?php echo base_url() ?>";

    function pilih_pasien(id) {
        if (id == "-") {
            $('#data_pasien').html("");
        } else {
            $.ajax({
                type: 'GET',
                url: `<?= base_url() ?>Pasien/getDataPasien/${id}`,
                dataType: 'json',
                success: (hasil) => {
                    let isi = '';
                    hasil.forEach(function(item) {
                        console.log(item.alamat);
                        isi += `<div class="alert bg-primary alert-primary text-white" role="alert">
                                          ${item.nama_depan} ${item.nama_belakang} - ${item.alamat} 
                                        </div>`
                    });
                    $('#data_pasien').html(isi);
                }
            });
        }
    }
</script>