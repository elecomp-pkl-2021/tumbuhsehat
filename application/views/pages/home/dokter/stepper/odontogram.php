<?php $a = 0;
$b = 1;
foreach ($pasien2->result() as $result) {
    $a++;
    if ($a <= $b) {
        $idpemeriksaan = $result->id_rekam_medis;
?>
        <?php echo $result->nama_depan; ?>
        (<?php
            $idRekamMedis = $result->id_rekam_medis;
            echo $result->id_rekam_medis;
            ?>)
<?php }
}
?>
<script>
    var session_id = '<?php echo $id_kpesan; ?>';
    var kode_pasien = '<?php echo $id_pasien ?>';
</script>
<form id="formRawatTambah" method="" enctype="multipart/form-data">
    <input type="hidden" name="id_bookingnya" id="id_bookingnya" value="<?php echo $result->id_booking; ?>">
    <input type="hidden" name="id_pasiennya" id="id_pasiennya" id="id_pasien" value="<?php echo $result->id_pasien; ?>">
    <input type="hidden" name="id_rekam_medisnya" id="id_rekam_medisnya" value="<?php echo $result->id_rekam_medis; ?>">
    <div class="col-lg-12 mt-4">
        <div class="row">
            <div class="col-sm-1">
                <div id="controls" class="panel panel-default">
                    <div class="panel-body">
                        <div class="btn-group list-group" data-toggle="buttons" style="margin-bottom: -9px;">
                            <div id="kariesSuperfisia" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 3px 0px;" onclick="zoom()">
                                <input type="radio" name="options" id="option21" style="position: fixed;opacity: 0;pointer-events: none;" checked><img src="<?php echo base_url('assets/img/icon/panah.jpg') ?>" style="width: 24px;">
                            </div>
                            <p>
                                <div id="kariesSuperfisia2" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 5px 0px;" onclick="defaulton()">
                                    <input type="radio" name="options" id="option2" style="position: fixed;opacity: 0;pointer-events: none;" checked><img src="<?php echo base_url('assets/img/icon/2.jpg') ?>" style="width: 28px;">
                                </div>
                            </p>
                            <div id="kariesSuperfisia3" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 5px 0px;" onclick="defaulton()">
                                <input type="radio" name="options" id="option3" style="position: fixed;opacity: 0;pointer-events: none;" checked> <img src="<?php echo base_url('assets/img/icon/3.jpg') ?>" style="width: 28px;">
                            </div>
                            <p>
                                <div id="kariesSuperfisia12" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 5px 0px;" onclick="defaulton()">
                                    <input type="radio" name="options" id="option13" style="position: fixed;opacity: 0;pointer-events: none;" checked> <img src="<?php echo base_url('assets/img/icon/41.jpg') ?>" style="width: 31px;">
                                </div>
                            </p>
                            <div id="kariesSuperfisia13" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 5px 0px;" onclick="defaulton()">
                                <input type="radio" name="options" id="option14" style="position: fixed;opacity: 0;pointer-events: none;" checked> <img src="<?php echo base_url('assets/img/icon/42.jpg') ?>" style="width: 31px;">
                            </div>
                            <p>
                                <div id="kariesSuperfisia14" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 5px 0px;" onclick="defaulton()">
                                    <input type="radio" name="options" id="option15" style="position: fixed;opacity: 0;pointer-events: none;" checked> <img src="<?php echo base_url('assets/img/icon/43.jpg') ?>" style="width: 31px;">
                                </div>
                            </p>
                            <div id="kariesSuperfisia4" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 5px 0px;" onclick="defaulton()">
                                <input type="radio" name="options" id="option4" style="position: fixed;opacity: 0;pointer-events: none;" checked><img src="<?php echo base_url('assets/img/icon/4.jpg') ?>" style="width: 28px;">
                            </div>
                            </p>
                            <div id="kariesSuperfisia5" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 5px 0px;" onclick="defaulton()">
                                <input type="radio" name="options" id="option5" style="position: fixed;opacity: 0;pointer-events: none;" checked><img src="<?php echo base_url('assets/img/icon/5.jpg') ?>" style="width: 28px;">
                            </div>
                            <p>
                                <div id="kariesSuperfisia6" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 5px 0px;" onclick="defaulton()">
                                    <input type="radio" name="options" id="option7" style="position: fixed;opacity: 0;pointer-events: none;" checked><img src="<?php echo base_url('assets/img/icon/6.jpg') ?>" style="width: 28px;">
                                </div>
                            </p>
                            <div id="kariesSuperfisia7" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 5px 0px;" onclick="defaulton()">
                                <input type="radio" name="options" id="option8" style="position: fixed;opacity: 0;pointer-events: none;" checked><img src="<?php echo base_url('assets/img/icon/7.jpg') ?>" style="width: 28px;">
                            </div>
                            <p>
                                <div id="kariesSuperfisia8" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 5px 0px;" onclick="defaulton()">
                                    <input type="radio" name="options" id="option9" style="position: fixed;opacity: 0;pointer-events: none;" checked><img src="<?php echo base_url('assets/img/icon/8.jpg') ?>" style="width: 28px;">
                                </div>
                            </p>
                            <div id="kariesSuperfisia9" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 5px 0px;" onclick="defaulton()">
                                <input type="radio" name="options" id="option10" style="position: fixed;opacity: 0;pointer-events: none;" checked><img src="<?php echo base_url('assets/img/icon/9.jpg') ?>" style="width: 28px;">
                            </div>
                            <p>
                                <div id="kariesSuperfisia10" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 5px 0px;" onclick="defaulton()">
                                    <input type="radio" name="options" id="option11" style="position: fixed;opacity: 0;pointer-events: none;" checked><img src="<?php echo base_url('assets/img/icon/10.jpg') ?>" style="width: 28px;">
                                </div>
                            </p>
                            <div id="kariesSuperfisia11" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 5px 0;">
                                <input type="radio" name="options" id="option6" autocomplete="off" style="position: fixed;opacity: 0;pointer-events: none;"><img src="<?php echo base_url('assets/img/icon/11.jpg') ?>" style="width: 28px;" onclick="defaulton()">
                            </div>
                            <p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-2">
                <div id="odontogram_utama">
                    <input type="hidden" id="example-cursor" value="-webkit-zoom-in">
                    <div id="svgselect" style="width: 610px; height: 230px; background-color: #ffffff;margin-left: 15px;margin-bottom: 385px;">
                        <!-- background-color:red -->


                        <svg version="1.1" height="140%" width="100%" style="overflow-x: scroll;">
                            <g transform="scale(1.5)" id="odontograma">

                            </g>
                        </svg>

                        <div class='col-sm-12'>
                            <div class="row">
                                <div class='col-sm-3'>
                                    <div id="controls" class="panel panel-default">
                                        <div class="panel-body">
                                            <svg version="1.1" height="100%" width="100%" style="overflow-x: scroll;" id="parentDiv">
                                                <g transform="scale(4.60),translate(0,0)" id="b_clone">
                                                    aaa
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-sm-5'>
                                    <div id="controls3" class="panel panel-default">
                                        <div class="panel-body" style='padding: 4px;'>
                                            <div class="btn-group list-group" data-toggle="buttons" style="margin-bottom: -9px;">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th colspan='2' style='font-size: 9px;color: #fff;background-color: #000;'>
                                                            Keadaan Gigi</th>
                                                        <th colspan='2' style='font-size: 9px;color: #fff;background-color: #000;'>
                                                            Restorasi dan Protesa</th>
                                                    </tr>
                                                    <tr>
                                                        <td style='font-size: 9px;'>
                                                            <div id="non" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0;">
                                                                <input type="radio" name="options" id="option14" style="position: fixed;opacity: 0;pointer-events: none;">non
                                                            </div>
                                                        </td>
                                                        <td style='font-size: 9px;'>
                                                            <div id="att" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0px;">
                                                                <input type="radio" name="options" id="option15" style="position: fixed;opacity: 0;pointer-events: none;">att
                                                            </div>
                                                        </td>
                                                        <td style='font-size: 9px;'>
                                                            <div id="gif" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0px;">
                                                                <input type="radio" name="options" id="option16" style="position: fixed;opacity: 0;pointer-events: none;">gif
                                                            </div>
                                                        </td>
                                                        <td style='font-size: 9px;'>
                                                            <div id="pon" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0px;">
                                                                <input type="radio" name="options" id="option17" style="position: fixed;opacity: 0;pointer-events: none;">pon
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style='font-size: 9px;'>
                                                            <div id="une" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0;">
                                                                <input type="radio" name="options" id="option18" style="position: fixed;opacity: 0;pointer-events: none;">une
                                                            </div>
                                                        </td>
                                                        <td style='font-size: 9px;'>
                                                            <div id="abr" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0px;">
                                                                <input type="radio" name="options" id="option19" style="position: fixed;opacity: 0;pointer-events: none;">abr
                                                            </div>
                                                        </td>
                                                        <td style='font-size: 9px;'>
                                                            <div id="inl" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0px;">
                                                                <input type="radio" name="options" id="option20" style="position: fixed;opacity: 0;pointer-events: none;">inl
                                                            </div>
                                                        </td>
                                                        <td style='font-size: 9px;'>
                                                            <div id="abu" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0px;">
                                                                <input type="radio" name="options" id="option21" style="position: fixed;opacity: 0;pointer-events: none;">abu
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style='font-size: 9px;'>
                                                            <div id="pre" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0;">
                                                                <input type="radio" name="options" id="option22" style="position: fixed;opacity: 0;pointer-events: none;">pre
                                                            </div>
                                                        </td>
                                                        <td style='font-size: 9px;'>
                                                            <div id="cfr" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0px;">
                                                                <input type="radio" name="options" id="option23" style="position: fixed;opacity: 0;pointer-events: none;">cfr
                                                            </div>
                                                        </td>
                                                        <td style='font-size: 9px;'>
                                                            <div id="onl" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0px;">
                                                                <input type="radio" name="options" id="option24" style="position: fixed;opacity: 0;pointer-events: none;">onl
                                                            </div>
                                                        </td>
                                                        <td style='font-size: 9px;'>
                                                            <div id="prd" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0px;">
                                                                <input type="radio" name="options" id="option25" style="position: fixed;opacity: 0;pointer-events: none;">prd
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style='font-size: 9px;'>
                                                            <div id="imv" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0;">
                                                                <input type="radio" name="options" id="option26" style="position: fixed;opacity: 0;pointer-events: none;">imv
                                                            </div>
                                                        </td>
                                                        <td style='font-size: 9px;'>
                                                            <div id="rrx" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0px;">
                                                                <input type="radio" name="options" id="option27" style="position: fixed;opacity: 0;pointer-events: none;">rrx
                                                            </div>
                                                        </td>
                                                        <td style='font-size: 9px;'>
                                                            <div id="mpc" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0px;">
                                                                <input type="radio" name="options" id="option28" style="position: fixed;opacity: 0;pointer-events: none;">mpc
                                                            </div>
                                                        </td>
                                                        <td style='font-size: 9px;'>
                                                            <div id="fld" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0px;">
                                                                <input type="radio" name="options" id="option29" style="position: fixed;opacity: 0;pointer-events: none;">fld
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style='font-size: 9px;'>
                                                            <div id="ano" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0;">
                                                                <input type="radio" name="options" id="option30" style="position: fixed;opacity: 0;pointer-events: none;">ano
                                                            </div>
                                                        </td>
                                                        <td style='font-size: 9px;'>
                                                            <div id="miss" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0px;">
                                                                <input type="radio" name="options" id="option31" style="position: fixed;opacity: 0;pointer-events: none;">mis
                                                            </div>
                                                        </td>
                                                        <td style='font-size: 9px;'>
                                                            <div id="gmc" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0px;">
                                                                <input type="radio" name="options" id="option32" style="position: fixed;opacity: 0;pointer-events: none;">gmc
                                                            </div>
                                                        </td>
                                                        <td style='font-size: 9px;'>
                                                            <div id="acr" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0px;">
                                                                <input type="radio" name="options" id="option33" style="position: fixed;opacity: 0;pointer-events: none;">acr
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style='font-size: 9px;'>
                                                            <div id="dia" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0px;">
                                                                <input type="radio" name="options" id="option34" style="position: fixed;opacity: 0;pointer-events: none;">dia
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                        <td style='font-size: 9px;'>
                                                            <div id="ipx" class="btn list-group-item" style="width: 100%;color: black;background-color: white;border-color: white;padding: 0px 0px;">
                                                                <input type="radio" name="options" id="option35" style="position: fixed;opacity: 0;pointer-events: none;">ipx
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class='col-sm-4'>
                                    <div id="controls2" class="panel panel-default" style="padding-bottom: 80px;">
                                        <div class="panel-body">
                                            <div class="btn-group list-group" data-toggle="buttons" style="margin-bottom: -9px;">
                                                <p style="margin-left: 17px;">
                                                    <div id="sambung" class="btn list-group-item" style="width: 54%;color: black;background-color: white;border-color: white;padding: 5px 0;margin-bottom:80px">
                                                        <input type="radio" name="options" id="option12" autocomplete="off" style="position: fixed;opacity: 0;pointer-events: none;">
                                                        <p style="margin-left: 14px;"><b>Full Metal Bridge</b></p><img src="<?php echo base_url('assets/img/icon/bridge1.jpg') ?>" style="width: 100px;position: inherit;right: -19px;">
                                                    </div>
                                                </p>
                                                <p style="margin-left: 17px;">
                                                    <div id="porcelain" class="btn list-group-item" style="width: 54%;color: black;background-color: white;border-color: white;padding: 5px 0;">
                                                        <input type="radio" name="options" id="option13" autocomplete="off" style="position: fixed;opacity: 0;pointer-events: none;">
                                                        <p style="margin-left: 14px;"><b>Porcelain Bridge</b></p><img src="<?php echo base_url('assets/img/icon/bridge2.jpg') ?>" style="width: 121px;position: inherit;right: -7px;">
                                                    </div>
                                                </p>

                                            </div>
                                        </div>
                                        <!-- <button data-toggle="tab" href="#keluhan" type="button" class="btn salmon stil" style="margin-top: 13%;" onclick="save_temp()">Selanjutnya</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        var base_url = '<?php echo base_url() ?>';
    </script>

    <script src="<?php echo base_url(); ?>assets/js/apps/rawat-tambah.js"></script>

    <script type="text/javascript">
        var link2 = "<?php echo base_url() ?>";
        var link = "<?php echo base_url() ?>";
        var id_pemeriksaan2 = "<?php echo @$idpemeriksaan ?>";
        var id_pasien2 = "<?php echo $id_pasien ?>";
        var id_pemeriksaan = "<?php echo @$idpemeriksaan ?>";
        var id_pasien = "<?php echo $id_pasien ?>";
        var date_awal = "<?php echo date("Y-m-d") ?>";
        var odontogramDataUtama2 = '<?php echo @$rawat['odontogram'];; ?>';
        var date = "<?php echo date('Y-m-d') ?>";
        $(document).ready(function() {

            app_rawat_tambah.init();

        });
    </script>
</form>