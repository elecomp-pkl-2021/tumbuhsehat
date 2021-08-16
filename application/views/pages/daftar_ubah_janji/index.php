<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Cari Perjanjian</h3>
			</div>
			<div class="card-body">
				<div class="form-group">
					<div class="row">
						<div class="col-lg-8 col-md-8">
							<label for="">Cari Kode Booking</label>
							<div class="input-group-prepend">
								<input class="form-control col-lg-4" type="text" placeholder="Nama Pasien" id="kode_booking_id">
								<button class="ml-2 col-md-2 btn btn-danger" id="filter_all">Cari</button>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-2 col-md-4 col-6">
							<label for="">Cari Nama Pasien</label>
							<input class="form-control" id="cari_nama" type="text" placeholder="Nama Pasien" autocomplete="off" onkeyup="cari_data2()">
						</div>
						<div class="col-lg-2 col-md-4 col-6">
							<label for="">Cari Tanggal Lahir</label>
							<input type="text" id="cari_tgl_lahir" class="form-control" placeholder="Tanggal Lahir" autocomplete="off" onkeyup="cari_data2()">
						</div>
						<div class="col-lg-2 col-md-4 col-6">
							<label for="">Cari No Rekam Medis</label>
							<input type="text" id="cari_rekam_medis" class="form-control" placeholder="No Rekam Medis" autocomplete="off" onkeyup="cari_data2()">
						</div>
						<div class="col-lg-2 col-md-4 col-6">
							<label for="">Cari Dokter</label>
							<input class="form-control" id="cari_dokter" type="text" placeholder="Nama Dokter" autocomplete="off" onkeyup="cari_data2()">
						</div>
						<div class="col-lg-2 col-md-4 col-6">
							<label for="">Cari Tanggal Pemeriksaan</label>
							<input type="text" id="cari_tgl" class="form-control" placeholder="Tanggal Pemeriksaan" autocomplete="off" onkeyup="cari_data2()">
						</div>
						<div class="col-lg-2 col-md-4 col-6">
							<label for="">Cari Jam Pemeriksaan</label>
							<input type="text" id="cari_jam" class="form-control" placeholder="Jam Pemeriksaan" autocomplete="off" onkeyup="cari_data2()">
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3>Registrasi / Ubah Janji</h3>
					</div>
					<div class="card-body" style="margin-top: -20px;">
						<table id="all_data_json_register" data-toggle="table" data-url="<?php echo base_url('janji/get_register_janji2'); ?>" data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="nama" data-sort-order="asc" data-toolbar="#toolbar">
							<thead>
								<tr>
									<th data-field="no_antrian" data-formatter="runningFormatter" data-align="right">No.
									</th>
									<th data-field="nama_depan|nama_belakang" data-sortable="true" data-formatter="namaPasien">Nama Pasien</th>
									<th data-field="tanggal_lahir" data-sortable="true">Tanggal Lahir</th>
									<th data-field="id_rekam_medis" data-sortable="true">No. Rekam Medis</th>
									<th data-field="nama_dokter" data-sortable="true">Dokter Pilihan</th>
									<th data-field="tanggal_rencana" data-sortable="true">Tanggal Periksa</th>
									<th data-field="jam_rencana_mulai|jam_rencana_selesai" data-sortable="true" data-formatter="JamPeriksa">Jam Periksa Pasien</th>
									<th data-field="id_pasien|id_booking" data-sortable="true" data-formatter="aksi">
										Actions</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3>Registrasi / Ubah Janji Terlambat</h3>
					</div>
					<div class="card-body" style="margin-top: -20px;">
						<table id="all_data_json_ubah" data-toggle="table" data-url="<?php echo base_url('janji/get_register_ubah_terlambat'); ?>" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="nama" data-sort-order="asc" data-toolbar="#toolbar">
							<thead>
								<tr>
									<th data-field="no_antrian" data-formatter="runningFormatter" data-align="right">No.
									</th>
									<th data-field="id_booking" data-sortable="true">Kode Booking</th>
									<th data-field="nama_depan|nama_belakang" data-sortable="true" data-formatter="namaPasien">Nama Pasien</th>
									<th data-field="tanggal_lahir" data-sortable="true">Tanggal Lahir</th>
									<th data-field="id_rekam_medis" data-sortable="true">No. Rekam Medis</th>
									<th data-field="nama_dokter" data-sortable="true">Dokter Pilihan</th>
									<th data-field="tanggal_rencana" data-sortable="true">Tanggal Periksa</th>
									<th data-field="jam_rencana_mulai|jam_rencana_selesai" data-sortable="true" data-formatter="JamPeriksa">Jam Periksa Pasien</th>
									<th data-field="id_pasien|id_booking" data-formatter="activity">Actions
									</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div id="myModal" class="modal" tabindex="-1" style="top: 100px;">
			<form class="form-horizontal" action="<?php echo base_url('janji/update_janji/'); ?>" method="post" enctype="multipart/form-data" role="form">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title text-center"><b>Registrasi</b></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Batal()">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<div class="modal-body">
							<h4 class="madal-body">
								<center><span id="nama"></span></center>
							</h4>

							<h6>
								<center>dengan dokter <span id="nama_dokter"></span> di <span id="nama_cabang"></span></center>
							</h6>
							<h6>
								<center>pada tanggal <span id="tgl"></span> jam <span id="jam"></span></center>
							</h6>
							<br>
						</div>

						<input type="hidden" class="form-control" name="id_booking" id="id_booking_daftar">
						<input type="hidden" class="form-control" name="id_rekam_medis" id="id_rekam_medis_daftar">
						<input type="hidden" class="form-control" name="id_pasien" id="id_pasien_daftar">
						<input type="hidden" class="form-control" name="id_dokter" id="id_dokter_daftar">

						<div class="modal-footer">
							<button class="btn btn-primary" onclick="popUp()" type="submit"> Daftar&nbsp;</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="Batal()"> Batal</button>
						</div>

					</div>
				</div>
			</form>
		</div>

		<div id="modalUbahNew" class="modal" style="top: 100px;">
			<form class="form-horizontal" action="<?php echo base_url('janji/update_rencana/'); ?>" method="post" enctype="multipart/form-data" role="form">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title text-center"><b>Ubah Jadwal Pemeriksaan</b></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Batal_janji()">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="container-fluid">
								<div class="row">
									<h3 class="mx-auto">
										<span id="nama_depan"></span> <span id="nama_belakang"></span>
									</h3>
								</div>
								<br>
								<div class="row">
									<label class="col-lg-2 col-sm-2 my-auto">Tanggal</label>
									<div class="col-lg-4">
										<input type="text" class="form-control" name="tanggal_rencana" id="tanggal_rencana" readonly>
									</div>
									<div class="col-lg-6">
										<input type="date" class="form-control" name="tanggal_rencana_date" id="tanggal_rencana_date" required>
									</div>
								</div>
								<br><br>
								<div class="row">
									<label class="col-lg-2 col-sm-2">Waktu</label>
									<div class="col-lg-10" id="jam_rencana"></div>
								</div>
							</div>

							<input type="hidden" class="form-control" id="id_rcn" name="id_rcn">
							<input type="hidden" class="form-control" id="id_booking" name="id_booking">
							<input type="hidden" class="form-control" id="id_dokter" name="id_dokter">
							<input type="hidden" id="jam_rencana_mulai" name="jam_rencana_mulai">
							<input type="hidden" id="jam_rencana_selesai" name="jam_rencana_selesai">
						</div>
						<div class="modal-footer">
							<button class="btn btn-primary" onclick="popUpBatalKonfirmasi()" type="submit"> Ubah&nbsp;</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="Batal_janji()">
								Batal</button>
						</div>

					</div>
				</div>
			</form>
		</div>

		<div id="ModalUbahJanji" class="modal" style="top: 100px;">
			<form class="form-horizontal" action="<?php echo base_url('janji/update_rencana/'); ?>" method="post" enctype="multipart/form-data" role="form">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" style="text-align: center;"><b>Ubah Jadwal Pemeriksaan</b></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Batal_janji2()">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="container-fluid">
								<div class="row">
									<h3 class="mx-auto">
										<span id="nama_orang"></span> <span id="nama_belakang"></span>
									</h3>
								</div>
								<br>
								<div class="row">
									<label class="col-lg-2 col-sm-2 my-auto">Tanggal</label>
									<div class="col-lg-4">
										<input type="text" class="form-control" name="tanggal_rencana" id="tanggal_rencana_janji" readonly>
									</div>
									<div class="col-lg-6">
										<input type="date" class="form-control" name="tanggal_rencana_date" id="tanggal_rencana_date_janji" required>
									</div>
								</div>
								<br>
								<div class="row">
									<label class="col-lg-2 col-sm-2 control-label">Jam Periksa</label>
									<div class="col-lg-4">
										<button class="btn salmon" style="background-color:#F40049; color:white">
											<p style="color:white;" id="jam_mulai_selesai_janji"></p>
										</button>
									</div>
								</div>
								<br>
								<div class="row">
									<label class="col-lg-2 col-sm-2">Waktu</label>
									<div class="col-lg-10" id="jam_rencana_janji"></div>
								</div>
								<br>
							</div>
						</div>

						<input type="hidden" class="form-control" name="id_rcn" id="id_rcn_janji">
						<input type="hidden" class="form-control" name="id_booking" id="id_booking_janji">
						<input type="hidden" class="form-control" id="id_dokter_janji" name="id_dokter">
						<input type="hidden" id="jam_rencana_mulai_janji" name="jam_rencana_mulai">
						<input type="hidden" id="jam_rencana_selesai_janji" name="jam_rencana_selesai">

						<div class="modal-footer">

							<button class="btn btn-primary" onclick="popUpBatalKonfirmasi()" type="submit"> Ubah&nbsp;</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="Batal_janji2()">
								Batal</button>


						</div>

					</div>
				</div>
			</form>
		</div>

		<script>
			// $.getJSON('/calender/load_jadwal/'+start+'/'+dt, {
			// 	format: "json"
			// })
			// .done(function (data) {
			// });	
			var link = "<?php echo base_url() ?>";

			// $(document).ready(function(){
			// 	cari_data($("#cari_nama").val(), $("#cari_tgl_lahir").val(), $("#cari_rekam_medis").val(), $("#cari_dokter").val(),$("#cari_tgl").val(), $("#cari_jam").val(), $("#kode_booking_id").val());
			// });	

			function runningFormatter(value, row, index) {
				return index + 1;
			}

			function namaPasien(value, row, index) {
				return row.nama_depan + '  ' + row.nama_belakang;
			}

			function JamPeriksa(value, row, index) {
				return row.jam_rencana_mulai + '-' + row.jam_rencana_selesai;
			}

			function aksi(value, row, index) {
				return `
					<div class="input-group-prepend justify-content-center">					
						<a href="#" type="button" class="btn btn-primary col-md-4 mr-2" onclick="daftar('${row.id_booking}')">Daftar</a>
						<a href="#" class="btn btn-danger col-md-4" onclick="ubah_jadwal('${row.id_booking}')">Ubah</a>
					</div>
				`;
			}

			function activity(value, row, index) {
				return `
					<div class="justify-content-center">
						<a href="#" type="button" onclick="ubah_jadwal_terlambat('${row.id_booking}')" class="btn btn-danger col-md-12">Ubah</a>
					</div>
				`;
			}

			function daftar(id_booking) {
				$('#myModal').show();
				let id_user_terima = '<?= $this->session->userdata("id_user") ?>';

				$.ajax({
					url: link + "janji/ajax_get_daftar/" + id_booking,
					type: "GET",
					dataType: "JSON",
					success: function(result) {
						$('#nama').html(result.nama_depan + ' ' + result.nama_belakang);
						$('#nama_dokter').html(result.nama_dokter);
						$('#nama_cabang').html(result.nama_cabang);
						$('#tgl').html(result.tanggal_rencana);
						$('#jam').html(result.jam_rencana_mulai + '-' + result.jam_rencana_selesai);
						$('#id_booking_daftar').val(result.id_booking);
						$('#id_rekam_medis_daftar').val(result.id_rekam_medis);
						$('#id_pasien_daftar').val(result.id_pasien);
						$('#id_dokter_daftar').val(result.id_dokter);

					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error get data from ajax');
					}
				});
			}

			function ubah_jadwal_terlambat(id_booking) {
				$('#ModalUbahJanji').show();
				let id_user_terima = '<?= $this->session->userdata("id_user") ?>';
				$.ajax({
					url: link + "janji/ajax_get_ubah_terlambat/" + id_booking,
					type: "GET",
					dataType: "JSON",
					success: function(result) {
						$('#nama_orang').html(result.nama_depan + ' ' + result.nama_belakang);
						$('#tanggal_rencana_janji').val(result.tanggal_rencana);
						$('#tanggal_rencana_date_janji').val(result.tanggal_rencana);
						$('#id_rcn_janji').val(result.id_rcn);
						$('#id_booking_janji').val(result.id_booking);
						$('#jam_mulai_selesai_janji').html(result.jam_rencana_mulai + '-' + result
							.jam_rencana_selesai);
						$('#id_dokter_janji').val(result.id_dokter);
						$('#jam_rencana_mulai_janji').val(result.jam_rencana_mulai);
						$('#jam_rencana_selesai_janji').val(result.jam_rencana_selesai);

						cek_waktu_booking_janji(result.id_booking, result.id_dokter, result.tanggal_rencana);

					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error get data from ajax');
					}
				});
			}

			function Batal() {
				$('#myModal').hide();
			}

			function Batal_janji() {
				$('#modalUbahNew').hide();
			}

			function Batal_janji2() {
				$('#ModalUbahJanji').hide();
			}

			$("#filter_all").click(function() {

				cari_data($("#cari_nama").val(), $("#cari_tgl_lahir").val(), $("#cari_rekam_medis").val(), $(
						"#cari_dokter").val(), $("#cari_tgl").val(), $("#cari_jam").val(), $("#kode_booking_id")
					.val());
			});

			function cari_data(cari_nama, cari_tgl_lahir, cari_rekam_medis, cari_dokter, cari_tgl, cari_jam, kode_booking) {


				$('#all_data_json_register').bootstrapTable('refresh', {
					url: '<?php echo base_url() ?>janji/get_register_janji/' + (cari_nama != "" ? cari_nama : '0') + '/' +
						(cari_tgl_lahir != "" ? cari_tgl_lahir : '0') + '/' + (cari_rekam_medis != "" ?
							cari_rekam_medis : '0') + '/' + (cari_dokter != "" ? cari_dokter : '0') + '/' + (cari_tgl !=
							"" ? cari_tgl : '0') + '/' + (cari_jam != "" ? cari_jam : '0') + '/' + (kode_booking != "" ?
							kode_booking : '0')
				});

				alert(cari_nama);
			}

			function cari_data2() {
				var cari_nama = $("#cari_nama").val();
				var cari_tgl_lahir = $("#cari_tgl_lahir").val();
				var cari_rekam_medis = $("#cari_rekam_medis").val();
				var cari_dokter = $("#cari_dokter").val();
				var cari_tgl = $("#cari_tgl").val();
				var cari_jam = $("#cari_jam").val();
				var kode_booking = $("#kode_booking_id").val();

				$('#all_data_json_register').bootstrapTable('refresh', {
					url: '<?php echo base_url() ?>janji/get_register_janji/' + (cari_nama != "" ? cari_nama : '0') + '/' +
						(cari_tgl_lahir != "" ? cari_tgl_lahir : '0') + '/' + (cari_rekam_medis != "" ?
							cari_rekam_medis : '0') + '/' + (cari_dokter != "" ? cari_dokter : '0') + '/' + (cari_tgl !=
							"" ? cari_tgl : '0') + '/' + (cari_jam != "" ? cari_jam : '0') + '/' + (kode_booking != "" ?
							kode_booking : '0')
				});
			}

			function prosesRekamMedis(value) {
				return '<a href="<?php echo base_url(); ?>janji/create/' + value + '" class="btn btn-primary">Proses</a>';
			}

			function ubah_jadwal(id_pasien) {
				$('#modalUbahNew').show();
				$.ajax({
					url: "<?= base_url() ?>" + "janji/show_ubah_janji/" + id_pasien,
					dataType: "JSON",
					success: function(data) {
						// $("#jam_rencana").html(data.output);
						// console.log(data);
						$('#nama_depan').html(data.nama_depan);
						$('#nama_belakang').html(data.nama_belakang);
						$('#tanggal_rencana').val(data.tanggal_rencana);
						$('#tanggal_rencana_date').val(data.tanggal_rencana);

						$('#id_rcn').val(data.id_rcn);
						$('#id_booking').val(data.id_booking);
						$('#id_dokter').val(data.id_dokter);
						$('#jam_rencana_mulai').val(data.jam_rencana_mulai);
						$('#jam_rencana_selesai').val(data.jam_rencana_selesai);

						cek_waktu_booking(data.id_booking, data.id_dokter, data.tanggal_rencana);
					}
				});
			}

			$("#tanggal_rencana_date").on("change", function() {
				cek_waktu_booking($('#id_booking').val(), $('#id_dokter').val(), $(this).val());
			});

			$("#tanggal_rencana_date").datepicker({
				monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
					'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
				],
				dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', 'Ka', 'Jum', 'Sab'],
				dayNames: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
				minDate: 0,
				firstDay: 0,
				// dateFormat: "DD, dd-mm-yy",
				dateFormat: "yy-mm-dd",
				// beforeShowDay: function(date) {
				// 	return [jadwal_dokter.indexOf(date.getDay()) > -1];
				// }
			}).datepicker("setDate", '0');

			function cek_waktu_booking(id_booking, id_dokter, tanggal_rencana) {
				//let split_tgl = val.split("/");
				let tgl = tanggal_rencana;

				$.ajax({
					url: "<?= base_url() ?>" + "janji/show_jadwal_dokter/" + id_booking + "/" + id_dokter +
						"/" + tgl,
					dataType: "JSON",
					success: function(data) {
						$("#jam_rencana").html(data.output);
						console.log(data);
					}
				});
			}

			function cek_waktu_booking_janji(id_booking, id_dokter, tanggal_rencana) {
				//let split_tgl = val.split("/");
				let tgl = tanggal_rencana;

				$.ajax({
					url: "<?= base_url() ?>" + "janji/show_jadwal_dokter_janji/" + id_booking + "/" + id_dokter + "/" + tgl,
					dataType: "JSON",
					success: function(data) {
						$("#jam_rencana_janji").html(data.output);
						console.log(data);
					}
				});
			}

			function cek_jadwal(id_jadwal) {
				console.log('coba');
				document.getElementById("jadwal" + id_jadwal).style.color = "white";
				document.getElementById("jadwal" + id_jadwal).style.background = "#f40049";

				$.ajax({
					url: link + "janji/get_jadwal/" + id_jadwal,
					type: "GET",
					dataType: "JSON",
					success: function(result) {
						$('[name="jam_rencana_mulai"]').val(result.jam_mulai);
						$('[name="jam_rencana_selesai"]').val(result.jam_tutup);

					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error get data from ajax');
					}
				});
			}

			function cek_jadwal_janji(id_jadwal) {
				console.log('coba');
				document.getElementById("jadwal_janji" + id_jadwal).style.color = "white";
				document.getElementById("jadwal_janji" + id_jadwal).style.background = "#f40049";

				$.ajax({
					url: link + "janji/get_jadwal/" + id_jadwal,
					type: "GET",
					dataType: "JSON",
					success: function(result) {
						$('#jam_rencana_mulai_janji').val(result.jam_mulai);
						$('#jam_rencana_selesai_janji').val(result.jam_tutup);

					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error get data from ajax');
					}
				});
			}
		</script>

		<script>
			function popUpBatalKonfirmasi() {
				swal("Terkirim!", "Perubahan jadwal pemeriksaan pasien telah berhasil dilakukan", "success");
			}
		</script>

		<script>
			function popUp() {
				swal("Berhasil!", "Pasien telah terdaftar. Pasien dapat segera dipersilahkan masuk ke ruang pemeriksaan",
					"success");
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
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>