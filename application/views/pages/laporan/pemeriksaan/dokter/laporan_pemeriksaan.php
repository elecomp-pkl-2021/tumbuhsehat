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
                        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="transaksi-tab" data-toggle="tab" href="#transaksi" role="tab" aria-controls="transaksi" aria-selected="true">Total Transaksi</a>
                            </li>
                            <li class="nav-item border-lap">
                                <a class="nav-link" id="fee-tab" data-toggle="tab" href="#fee" role="tab" aria-controls="fee" aria-selected="false">Personal Sharing Fee</a>
                            </li>
                        </ul>
                    </div>
                    <div class="offset-lg-5 col-lg-2 text-right">
                        <a href="<?= base_url('laporan/export_pemeriksaan') ?>" class="btn btn-secondary"><i class="ik ik-download mr-2"></i>Download</a>
                    </div>
                </div>

                <div class="row">
                    <div class="offset-lg-8 col-lg-4">
                        <div class="row">
                            <div class="col-lg-4 lap-mb active">
                                <a href="<?php echo site_url('laporan/pemeriksaan') ?>" type="button" class="btn col-md-12">Harian</a>
                            </div>
                            <div class="col-lg-4 lap-mb">
                                <a href="<?php echo site_url('laporan/pemeriksaan_m') ?>" type="button" class="btn col-md-12">Mingguan</a>
                            </div>
                            <div class="col-lg-4 lap-mb">
                                <a href="<?php echo site_url('laporan/pemeriksaan_b') ?>" type="button" class="btn col-md-12">Bulanan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="transaksi" role="tabpanel" aria-labelledby="transaksi-tab" style="margin-top: 40px;">
                        <div id="pemeriksaan"></div>
                    </div>
                    <div class="tab-pane fade" id="fee" role="tabpanel" aria-labelledby="fee-tab" style="margin-top: 40px;">
                        <div id="fee"></div>
                    </div>
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
                    <a href="<?php echo base_url('laporan/export_detail_pemeriksaan') ?>" class="btn btn-secondary"><i class="ik ik-download"></i>Download</a>
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
            url: "<?= base_url('dokter/get_conversion_rate/' . $id_dokter) ?>",
            data: {
                cr: cr
            },
            success: function(data) {
                // console.log(data);
                $('#txtconv').html(data);
            }
        })
        $.ajax({
            url: "<?= base_url('dokter/get_e_rekam_medis/' . $id_dokter) ?>",
            data: {
                cr: cr
            },
            success: function(data) {
                // console.log(data);
                $('#txterkm').html(data);
            }
        })
        // $.ajax({
        //   url : "<?= base_url('dokter/get_survey_rate/' . $id_dokter) ?>",
        //   data : {cr:cr},
        //   success:function(data){
        //       // console.log(data);
        //     $('#txtconv').html(data);
        //   }
        // });
    }
</script>

<!-- <script>
    Highcharts.chart('pemeriksaan', {

        title: {
            text: 'Solar Employment Growth by Sector, 2010-2016'
        },

        subtitle: {
            text: 'Source: thesolarfoundation.com'
        },

        yAxis: {
            title: {
                text: 'Number of Employees'
            }
        },

        xAxis: {
            accessibility: {
                rangeDescription: 'Range: 2010 to 2017'
            }
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 2010
            }
        },

        series: [{
            name: 'Installation',
            data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
        }, {
            name: 'Manufacturing',
            data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
        }, {
            name: 'Sales & Distribution',
            data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
        }, {
            name: 'Project Development',
            data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
        }, {
            name: 'Other',
            data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });
</script> -->
<!-- 
<script>
    Highcharts.chart('fee', {

        title: {
            text: 'Solar Employment Growth by Sector, 2010-2016'
        },

        subtitle: {
            text: 'Source: thesolarfoundation.com'
        },

        yAxis: {
            title: {
                text: 'Number of Employees'
            }
        },

        xAxis: {
            accessibility: {
                rangeDescription: 'Range: 2010 to 2017'
            }
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 2010
            }
        },

        series: [{
            name: 'Installation',
            data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
        }, {
            name: 'Manufacturing',
            data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
        }, {
            name: 'Sales & Distribution',
            data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
        }, {
            name: 'Project Development',
            data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
        }, {
            name: 'Other',
            data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });
</script> -->

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
        0: 'Rp .0',
        100000: 'Rp. 100.000',
        1000000: 'Rp. 1.000.000',
        2500000: 'Rp. 2.500.000',
        5000000: 'Rp. 5.000.000',
        7500000: 'Rp. 7.500.000',
        10000000: 'Rp. 10.500.000'
    };
    Highcharts.chart('pemeriksaan', {
        chart: {
            height: 500,
            borderRadius: 10,
            backgroundColor: '#E9ECEF',
            type: 'column'
        },
        title: {
            text: 'Total Transaksi',
            align: 'left',
            style: {
                fontWeight: 'bold',
                fontSize: "15px"
            },
        },
        xAxis: {
            categories: [
                <?php foreach ($harian->result() as $result89) : ?> "<?php if ($result89->hari == 'Sunday') {
                                                                            echo "Minggu";
                                                                        } elseif ($result89->hari == 'Monday') {
                                                                            echo "Senin";
                                                                        } elseif ($result89->hari == 'Tuesday') {
                                                                            echo "Selasa";
                                                                        } elseif ($result89->hari == 'Wednesday') {
                                                                            echo "Rabu";
                                                                        } elseif ($result89->hari == 'Thursday') {
                                                                            echo "Kamis";
                                                                        } elseif ($result89->hari == 'Friday') {
                                                                            echo "Jumat";
                                                                        } elseif ($result89->hari == 'Saturday') {
                                                                            echo "Sabtu";
                                                                        }
                                                                        ?><br><?php echo $result89->tgl ?>",
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
            name: '',
            showInLegend: false,
            states: {
                hover: {
                    color: '#F40049'
                }
            },
            data: [
                <?php
                foreach ($harian->result() as $key => $value) : {
                        $last = count($harian->result()) - 1;
                        echo '{y :';
                        echo $value->money;
                        if ($key == $last) {
                            echo ",color : '#F40049'},";
                        } else
                            echo ",color : '#6A5C59'},";
                    }
                ?>
                <?php endforeach ?>
            ]
        }]
    });
</script>

<script type="text/javascript">
    var change = {
        0: '0',
        1000000: 'Rp. 1.000.000',
        2500000: 'Rp. 2.500.000',
        5000000: 'Rp. 5.000.000',
        7500000: 'Rp. 7.500.000',
        10000000: 'Rp. 10.500.000'
    };
    Highcharts.chart('fee', {
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
                <?php foreach ($lap_fee as $lap) : ?> "<?php echo $lap->tanggal_periksa ?>",
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
                text: '------ Sharing fee ------',
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
            }
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
            name: '',
            showInLegend: false,
            states: {
                hover: {
                    color: '#f40049'
                }
            },
            data: [
                <?php foreach ($lap_fee as $lap) : ?> {
                        color: '#f40049',
                        y: <?php echo $lap->total_pendapatan_fee ?>
                    },
                <?php endforeach; ?>
            ]

        }]
    });
</script>