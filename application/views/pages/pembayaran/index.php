<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Pembayaran</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="kode_booking_id" placeholder="Masukkan Kode Booking">
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary" id="filter_all">Cari</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-6">
                            <label for="">Cari Nama Pasien</label>
                            <input class="form-control col-lg-6" id="cari_nama" type="text" placeholder="Nama Pasien" onkeyup="cari_data2()">
                        </div>
                        <div class="col-lg-4 col-md-4 col-6">
                            <label for="">Cari No. Rekam Medis</label>
                            <input type="text" id="cari_rekam_medis" class="form-control col-lg-6" placeholder="Kode Perjanjian" onkeyup="cari_data2()">
                        </div>
                        <div class="col-lg-4 col-md-4 col-6">
                            <label for="">Cari Tanggal Lahir</label>
                            <input type="text" id="cari_tgl_lahir" class="form-control col-lg-6" placeholder="Kode Tanggal Lahir" onkeyup="cari_data2()">
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 mt-2">
                            <label for="">Cari Dokter</label>
                            <input class="form-control col-lg-6" id="cari_dokter" type="text" placeholder="Nama Dokter" onkeyup="cari_data2()">
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 mt-2">
                            <label for="">Cari Tanggal Periksa</label>
                            <input type="text" id="cari_tgl" class="form-control col-lg-6" placeholder="Tanggal Perjanjian" onkeyup="cari_data2()">
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 mt-2">
                            <label for="">Cari Jam Periksa</label>
                            <input type="text" id="cari_jam" class="form-control col-lg-6" placeholder="Jam Pemeriksaan" onkeyup="cari_data2()">
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <table id="all_data_json" data-toggle="table" data-url="<?php echo base_url('owner/get_data_pembayaran'); ?>" data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="nama" data-sort-order="asc" data-toolbar="#toolbar">
                    <thead>
                        <tr>
                            <th data-field="no_antrian" data-formatter="runningFormatter" data-align="right">No.</th>
                            <th data-field="nama_depan|nama_belakang" data-sortable="true" data-formatter="namaPasien">Nama Pasien</th>
                            <th data-field="tanggal_lahir" data-sortable="true">Tanggal Lahir</th>
                            <th data-field="id_rekam_medis" data-sortable="true">No. Rekam Medis</th>
                            <th data-field="nama_dokter" data-sortable="true">Dokter Pilihan</th>
                            <th data-field="tanggal_rencana" data-sortable="true">Tanggal Periksa</th>
                            <th data-field="jam_rencana_mulai|jam_rencana_selesai" data-sortable="true" data-formatter="jamPeriksa">Jam Periksa</th>
                            <th data-field="id_booking|id_rekam_medis" data-sortable="true" data-formatter="action">Activity</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function runningFormatter(value, row, index) {
        return index + 1;
    }

    function prosesRekamMedis(value) {
        return '<a href="<?php echo base_url(); ?>rekam_medis/create/' + value + '" class="btn btn-primary">Proses</a>';
    }

    function namaPasien(value, row, index) {
        return row.nama_depan + ' ' + row.nama_belakang;
    }

    function jamPeriksa(value, row, index) {
        return row.jam_rencana_mulai + '-' + row.jam_rencana_selesai;
    }

    function action(value, row, index) {
        return '<a href="<?php echo base_url(); ?>owner/metode_bayar/' + row.id_booking + '/' + row.id_rekam_medis + '" class="btn btn-success col-md-12"  style="text-align: center; color: white; background-color: #00b050; border-radius: 0px;">Proses Bayar</a>';
    }

    $("#filter_all").click(function() {

        cari_data($("#cari_nama").val(), $("#cari_tgl_lahir").val(), $("#cari_rekam_medis").val(), $("#cari_dokter").val(), $("#cari_tgl").val(), $("#cari_jam").val(), $("#kode_booking_id").val());
    });

    function cari_data(cari_nama, cari_tgl_lahir, cari_rekam_medis, cari_dokter, cari_tgl, cari_jam, kode_booking) {


        $('#all_data_json').bootstrapTable('refresh', {
            url: '<?php echo base_url() ?>Owner/get_data_pembayaran2/' + (cari_nama != "" ? cari_nama : '0') + '/' + (cari_tgl_lahir != "" ? cari_tgl_lahir : '0') + '/' + (cari_rekam_medis != "" ? cari_rekam_medis : '0') + '/' + (cari_dokter != "" ? cari_dokter : '0') + '/' + (cari_tgl != "" ? cari_tgl : '0') + '/' + (cari_jam != "" ? cari_jam : '0') + '/' + (kode_booking != "" ? kode_booking : '0')
        });
    }

    function cari_data2() {
        var cari_nama = $("#cari_nama").val();
        var cari_tgl_lahir = $("#cari_tgl_lahir").val();
        var cari_rekam_medis = $("#cari_rekam_medis").val();
        var cari_dokter = $("#cari_dokter").val();
        var cari_tgl = $("#cari_tgl").val();
        var cari_jam = $("#cari_jam").val();
        var kode_booking = $("#kode_booking_id").val();

        $('#all_data_json').bootstrapTable('refresh', {
            url: '<?php echo base_url() ?>Owner/get_data_pembayaran2/' + (cari_nama != "" ? cari_nama : '0') + '/' + (cari_tgl_lahir != "" ? cari_tgl_lahir : '0') + '/' + (cari_rekam_medis != "" ? cari_rekam_medis : '0') + '/' + (cari_dokter != "" ? cari_dokter : '0') + '/' + (cari_tgl != "" ? cari_tgl : '0') + '/' + (cari_jam != "" ? cari_jam : '0') + '/' + (kode_booking != "" ? kode_booking : '0')
        });
    }
</script>