<style>
    .nav-tabs #myTab .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #007BFF;
        background-color: transparent;
        border-color: transparent transparent #f3f3f3;
        border-bottom: 3px solid !important;
    }

    #myTab .nav-link {
        border: 1px solid transparent;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
        border-bottom: none;
    }

    #mytab>li>a {
        border-bottom: none !important;
    }

    #myTab .nav-link:hover {
        border: none !important;
    }

    .lap-mb {
        background: #fff;
        display: block;
        margin: 20px 0 0 0;
        text-align: center;
        float: right;
        border: 2px solid #ccc;
        text-decoration: none;
        cursor: pointer;
    }

    .lap-mb.active {
        background: #007BFF;
        display: block;
        margin: 20px 0 0 0;
        text-align: center;
        float: right;
        border: 2px solid #007BFF;
        text-decoration: none;
        cursor: pointer;
    }

    .lap-mb.active a {
        color: #fff;
    }

    .lap-mb:hover {
        background: #007BFF;
        display: block;
        margin: 20px 0 0 0;
        text-align: center;
        float: right;
        border: 2px solid #007BFF;
        text-decoration: none;
        cursor: pointer;
    }

    .lap-mb a:hover {
        color: #fff;
    }
</style>

<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h3>Laporan Pemeriksaan</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="row ml-2">
                            <a href="<?= base_url('laporan/pemeriksaan') ?>" class="btn btn-secondary btn-lg mr-3 text-light">Total Transaksi</a>
                            <a href="<?= base_url('laporan/sharingfee_dokter') ?>" class="btn btn-secondary text-light">Doctor Sharing Fee</a>
                        </div>
                    </div>
                    <div class="col-lg-2 offset-lg-5 text-right">
                        <a href="<?= base_url('laporan/export_pemeriksaan_t') ?>" class="btn btn-secondary"><i class="ik ik-download mr-2"></i>Download</a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-1 my-auto">
                        <h6>Filter</h6>
                    </div>
                    <div class="col-lg-3 ml-3">
                        <div class="row border rounded" style="background-color: #E9ECEF;font-weight:bold;padding:5px;">
                            <div class="col-md-2 my-auto">
                                <i class="ik ik-user"></i>
                            </div>
                            <div class="col-md-10">
                                <select id="f_dokter" class="form-control form-control-sm">

                                    <option value="b.id_dokter">Tampilkan Semua</option>

                                    <?php foreach ($dokter->result() as $result) : ?>
                                        <option value="<?php echo $result->id_dokter  ?>"><?php echo $result->nama_dokter ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-1 offset-lg-2 my-auto">
                        <h6>Periode</h6>
                    </div>
                    <div class="col-lg-4 text-right">
                        <div class="row border rounded my-auto" style="background-color: #E9ECEF; font-weight:bold;padding:5px;">
                            <div class="col-md-2 my-auto">
                                <i class="ik ik-calendar"></i>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control form-control-sm" autocomplete="off" id="from" name='from'></input>
                            </div>
                            <div class="col-lg-2 mt-2">
                                <h6>To</h6>
                            </div>
                            <div class="col-lg-4">
                                <input class="form-control form-control-sm" autocomplete="off" id="to" name='to' disabled='disabled'></input>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="offset-lg-6 col-lg-6">
                        <div class="row">
                            <div class="col-lg-3 lap-mb">
                                <a href="<?php echo site_url('laporan/pemeriksaan') ?>" type="button" class="btn col-md-12">Harian</a>
                            </div>
                            <div class="col-lg-3 lap-mb">
                                <a href="<?php echo site_url('laporan/pemeriksaan_m') ?>" type="button" class="btn col-md-12">Mingguan</a>
                            </div>
                            <div class="col-lg-3 lap-mb">
                                <a href="<?php echo site_url('laporan/pemeriksaan_b') ?>" type="button" class="btn col-md-12">Bulanan</a>
                            </div>
                            <div class="col-lg-3 lap-mb active">
                                <a href="<?php echo site_url('laporan/pemeriksaan_t') ?>" type="button" class="btn col-md-12">Tahunan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 20px;">
                    <div id="pemeriksaan_t"></div>
                    <div id="container2"></div>
                </div>

                <div class="row">
                    <div class="col border" style="margin: 30px;border-radius: 10px;background: #E9ECEF;">

                        <div class="col-md-12 mt-3">

                            <h5 class="text-center" style="font-weight:bold">Conversion Rate</h5>

                            <div class="col-md-12 text-center" style="text-align:left">

                                <h1 id="txtconv" style="color:black;font-weight:bold;"></h1>

                            </div>

                            <select hidden name="convrate" id="convrate">

                                <option value="0" selected></option>

                            </select>

                            <div class="col-md-12">

                                <p align="center">

                                    Dari seluruh pasien yang memiliki janji telah selesai dilakukan pemeriksaan

                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="col border" style="margin-top: 30px;margin-bottom: 30px;border-radius:10px;background: #E9ECEF;">

                        <div class="col-md-12 mt-3">

                            <h5 class="text-center" style="font-weight:bold">E-Rekam Medis</h5>

                            <div class="col-md-12 text-center" style="text-align:left">

                                <h1 id="txterkm" style="color:black;font-weight:bold;"></h1>

                            </div>

                            <div class="col-md-12">

                                <p align="center">

                                    E-Rekam Medis dari seluruh pasien yang melakukan pemeriksaan telah terisi lengkap

                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="col border" style="margin: 30px;border-radius:10px;background: #E9ECEF;">

                        <div class="col-md-12 mt-3">

                            <h5 class="text-center" style="font-weight:bold">Rata2 Kepuasan</h5>

                            <div class="col-md-12 text-center" style="text-align:left">

                                <h1 id="txtpuas" style="color:black;font-weight:bold">4.5</h1>

                            </div>

                            <div class="col-md-12">

                                <p align="center">

                                    Nilai kepuasan rata2 dari seluruh pasien yang telah selesai dilakukan pemeriksaan

                                </p>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <div class="col-lg-8">
                    <h3>Detail Pemeriksaan</h3>
                </div>
                <div class="col-lg-2">
                    <a href="<?php echo base_url('laporan/export_detail') ?>" class="btn btn-secondary"><i class="ik ik-download"></i>Download</a>
                </div>
            </div>
            <div class="card-body">
                <div style="width: 100%; height: 700px; overflow-y: scroll; overflow-x: hidden;">

                    <?php foreach ($laporan->result() as $result) : ?>
                        <div class="row mt-3 ml-1">

                            <div class="col-md-5" style="text-align: left;">

                                <h6 style="font-weight: bold;"><?php echo $result->jam_rencana_mulai ?> - <?php echo $result->jam_rencana_selesai ?></h6>

                                <h6><?php echo $result->nama_dokter ?></h6>

                                <br>

                                <span class="badge badge-success mt-2">Telah Terbayar</span>

                                <br><br>

                            </div>

                            <div class="col-md-6" style="padding-right: 10px;">

                                <h6 style="font-weight: bold ;"><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></h6>

                                <p style="font-size: 10px ;">No. Rekam Medis <?php echo $result->id_rekam_medis ?></p>

                                <p style="font-size: 12px;"><?php

                                                            if ($result->hubungan == 'Anda') {

                                                                echo "Atas nama sendiri ";
                                                            } elseif ($result->hubungan == 'Anak') {

                                                                echo $result->hubungan . " " . "<span id ='hubung_id'></span>";
                                                            } elseif ($result->hubungan == 'Ibu') {

                                                                echo $result->hubungan . " " . "<span id ='hubung_id2'></span>";
                                                            } elseif ($result->hubungan == 'Ayah') {

                                                                echo $result->hubungan . " " . "<span id ='hubung_id3'></span>";
                                                            } elseif ($result->hubungan == 'Istri') {

                                                                echo $result->hubungan . " " . "<span id ='hubung_id4'></span>";
                                                            } elseif ($result->hubungan == 'Suami') {

                                                                echo $result->hubungan . " " . "<span id ='hubung_id5'></span>";
                                                            } elseif ($result->hubungan == 'Saudara') {

                                                                echo $result->hubungan . " " . "<span id ='hubung_id6'></span>";
                                                            }

                                                            ?></p>

                                <select hidden name="id_user" id="id_user">

                                    <option value="0" selected></option>

                                </select>

                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    $(document).ready(function() {
        hubungan_pasien();
        $('#id_user').change(function() {
            // let a = $(this).val();
            // console.log(a);
        });
    });

    function hubungan_pasien() {
        var id = $('#id_user').val();
        $.ajax({
            url: "<?= base_url('dokter/get_hubungan_pasien/' . $result->id_user) ?>",
            data: {
                id: id
            },
            success: function(data) {
                // console.log(data);
                $('#hubung_id').html(data);
            }
        })
        $.ajax({
            url: "<?= base_url('dokter/get_hubungan_pasien/' . $result->id_user) ?>",
            data: {
                id: id
            },
            success: function(data) {
                // console.log(data);
                $('#hubung_id2').html(data);
            }
        })
        $.ajax({
            url: "<?= base_url('dokter/get_hubungan_pasien/' . $result->id_user) ?>",
            data: {
                id: id
            },
            success: function(data) {
                // console.log(data);
                $('#hubung_id3').html(data);
            }
        })
        $.ajax({
            url: "<?= base_url('dokter/get_hubungan_pasien/' . $result->id_user) ?>",
            data: {
                id: id
            },
            success: function(data) {
                // console.log(data);
                $('#hubung_id4').html(data);
            }
        })
        $.ajax({
            url: "<?= base_url('dokter/get_hubungan_pasien/' . $result->id_user) ?>",
            data: {
                id: id
            },
            success: function(data) {
                // console.log(data);
                $('#hubung_id5').html(data);
            }
        })
        $.ajax({
            url: "<?= base_url('dokter/get_hubungan_pasien/' . $result->id_user) ?>",
            data: {
                id: id
            },
            success: function(data) {
                // console.log(data);
                $('#hubung_id6').html(data);
            }
        });
    }

    $(document).ready(function() {
        conversion_rate();
        $('#convrate').change(function() {
            // let a = $(this).val();
            // console.log(a);
        });
    });

    function conversion_rate() {
        var cr = $('#convrate').val();
        $.ajax({
            url: "<?= base_url('laporan/get_conversion_rate/') ?>",
            data: {
                cr: cr
            },
            success: function(data) {
                // console.log(data);
                $('#txtconv').html(data);
            }
        })
        $.ajax({
            url: "<?= base_url('laporan/get_e_rekam_medis/') ?>",
            data: {
                cr: cr
            },
            success: function(data) {
                // console.log(data);
                $('#txterkm').html(data);
            }
        })
        // $.ajax({
        //   url : "<?= base_url('laporan/get_conversion_rate/') ?>",
        //   data : {cr:cr},
        //   success:function(data){
        //       // console.log(data);
        //     $('#txtconv').html(data);
        //   }
        // });
    }
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    //Script ini digunakan untuk filter

    $(document).ready(function() {

        $('#f_dokter').change(function() {

            filter_dokter();

        });

    });



    function filter_dokter() {

        var id_dokter = $('#f_dokter').val();

        var startDate = $('#from').val();

        var endDate = $('#to').val();

        //Mendapatkan Interval Hari untuk filter periode

        date1 = startDate.split('-');

        date2 = endDate.split('-');

        date1 = new Date(date1[0], date1[1], date1[2]);

        date2 = new Date(date2[0], date2[1], date2[2]);

        date1_unixtime = parseInt(date1.getTime() / 1000);

        date2_unixtime = parseInt(date2.getTime() / 1000);

        var timeDifference = date2_unixtime - date1_unixtime;

        var timeDifferenceInHours = timeDifference / 60 / 60;

        var timeDifferenceInDays = timeDifferenceInHours / 24;

        var interval = timeDifferenceInDays;

        $.ajax({

            url: "<?= base_url('laporan/filter_laporan_pemeriksaan_t') ?>",

            data: {

                id_dokter: id_dokter,

                interval: interval,

                endDate: endDate,

                startDate: startDate

            },

            success: function(data) {

                $('#pemeriksaan_t').empty();

                $('#container2').html(data);

            },

            error: function(request, status, error) {

                alert(request.responseText);

            }

        });

    }



    function enableEnd() {

        var date = new Date(this.value);

        date.setDate(date.getDate() + 4379);

        var id_dokter = $('#f_dokter').val();

        var startDate = $('#from').val();

        var endDate = $('#to').val();

        //Mendapatkan Interval Hari untuk filter periode

        date1 = startDate.split('-');

        date2 = endDate.split('-');

        date1 = new Date(date1[0], date1[1], date1[2]);

        date2 = new Date(date2[0], date2[1], date2[2]);

        date1_unixtime = parseInt(date1.getTime() / 1000);

        date2_unixtime = parseInt(date2.getTime() / 1000);

        var timeDifference = date2_unixtime - date1_unixtime;

        var timeDifferenceInHours = timeDifference / 60 / 60;

        var timeDifferenceInDays = timeDifferenceInHours / 24;

        var interval = timeDifferenceInDays;

        $.ajax({

            url: "<?= base_url('laporan/filter_laporan_pemeriksaan_t') ?>",

            data: {

                id_dokter: id_dokter,

                interval: interval,

                startDate: startDate,

                endDate: endDate

            },

            success: function(data) {

                $('#pemeriksaan_t').empty();

                $('#container2').html(data);

            },

            error: function(request, status, error) {

                alert(request.responseText);

            }

        });

        end.attr('disabled', !this.value.length).

        datepicker('option', {

            minDate: this.value,

            changeMonth: true,

            changeYear: true,

            dateFormat: 'yy-mm-dd',

            monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',

                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'

            ],

            dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', 'Ka', 'Jum', 'Sab'],

            dayNames: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],

            maxDate: date,

            onSelect: function(dateText) {

                var id_dokter = $('#f_dokter').val();

                var startDate = $('#from').val();

                var endDate = $('#to').val();

                //Mendapatkan Interval Hari untuk filter periode

                date1 = startDate.split('-');

                date2 = endDate.split('-');

                date1 = new Date(date1[0], date1[1], date1[2]);

                date2 = new Date(date2[0], date2[1], date2[2]);

                date1_unixtime = parseInt(date1.getTime() / 1000);

                date2_unixtime = parseInt(date2.getTime() / 1000);

                var timeDifference = date2_unixtime - date1_unixtime;

                var timeDifferenceInHours = timeDifference / 60 / 60;

                var timeDifferenceInDays = timeDifferenceInHours / 24;

                var interval = timeDifferenceInDays;

                $.ajax({

                    url: "<?= base_url('laporan/filter_laporan_pemeriksaan_t') ?>",

                    data: {

                        id_dokter: id_dokter,

                        interval: interval,

                        endDate: endDate,

                        starDate: startDate

                    },

                    success: function(data) {

                        $('#pemeriksaan_t').empty();

                        $('#container2').html(data);

                    },

                    error: function(request, status, error) {

                        alert(request.responseText);

                    },

                });

            },

            onClose: function(selectedDate) {

                var date = new Date(selectedDate);

                date.setDate(date.getDate() - 4379);

                $("#from").datepicker('option', {

                    minDate: date,

                    maxDate: selectedDate

                });

            }

        });

    }

    var end = $('#to').datepicker();

    $('#from').datepicker({

        onSelect: enableEnd,

        changeMonth: true,

        changeYear: true,

        defaultDate: 0,

        dateFormat: 'yy-mm-dd',

        monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',

            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'

        ],

        dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', 'Ka', 'Jum', 'Sab'],

        dayNames: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']

    }).bind('input', enableEnd);
</script>

<?php
$total = 0;
foreach ($harian->result() as $value) {
    $total += $value->money;
}
$rata_rata = $total / count($harian->result());
$average = "Rp " . number_format((int)$rata_rata, 0, ",", ".");
?>

<script type="text/javascript">
    var change = {
        0: '0',
        1000000: 'Rp. 1.000.000',
        2500000: 'Rp. 2.500.000',
        5000000: 'Rp. 5.000.000',
        7500000: 'Rp. 7.500.000',
        10000000: 'Rp. 10.500.000'
    };
    Highcharts.chart('pemeriksaan_t', {
        chart: {
            height: 500,
            borderRadius: 10,
            backgroundColor: '#E9ECEF',
            type: 'column'
        },
        title: {
            text: 'Pendapatan',
            align: 'left',
            style: {
                fontWeight: 'bold',
                fontSize: "15px"
            },
        },
        xAxis: {
            categories: [
                <?php foreach ($harian->result() as $result89) : ?> "<?php echo "Tahun " . $result89->tahun ?>",
                <?php endforeach; ?>
            ],
            labels: {
                style: {
                    color: 'black',
                    fontWeight: 'bold'
                }
            },
            title: {
                enabled: true,
                text: '------ Rata2 pendapatan ------',
                style: {
                    fontWeight: 'normal'
                }
            }
        },
        yAxis: {
            labels: {
                formatter: function() {
                    var value = change[this.value];
                    return value !== 'undefined' ? value : this.value;
                }
            },
            plotLines: [{
                color: 'black',
                value: <?php echo (int)$rata_rata ?>,
                width: '1',
                zIndex: 2,
                dashStyle: 'Dash',
                label: {
                    text: '<?php echo $average ?>',
                    textAlign: 'left',
                    fontSize: '6px',
                    x: -82
                }
            }]
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b> Rp. {point.y:.1f},-</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
                borderRadius: 10,
                pointWidth: 20
            }
        },
        series: [{
                type: 'column',
                name: '',
                showInLegend: false,
                states: {
                    hover: {
                        color: '#f40049'
                    }
                },
                data: [
                    <?php
                    foreach ($harian->result() as $key => $value) : {
                            $last = count($harian->result()) - 1;
                            echo '{y :';
                            echo $value->money;
                            if ($key == $last) {
                                echo ",color : '#f40049'},";
                            } else
                                echo ",color : '#6A5C59'},";
                        }
                    ?>
                    <?php endforeach ?>
                ]

            },
            {
                marker: {
                    enabled: false,
                },
                type: 'line',
                name: '',
                lineColor: 'blue',
                showInLegend: false,
                states: {
                    hover: {
                        color: '#f40049'
                    }
                },
                data: [
                    <?php foreach ($harian->result() as $result89) : ?> {
                            color: 'blue',
                            y: <?php echo $result89->money ?>
                        },
                    <?php endforeach; ?>
                ]

            }
        ]
    });
</script>