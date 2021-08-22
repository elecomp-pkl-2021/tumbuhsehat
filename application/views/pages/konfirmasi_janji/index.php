<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Cari Perjanjian</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-6">
                            <label for="">Cari Nama Pasien</label>
                            <input type="text" class="form-control" id="cari_nama" value="" placeholder="Cari Nama Pasien" autocomplete="off" style="background: #fff;border: 1px solid #eee;color:#000;" onkeyup="cari_data()">
                        </div>
                        <div class="col-lg-4 col-md-4 col-6">
                            <label for="">Cari No. Rekam Medis</label>
                            <input type="text" class="form-control" id="cari_tgl_lahir" value="" placeholder="Cari No. Rekam Medis" autocomplete="off" style="background: #fff;border: 1px solid #eee;color:#000;" onkeyup="cari_data()">
                        </div>
                        <div class="col-lg-4 col-md-4 col-6">
                            <label for="">Cari Tanggal Lahir</label>
                            <input type="text" class="form-control" id="cari_id_booking" value="" placeholder="Cari Tanggal Lahir" autocomplete="off" style="background: #fff;border: 1px solid #eee;color:#000;" onkeyup="cari_data()">
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 mt-2">
                            <label for="">Cari Dokter</label>
                            <input type="text" class="form-control" id="cari_dokter" value="" placeholder="Cari Dokter" autocomplete="off" style="background: #fff;border: 1px solid #eee;color:#000;" onkeyup="cari_data()">
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 mt-2">
                            <label for="">Cari Tanggal Periksa</label>
                            <input type="text" class="form-control" id="cari_tgl" value="" placeholder="Cari Tanggal Periksa" autocomplete="off" style="background: #fff;border: 1px solid #eee;color:#000;" onkeyup="cari_data()">
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 mt-2">
                            <label for="">Cari Jam Periksa</label>
                            <input type="text" class="form-control" id="cari_jam" value="" placeholder="Cari Jam Periksa" autocomplete="off" style="background: #fff;border: 1px solid #eee;color:#000;" onkeyup="cari_data()">
                        </div>
                    </div>
                    <table id="all_data_json" data-toggle="table" data-url="<?php echo base_url('Owner/get_konfirmasi_janji'); ?>" data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="nama" data-sort-order="asc" data-toolbar="#toolbar">
                        <thead>
                            <tr>
                                <th data-field="" data-formatter="runningFormatter" data-align="right">No.</th>
                                <th data-field="nama_depan|nama_belakang" data-formatter="namaPasien">Nama Pasien</th>
                                <th data-field="tanggal_lahir">Tanggal Lahir</th>
                                <th data-field="id_booking" data-sortable="true">Nomor Rekam <br> Medis</th>
                                <th data-field="nama_dokter" data-sortable="true">Dokter Pilihan</th>
                                <th data-field="tanggal_rencana" data-sortable="true">Hari & Tanggal <br> Pemeriksaan</th>
                                <th data-field="jam_rencana_mulai|jam_rencana_selesai" data-sortable="true" data-formatter="jamPemeriksaan">Jam <br> Pemeriksaan</th>

                                <th data-field="id_pasien" data-sortable="true" data-formatter="action">Activity</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <div id="myModal" class="modal" style="top: 100px;">
            <form class="form-horizontal" action="<?php echo base_url('owner/konfirmasi/'); ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="text-align: center;"><b>Konfirmasi Janji</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="Batal()">&times;</button>
                        </div>
                        <div class="col-lg-12">

                            <div class="modal-body">
                                <h3 class="madal-body">
                                    <center><span id="nama"></span></center>
                                </h3>

                                <h5>
                                    <center style="font-size: medium;">dengan dokter <span id="nama_dokter"></span> di <span id="nama_cabang"></span></center>
                                </h5>

                                <h5>
                                    <center style="font-size: medium;">pada tanggal <span id="tgl"></span> jam <span id="jam"></span></center>
                                </h5>
                                <br>
                                <h5 style="text-align: center;" style="font-size: medium;">ID Booking:</h5>
                                <h4 style="text-align: center;"><span id="id_booking"></span></h4>
                            </div>

                            <input type="hidden" class="form-control" name="id_booking" id="id_booking_terima">
                            <input type="hidden" class="form-control" name="id_pasien" id="id_pasien_terima">
                            <input type="hidden" class="form-control" name="id_user" id="id_user_terima">
                            <input type="hidden" class="form-control" name="id_dokter" id="id_dokter_terima">
                            <hr>
                        </div>
                        <div class="modal-footer">
                            <button class="btn salmon" onclick="popUp()" type="submit" style="background-color:#F40049; color:white"> Konfirmasi&nbsp;</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="Batal()"> Batal</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>

        <div id="ModalTolak" class="modal" style="top: 25px;">
            <form class="form-horizontal" action="<?php echo base_url('owner/Konfirmasi_tolak/'); ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="text-align: center;"><b>Janji Pasien Ditolak</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="Batal2()">&times;</button>
                        </div>
                        <div class="col-lg-12">

                            <div class="modal-body">
                                <h5 class="madal-body">
                                    <center style="font-size: medium;">Pasien atas nama <span id="nama_tolak"></span> telah ditolak.</center>
                                </h5>

                                <h5>
                                    <center style="font-size: medium;">Mohon agar dapat memberikan alasan penolakan,</center>
                                </h5>
                                <h5>
                                    <center style="font-size: medium;">serta opsi jadwal atau dokter untuk pasien.</center>
                                </h5>

                                <br>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="alasan_tolak" class="form-control" placeholder="Ketik alasan penolakan serta opsi jadwal atau dokter (bila ada) untuk pasien disini" rows="7" required></textarea>
                                    </div>
                                </div>
                                <br>
                                <h5>
                                    <center style="font-size: medium;">Apakah Anda yakin akan menolak janji pasien?</center>
                                </h5>
                                <br>
                                <h5>
                                    <center style="font-size: medium;">Dengan menekan tombol dibawah, maka konfirmasi penolakan akan secara otomatis terkirim beserta pesan dari klinik.</center>
                                </h5>

                            </div>

                            <input type="hidden" class="form-control" name="id_booking" id="id_booking_tolak">
                            <input type="hidden" class="form-control" name="id_pasien" id="id_pasien_tolak">
                            <input type="hidden" class="form-control" name="id_user" id="id_user_tolak">
                            <input type="hidden" class="form-control" name="id_dokter" id="id_dokter_tolak">
                            <hr>
                        </div>
                        <div class="modal-footer">
                            <center><button class="btn salmon remove" onclick="popUpBatalKonfirmasi()" type="submit" style="background-color:#F40049; color:white"> Ya, Kirim Konfirmasi Penolakan</button></center>
                            <!-- <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>  -->
                        </div>

                    </div>
                </div>
            </form>
        </div>

        <script>
            var link = '<?php echo base_url() ?>';

            function runningFormatter(value, row, index) {
                return index + 1;
            }

            function namaPasien(value, row, index) {
                return row.nama_depan + ' ' + row.nama_belakang;
            }

            function jamPemeriksaan(value, row, index) {
                return row.jam_rencana_mulai + '-' + row.jam_rencana_selesai;
            }

            function proses(value) {
                return '<a href="#" onclick="prosesAntri(' + value + ')" class="btn btn-warning">Pilih</a>';
            }

            function action(value, row, index) {
                return `
            <a href="#" type="button" class="btn col-md-6" onclick="terima(${row.id_pasien})"  style=" color: white; background-color: #00b050; border-radius: 0px;"> Terima </a>
            <a href="#" type="button" class="btn col-md-6" onclick="tolak(${row.id_pasien})" style=" color: white; background-color: #c00000; border-radius: 0px;"> Tolak </a>
    `;
            }

            function terima(id_pasien) {
                $('#myModal').show();
                let id_user_terima = '<?= $this->session->userdata("id_user") ?>';
                $.ajax({
                    url: link + "Owner/ajax_get_terima/" + id_pasien,
                    type: "GET",
                    dataType: "JSON",
                    success: function(result) {
                        $('#nama').html(result.nama_depan + '-' + result.nama_belakang);
                        $('#nama_dokter').html(result.nama_dokter);
                        $('#nama_cabang').html(result.nama_cabang);
                        $('#tgl').html(result.tgl);
                        $('#jam').html(result.jam_rencana_mulai + '-' + result.jam_rencana_selesai);
                        $('#id_booking').html(result.id_booking);
                        $('#id_booking_terima').val(result.id_booking);
                        $('#id_pasien_terima').val(result.id_pasien);
                        $('#id_user_terima').val(id_user_terima);
                        $('#id_dokter_terima').val(result.id_dokter);

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error get data from ajax');
                    }
                });
            }

            function tolak(id_pasien) {
                $('#ModalTolak').show();
                $.ajax({
                    url: link + "Owner/ajax_get_terima/" + id_pasien,
                    type: "GET",
                    dataType: "JSON",
                    success: function(result) {
                        $('#nama_tolak').html(result.nama_depan + '-' + result.nama_belakang);

                        $('#id_booking_tolak').val(result.id_booking);
                        $('#id_pasien_tolak').val(result.id_pasien);
                        $('#id_user_tolak').val(id_user_terima);
                        $('#id_dokter_tolak').val(result.id_dokter);

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error get data from ajax');
                    }
                });
            }

            function Batal() {
                $('#myModal').hide();
            }

            function Batal2() {
                $('#ModalTolak').hide();
            }

            function cari_data() {
                var cari_nama = $("#cari_nama").val();
                var cari_tgl_lahir = $("#cari_tgl_lahir").val();
                var cari_id_booking = $("#cari_id_booking").val();
                var cari_dokter = $("#cari_dokter").val();
                var cari_tgl = $("#cari_tgl").val();
                var cari_jam = $("#cari_jam").val();

                $('#all_data_json').bootstrapTable('refresh', {
                    url: '<?php echo base_url() ?>Owner/get_konfirmasi_janji/' + (cari_nama != "" ? cari_nama : '0') + '/' + (cari_tgl_lahir != "" ? cari_tgl_lahir : '0') + '/' + (cari_id_booking != "" ? cari_id_booking : '0') + '/' + (cari_dokter != "" ? cari_dokter : '0') + '/' + (cari_tgl != "" ? cari_tgl : '0') + '/' + (cari_jam != "" ? cari_jam : '0')
                });
            }
        </script>
        <script type="text/javascript">
            // 			$('#closemodal').click(function() {
            //     $('#ModalTolak').modal('hide');
            // });
            $(".remove").click(function() {
                var id = $(this).parents("tr").attr("id");

                swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this imaginary file!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel plx!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                url: '/item-list/' + id,
                                type: 'DELETE',
                                error: function() {
                                    alert('Something is wrong');
                                },
                                success: function(data) {
                                    $("#" + id).remove();
                                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                                }
                            });
                        } else {
                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                    });

                // $('#ModalTolak').modal('hide');
            });
        </script>

        <script>
            function popUpBatalKonfirmasi() {
                swal("Terkirim!", "Konfirmasi Penolakan untuk Pasien berhasil terkirim", "success");
            }
        </script>

        <script>
            function popUp() {
                swal("Terkirim!", "Kode Verifikasi Pasien Anda Telah Berhasil Dikirimkan Kembali", "success");
                // swal({
                // 		title: "Are you sure?",
                // 		text: "Once deleted, you will not be able to recover this imaginary file!",
                // 		icon: "warning",
                // 		buttons: true,
                // 		dangerMode: true,
                // 	})
                // 	.then((willDelete) => {
                // 		if (willDelete) {
                // 			swal("Poof! Your imaginary file has been deleted!", {
                // 				icon: "success",
                // 			});
                // 		} else {
                // 			swal("Your imaginary file is safe!");
                // 		}
                // 	});
            }
        </script>
        <script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script>