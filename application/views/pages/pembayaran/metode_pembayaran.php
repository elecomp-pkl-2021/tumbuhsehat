<div class="row">
    <div class="col-lg-12">
        <div class="card-body">
            <div class="panel-body">
                <div class="col-md-12">
                    <font style="font-weight: bold; font-size: 15px;">Pembayaran <i class="fa fa-chevron-right" aria-hidden="true"></i> Proses Pembayaran</font><br><br>
                    <div class="box-rencana">
                        <h3 class="mb-20 weight-500"><b>Rencana Pemeriksaan
                                <?php foreach ($bayar->result() as $result) : ?>
                                    <?php echo $result->nama_depan; ?> <?php echo $result->nama_belakang; ?> </b>
                        <?php endforeach; ?>
                        </h3><br>
                        <p><?php echo $result->nama_cabang; ?> &nbsp; | &nbsp; <?php echo $result->nama_dokter; ?></p>
                    </div>
                </div>
                <div class="card"><br>
                    <div class="tab-content col-md-12">
                        <?php foreach ($bayar->result() as $result) : ?>
                            <div id="metode_pembayaran">
                                <form action="<?php echo base_url('owner/update_bayar/'); ?>" method="post" enctype="multipart/form-data" id="form1">
                                    <input type="hidden" name="id_booking" value="<?php echo $result->id_booking; ?>">

                                    <div class="col-md-12">
                                        <h5 class="mb-20 weight-500" style="font-weight: bold">Metode pembayaran</h5><br>
                                    </div>
                                    <div class="col-lg-2">
                                        Jenis Pembayaran
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group box6">
                                            <select class="form-control" name="jenis_pembayaran" id="jenis_pembayaran" required>
                                                <option value="<?php echo $result->id_metode; ?>" id="<?php echo $result->id_metode; ?>" style="text-align:right"><?php echo $result->nama_metode; ?></option>
                                                <?php foreach ($metodebayar as $metode) { ?>
                                                    <option value="<?php echo $metode['id_metode']; ?>" id="<?php echo $metode['id_metode']; ?>" style="text-align:right"><?php echo $metode['nama_metode']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="asuransiku">
                                        <div class="col-md-12">
                                            <h5 style="font-weight: bold">Detail Asuransi</h5><br>
                                        </div>
                                        <div class="col-lg-2">
                                            Provider Asuransi
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group box6">
                                                <select class="form-control" name="provider" id="provider">
                                                    <option value="<?php echo $result->provider; ?>" disabled selected style="display: none;"><?php echo $result->provider; ?></option>
                                                    <option value="Provider Allianz" id="Provider Allianz">Provider Allianz</option>
                                                    <option value="Provider Astra-Admedika" id="Provider Astra-Admedika">Provider Astra-Admedika</option>
                                                    <option value="Provider Prudential" id="Provider Prudential">Provider Prudential</option>
                                                    <option value="Provider MAG" id="Provider MAG">Provider MAG</option>
                                                    <option value="Provider Cigna" id="Provider Cigna">Provider Cigna</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            Kategori Asuransi
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group box6">
                                                <select class="form-control" name="kasuransi" id="kasuransi">
                                                    <option value="<?php echo $result->kategori_asuransi; ?>" disabled selected style="display: none;"><?php echo $result->kategori_asuransi; ?></option>
                                                    <option value="Asuransi Jiwa" id="Asuransi Jiwa">Asuransi Jiwa</option>
                                                    <option value="Asuransi Kesehatan" id="Asuransi Kesehatan">Asuransi Kesehatan</option>
                                                    <option value="Asuransi Bisnis" id="Asuransi Bisnis">Asuransi Bisnis</option>
                                                    <option value="Asuransi Umum" id="Asuransi Umum">Asuransi Umum</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            Nomor Kartu Asuransi
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" rows="3" name="no_asuransi" id="no_asuransi" value="<?php echo $result->nomor_asuransi; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-2">
                                                Upload Foto Kartu Asuransi
                                            </div>
                                            <div class="col-lg-10">
                                                <img src="<?php echo base_url('images/'); ?>asuransi/<?php echo $result->foto_asuransi ?>" width="300px">
                                                <div class="form-group">
                                                    <input type="file" class="form-control" rows="3" name="foto_asuransi" id="foto_asuransi">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        <?php endforeach; ?>
                        <div id="proses_bayar" style="margin-left: -20px">
                            <div class="col-md-12">
                                <div class="col-lg-4">
                                    <b>Diagnosa Dokter</b>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <textarea name="diagnosa" class="form-control" style="resize:none;width:600px;height:100px;" rows="10" required readonly><?php echo $result->diagnosis; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <table id="all_data_json" class="table">
                                        <thead>
                                            <tr>
                                                <th data-sortable="true">Elemen Gigi</th>
                                                <th data-sortable="true">Tindakan</th>
                                                <th data-sortable="true">Jumlah</th>
                                                <th data-sortable="true">Harga Satuan</th>
                                                <th data-sortable="true">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $subtotalnya = 0;
                                            foreach ($layanan->result() as $key) : ?>
                                                <tr>
                                                    <td>46</td>

                                                    <td><?php echo $key->layanan ?></td>
                                                    <td><?php echo $key->jumlah ?>X</td>
                                                    <td>Rp. <?php echo $key->harga ?></td>
                                                    <td>Rp. <?= $key->subtotal ?></td>

                                                </tr>
                                            <?php
                                                $subtotalnya += $key->subtotal;
                                            endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-10" style="background: #ccc; color: #000; padding: 7px 0 6px 10px;">
                                    <b>TOTAL : <p id="txttot" style="float: right; color: #000; margin: 0 20px 0 0;">Rp. <?= $subtotalnya ?></p></b>
                                </div>
                                <div class="col-lg-12"></div>
                                <div class="col-lg-2" style="margin: 30px 0 10px 0;">
                                    Discount / Coupon :
                                </div>
                                <div class="col-lg-4" style="margin: 20px 0 10px 0;">
                                    <div class="form-group">
                                        <select class="form-control" name="id_diskon" id="id_diskon">
                                            <?php foreach ($diskonnya as $d) {
                                            ?>
                                                <option value="" disabled selected><?= $d['nama_diskon'] ?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12"></div>
                                <div class="col-lg-10" style="background:#ccc; color: #000; padding: 7px 0 6px 10px;">
                                    <b style="padding: 5px 0 5px 0;"> GRAND TOTAL :
                                        <p style="float: right; color: #000; margin-bottom: 0;">Rp. <input type="text" value="<?= $total->grandtotal ?>" name="grandtotal" id="grandtotal" style="float:right; color:#000; margin-left: 3px;  width: 65px; border: 0px; background: #ccc;"></p>
                                    </b>
                                </div>
                                <!-- <input type="hidden" name="id_rekam_medis" value="<?= $result->id_rekam_medis ?>">-->


                                <div class="col-lg-12">
                                    <button data-toggle="tab" href="#metode_pembayaran" type="button" class="btn btn-primary" style="float: left;margin-top: 3%; margin-bottom:3%;  color:white">Kembali</button>
                                    <button type="submit" href="#proses_bayar" class="btn btn-primary" style="float: right;margin-top: 3%;  margin-bottom:3%; color:white">Proses</button>
                                </div>


                            </div>

                        </div>

                        <!-- sini -->
                    </div>

                </div>
                </form>


            </div>

        </div>
    </div>
    <!-- /.col-->
</div><!-- /.row -->

<script type="text/javascript">
    window.onload = function() {
        var tot = parseInt(document.getElementById('subtotal').value);
        var x = parseInt(document.getElementById('cmb').value);
        var disk = parseInt(document.getElementById('txt').value);
        var hitung = (disk * tot) / 100;
        var jumlah = tot - hitung;

        // document.getElementById('grand').value = jumlah;
        if (!isNaN(jumlah)) {
            document.getElementById("hasil").innerHTML = jumlah;
        }
    }
</script>

<script type="text/javascript">
    window.onload = function() {
        var hasil;
        hasil = 1 + 3 + 5 + 7 + 9;
        document.getElementById("tempat_hasil").innerHTML = hasil;
    }
</script>
<script>
    $(document).ready(function() {
        document.getElementById('asuransiku').hidden = true;
        $(function() {
            $('#jenis_pembayaran').trigger('change'); //This event will fire the change event. 
            $('#jenis_pembayaran').change(function() {
                var data = $(this).val();
                if (data == 3) {
                    document.getElementById('asuransiku').hidden = false;
                } else {
                    document.getElementById('asuransiku').hidden = true;
                }
            });
        });

        // grandtotal();
        $('#id_diskon').change(function() {
            grandtotal();
        });
    });

    function grandtotal() {
        var diskon = $('#id_diskon').val();
        $.ajax({
            url: "<?= base_url('owner/grandtotal/' . $result->id_rekam_medis) ?>",
            data: {
                diskon: diskon
            },
            success: function(data) {
                // console.log(data);
                $('#grandtotal').val(data);
            }
        });
    }
</script>