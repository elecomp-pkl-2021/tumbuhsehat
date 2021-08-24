<!-- DROPIFY -->
<script src="<?= base_url() ?>assets/plugins/dropify/dist/js/dropify.min.js"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify({
            messages: {
                default: 'Upload foto radiologi (click or drag and drop)',
            }
        });
        $('.dropify-lab').dropify({
            messages: {
                default: 'Upload foto laboratorium (click or drag and drop)',
            }
        });
    });
</script>

<!-- DOM -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    var tmp_lahir_pasien = "<?= $pasien['tempat_lahir']; ?>";
    var id_provinsi = "<?= $pasien['province_id']; ?>";
    var id_city = "<?= $pasien['city_id']; ?>";
    var id_provinsi_input = "<?= $pasien['province_id']; ?>";
    console.log(`id provinsi = ${id_provinsi}`);
    $(document).ready(function() {
        loadCity('#tmp-lahir', 'ApiRajaOngkir/get_api_kota/', tmp_lahir_pasien);
        loadProvinsi('#provinsi', id_provinsi);
        loadCityByProvince('#kota', id_provinsi_input, id_city);
        $('#provinsi').on('change', function() {
            if ($('#kota').val() != '') {
                loadCityByProvince('#kota', $('#provinsi').val(), id_city);
            }
            $('#pn').val($('#provinsi option:selected').text());
        });
        $('#kota').on('change', function() {
            $('#kn').val($('#kota option:selected').text());
        });

        // HITUNG HARGA PEMBAYARAN
        let harga;
        let diskon = null;
        let qty;
        let idLyanan;
        $('#tindakan').on('change', function() {
            harga = $('#tindakan').val();
            idLyanan = $('#tindakan option:selected').data('id')
            $('#id-layanan').val(idLyanan);
            hitungHargaBayar(harga, qty, diskon);
        });
        $('#jml-gigi').change(function() {
            qty = $('#jml-gigi').val();
            hitungHargaBayar(harga, qty, diskon);
        });
        $('#diskon').on('change', function() {
            diskon = $('#diskon').val();
            hitungHargaBayar(harga, qty, diskon);
        });
    });

    function setIdDiskon(data){
        $('#id-diskon').val = data;
    }

    function hitungHargaBayar(harga, qty, diskon) {
        $.ajax({
            url: '<?= base_url("Pembayaran/hitungTotalBayar") ?>' + '/' + harga + '/' + qty + '/' + diskon,
            dataType: 'json',
            method: 'post',
            success: function(response) {
                $('.satuan').text(response.harga_satuan_rp);
                $('.subtotal').text(response.total_harga_rp);
                $('input.subtotal').val(response.total_harga);
                $('.grandtotal').text(response.bayar_rp);
                $('.nilai-diskon').text(response.diskon);
                $('input.grandtotal').val(response.bayar);
                $('#id-diskon').val(response.id_diskon);
                $('.btn-hitung-bayar').prop('disabled', false);
                console.log($('#id-layanan').val());
            }
        });
    }

    // RAJA ONGKIR API LOAD ALAMAT
    function loadCity(id, url, tag) {
        $.ajax({
            url: '<?php echo base_url(); ?>' + url,
            dataType: 'json',
            success: function(response) {
                $(id).html('');
                city = '';
                city = ' <option> --Pilih Kota-- </option>';
                city = city + '';
                $(id).append(city);
                $.each(response['rajaongkir']['results'],
                    function(i, n) {
                        if (tag == n['type'] + " " + n['city_name']) {
                            city = ' <option value="' + n['type'] + " " + n['city_name'] +
                                '" selected> ' + n['type'] + " " + n['city_name'] + '</option>';
                        } else {
                            city = '<option value="' + n['type'] + " " + n['city_name'] + '">' + n[
                                    'type'] +
                                " " + n['city_name'] + '</option>';
                        }
                        city = city + '';
                        $(id).append(city);
                    });
            },
            error: function() {
                $(id).html('ERROR');
            }
        });
    }

    function loadProvinsi(id, id_provinsi) {
        $.ajax({
            url: '<?php echo base_url("ApiRajaOngkir/get_api_provinsi/"); ?>',
            dataType: 'json',
            success: function(response) {
                $(id).html('');
                province = '';
                province = '<option value=""> -- Pilih Provinsi-- </option>';
                province = province + '';
                $(id).append(province);

                $.each(response['rajaongkir']['results'], function(i, n) {
                    if (id_provinsi == n['province_id']) {
                        province = '<option value="' + n['province_id'] + '" selected>' + n['province'] + '</option>';
                        $('#pn').val(n['province']);
                    } else {
                        province = '<option value="' + n['province_id'] + '">' + n['province'] + '</option>';
                    }
                    province = province + '';
                    $(id).append(province);
                });
            },
            error: function() {
                alert('ERROR ! Check your internet connection');
                //$(id).html('ERROR');
            }
        });
    }

    function loadCityByProvince(id, id_provinsi_input, idcity) {
        $.ajax({
            url: '<?php echo base_url("ApiRajaOngkir/get_api_kota_byProvinsi/"); ?>' +
                '/' + id_provinsi_input,
            dataType: 'json',
            data: {
                province: id_provinsi_input
            },
            success: function(response) {
                $(id).html('');
                city = '';
                city = '<option> -- Pilih Kota-- </option>';
                city = city + '';
                $(id).append(city);
                $.each(response['rajaongkir']['results'], function(i, n) {
                    if (idcity == n['city_id']) {
                        city = '<option value="' + n['city_id'] + '" selected>' + n['type'] + " " + n['city_name'] + '</option>';
                        $('#kn').val(`${n['type']} ${n['city_name']}`);
                    } else {
                        city = '<option value="' + n['city_id'] + '">' + n['type'] + " " + n['city_name'] + '</option>';
                    }
                    city = city + '';
                    $(id).append(city);
                });
            },
            error: function() {
                $(id).html('ERROR');
            }
        });
    }

    function enableInput(idInputText) {
        $(idInputText).prop('disabled', false);
        $(idInputText).removeAttr('required');
    }

    function disableInput(idInputText) {
        $(idInputText).prop('disabled', true);
        $(idInputText).prop('required', true);
        $(idInputText).val('');
    }
</script>