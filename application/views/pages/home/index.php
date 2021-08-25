<!-- <div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3>Buat Janji Pemeriksaan</h3>
            </div>
            <div class="card-body">
                <form method="GET" action="">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <label>Pilih Profil</label>
                                <select class="select2bs4" name="profil" id="profil" style="width: 100%;">
                                    <option><?= "Pilih Profil Pasien" ?></option>
                                    <option><?= "isi data 1" ?></option>
                                    <option><?= "isi data 2" ?></option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <label>Pilih Cabang</label>
                                <select class="select2bs4" name="cabang" id="cabang" style="width: 100%;">
                                    <option><?= "Pilih Cabang Klinik" ?></option>
                                    <option><?= "isi data 1" ?></option>
                                    <option><?= "isi data 2" ?></option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <label>Pilih Dokter</label>
                                <select class="select2bs4" name="dokter" id="dokter" style="width: 100%;">
                                    <option><?= "Pilih Dokter" ?></option>
                                    <option><?= "isi data 1" ?></option>
                                    <option><?= "isi data 2" ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Cari Jadwal</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3>Filter</h3>
            </div>
            <div class="card-body">
                <p>lolololo</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card" style="min-height: 422px;">
            <div class="card-header">
                <h3>Timeline</h3>
            </div>
            <div class="card-body timeline">
                <ul>
                    <li>
                        <div class="bullet bg-pink"></div>
                        <div class="time">11am</div>
                        <div class="desc">
                            <h3>Attendance</h3>
                            <h4>Computer Class</h4>
                        </div>
                    </li>
                    <li>
                        <div class="bullet bg-green"></div>
                        <div class="time">12pm</div>
                        <div class="desc">
                            <h3>Design Team</h3>
                            <h4>Hangouts</h4>
                        </div>
                    </li>
                    <li>
                        <div class="bullet bg-orange"></div>
                        <div class="time">2pm</div>
                        <div class="desc">
                            <h3>Finish</h3>
                            <h4>Go to Home</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="min-height: 422px;">
            <div class="card-header">
                <h3>Timeline</h3>
            </div>
            <div class="card-body timeline">
                <ul>
                    <li>
                        <div class="bullet bg-pink"></div>
                        <div class="time">11am</div>
                        <div class="desc">
                            <h3>Attendance</h3>
                            <h4>Computer Class</h4>
                        </div>
                    </li>
                    <li>
                        <div class="bullet bg-green"></div>
                        <div class="time">12pm</div>
                        <div class="desc">
                            <h3>Design Team</h3>
                            <h4>Hangouts</h4>
                        </div>
                    </li>
                    <li>
                        <div class="bullet bg-orange"></div>
                        <div class="time">2pm</div>
                        <div class="desc">
                            <h3>Finish</h3>
                            <h4>Go to Home</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="min-height: 422px;">
            <div class="card-header">
                <h3>Timeline</h3>
                <div class="card-header-right">
                </div>
            </div>
            <div class="card-body timeline">
                <ul>
                    <li>
                        <div class="bullet bg-pink"></div>
                        <div class="time">11am</div>
                        <div class="desc">
                            <h3>Attendance</h3>
                            <h4>Computer Class</h4>
                        </div>
                    </li>
                    <li>
                        <div class="bullet bg-green"></div>
                        <div class="time">12pm</div>
                        <div class="desc">
                            <h3>Design Team</h3>
                            <h4>Hangouts</h4>
                        </div>
                    </li>
                    <li>
                        <div class="bullet bg-orange"></div>
                        <div class="time">2pm</div>
                        <div class="desc">
                            <h3>Finish</h3>
                            <h4>Go to Home</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> -->

<div class="row">
	<div class="col-md-9">
		<div class="card">
			<div class="card-header">
				<h3>Daftar Pasien</h3>
			</div>
			<div class="card-body">
			<div class="form-group">
				<div class="row">
					<div class="col-lg-4 col-md-2 col-2">
						<label for="">Cari Nama Pasien</label>
						<input type="text" class="form-control" id="cari_nama" value="" placeholder="Cari Nama" autocomplete="off" style="background: #fff;border: 1px solid #eee;color:#000;" onkeyup="cari_data2()">
					</div>
					<div class="col-lg-4 col-md-2 col-2">
						<label for="">Cari Tanggal Lahir</label>
						<input type="text" class="form-control" id="cari_tgl_lahir" value="" placeholder="Cari Tanggal Lahir" autocomplete="off" style="background: #fff;border: 1px solid #eee;color:#000;" onkeyup="cari_data2()">
					</div>
					<div class="col-lg-4 col-md-2 col-2">
						<label for="">Cari No Rekam Medis</label>
						<input type="text" class="form-control" id="cari_rekam_medis" value="" placeholder="Cari No Rekam Medis" autocomplete="off" style="background: #fff;border: 1px solid #eee;color:#000;" onkeyup="cari_data2()">
					</div>
				</div>
			</div>
            <table id="all_data_json" data-toggle="table" data-url="<?php echo base_url('Pasien/get_informasi_pasien_dokter'); ?>" data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="nama" data-sort-order="asc" data-toolbar="#toolbar">
            <thead>
              <tr>
                <th data-sortable="true" data-field="" data-formatter="runningFormatter" data-align="center">No.</th>
                <th data-sortable="true" data-field="nama_depan|nama_belakang" data-align="center" data-formatter="namaPasien">Nama Pasien</th>
                <th data-sortable="true" data-field="tanggal_lahir" data-align="center">Tanggal Lahir</th>
                <th data-sortable="true" data-field="id_rekam_medis" data-align="center">No Rekam Medis</th>
                <th data-sortable="true" data-field="tanggal_rencana" data-align="center">Pemeriksaan Terakhir</th>
                <th data-field="id_pasien|id_booking|id_rekam_medis" data-align="center" data-formatter="actionPasien">Activity</th>
              </tr>
            </thead>
          </table>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card">
			<div class="card-header">
			<h3>Filter Pasien</h3>
			</div>
			<div class="card-body">
                <div class="form-group">
                    <input type="date" class="form-control" rows="3" autocomplete="off" name="tanggal_informasi" placeholder="filter tanggal" id="f_tanggal_informasi">
                    <?php
                    $tgl_rencana = [];
                    foreach ($informasi->result_array() as $rencana_result) {
                        if ($rencana_result != []) {
                        $tgl_rencana[] = $rencana_result['tanggal_rencana'];
                        }
                    }
                    $f_tgl_rencana = json_encode($tgl_rencana);
                    ?>
                </div>
                <div id="txtfilter" style="width: 100%; height: 700px; overflow-y: scroll; overflow-x: hidden; margin-top:30px">
                </div>
                <input type="hidden" id="hidden">

		</div>
	</div>
</div>



<link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery-ui.css">
<script src="<?= base_url() ?>assets/src/jquery-ui.js"></script>
<script src="<?= base_url() ?>assets/src/jquery-1.12.4.js"></script>

<script>
  var base_url = '<?php echo base_url()?>';
  function runningFormatter(value, row, index) {
    return index + 1;
  }

  function namaPasien(value, row, index){
    return row.nama_depan+' '+row.nama_belakang;
  }

  function actionPasien(value, row, index){
    return '<a href="'+base_url+'Pasien/detail_informasi_pasien/' +row.id_pasien +'/' + row.id_booking + '/' + row.id_rekam_medis+'.html" class="btn btn-anim" style="height: 35px; width: 70px; background-color: #19b5fe; color: white; border-radius: 5px"><span> Lihat</span></a>';
  }

  function proses(value) {
    return '<a href="#" onclick="prosesAntri(' + value + ')" class="btn btn-warning">Pilih</a>';
  }

  function cari_data2(){
			var cari_nama = $("#cari_nama").val();
			var cari_tgl_lahir = $("#cari_tgl_lahir").val();
			var cari_rekam_medis = $("#cari_rekam_medis").val();
			$('#all_data_json').bootstrapTable('refresh', {url: '<?php echo base_url()?>Pasien/get_informasi_pasien2/' +  (cari_nama != ""? cari_nama : '0') +'/'+(cari_tgl_lahir != ""? cari_tgl_lahir : '0') +'/'+ (cari_rekam_medis != ""? cari_rekam_medis : '0') });
	}

  function prosesAntri(id) {
    $("#formProsesAntri").attr("action", "<?php echo base_url(); ?>antrian/create_action/" + id);
    $('#alertAntri').modal('show');
  }
</script>

<script type="text/javascript">
  //      $('#closemodal').click(function() {
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

  $(document).ready(function() {
    pasien();
    $('#f_tanggal_informasi').change(function() {
      // let a = $(this).val();
      // console.log(a);
      pasien();
    });
  });

  function pasien() {
    var tgl = $('#f_tanggal_informasi').val();
    var id_dokter = $("#hidden_dokter_id").val();
    $.ajax({
      url: "<?= base_url('Pasien/filter_informasi_pasien2') ?>",
      data: {
        tgl: tgl,
        id_dokter: id_dokter
      },
      success: function(data) {
        $('#txtfilter').html(data);
        $('#hidden').val(id_dokter);
      }
    });
  }
  //Filter tanggal Informasi Pasien
  var enableDays = <?php echo $f_tgl_rencana ?>;

  function enableAllTheseDays(date) {
    var sdate = $.datepicker.formatDate('yy-mm-dd', date)
    if ($.inArray(sdate, enableDays) != -1) {
      return [true];
    }
    return [false];
  }
  $('#f_tanggal_informasi').datepicker({
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    beforeShowDay: enableAllTheseDays,
    monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
      'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ],
    dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', 'Ka', 'Jum', 'Sab'],
    dayNames: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
    onSelect: function(dateText, inst) {
      var id_dokter = $("#hidden").val();
      var tanggal = dateText;
      var tgl = dateText;
      $.ajax({
        url: "<?= base_url('Pasien/filter_informasi_pasien2') ?>",
        async: true,
        data: {
          tgl: tgl,
          id_dokter: id_dokter
        },
        success: function(data) {
          $('#txtfilter').html(data);
        }
      });
    }
  });
</script>