<!-- STEPPER -->
<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    stepper = new Stepper(document.querySelector('#stepper'), {
        linear: true,
        animation: true
    })
})
</script>
<!-- DATEPICKER -->
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css"
    type="text/css" media="all">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
var tmp_lahir_pasien = "<?= $data_pasien['tempat_lahir'];?>";
var id_provinsi = "<?= $data_pasien['province_id'];?>";
var id_city = "<?= $data_pasien['city_id'];?>";
var id_provinsi_input = "<?= $data_pasien['province_id'];?>";

$(document).ready(function() {
    // FOR PASIEN
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
    // FOR ORANG DEKAT PASIEN
    $('#btn-stepper-od').addClass('d-none');
    $('#form-list-keluarga').addClass('d-none');
    $('#form-input-baru').addClass('d-none');


    // ALLOW ONLY NUMBERS INPUT
    $('#jns-id').on('change')
    setInputFilter(document.getElementById("no-id"),
        function(value) {
            return /^\d*\.?\d*$/.test(value);
        });
    setInputFilter(document.getElementById("no-hp"), function(value) {
        return /^\d*\d*$/.test(value);
    });
    setInputFilter(document.getElementById("no-id-od"),
        function(value) {
            return /^\d*\.?\d*$/.test(value);
        });
    setInputFilter(document.getElementById("no-hp-od"), function(value) {
        return /^\d*\d*$/.test(value);
    });

});

const tambahOrangDekat = () => {
    $('#od').addClass('d-none');
    $('#form-input-baru').removeClass('d-none');
    showBtnDO();
    loadCity('#tmp-lahir-od', 'ApiRajaOngkir/get_api_kota/', "");
    loadProvinsi('#provinsi-od', '');
    loadCityByProvince('#kota-od', $('#provinsi-od').val(), '');
    $('#provinsi-od').on('change', function() {
        if ($('#kota-od').val() != '') {
            loadCityByProvince('#kota-od', $('#provinsi-od').val(), id_city);
        }
        $('#pn-od').val($('#provinsi-od option:selected').text());
    });
    $('#kota-od').on('change', function() {
        $('#kn-od').val($('#kota-od option:selected').text());
    });
}

const pilihOrangDekat = () => {
    $('#od').addClass('d-none');
    $('#form-list-keluarga').removeClass('d-none');
    showBtnDO();
}

const tampilMenuOD = () => {
    $('#btn-stepper-od').addClass('d-none');
    $('#form-list-keluarga').addClass('d-none');
    $('#form-input-baru').addClass('d-none');
    $('#od').removeClass('d-none');
    $('input.i-od').val('');
    $('select.i-od option[value=""]').prop("selected", true);
    $('select#org_dekat option[value=""]').prop("selected", true);
}

const showBtnDO = () => {
    $('#btn-stepper-od').removeClass('d-none');
}

// datepicker
var dateToday = new Date();
var day = null;
var dates = $("#tgl_pemeriksaan").datepicker({
    defaultDate: "+1w",
    changeMonth: true,
    numberOfMonths: 1,
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "tgl_pemeriksaan" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat ||
                $.datepicker._defaults.dateFormat,
                selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
        var day = String(date).split(' ');
        const id = $(this).data('id');
        $.ajax({
            url: '<?= base_url('/Pemeriksaan/json_get_jam_praktik_dokter'); ?>/' + id + '/' + day[0],
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                if (data.length > 0) {
                    $('#waktu-pemeriksaan').empty();
                    $('#message').empty();
                    $.each(data, function(key, entry) {
                        $('#waktu-pemeriksaan').append(
                            $( // prettier-ignore
                                `<input type='hidden' name='day' value='${day[0]}'>
                                <label class="card-input">
                                    <input name="wkt-pemeriksaan" class="radio" type="radio" id="input-waktu" value="${entry.jam_mulai} - ${entry.jam_tutup}">
                                    <span class="plan-details">
                                        <span class="plan-type">${entry.jam_mulai} - ${entry.jam_tutup}</span>
                                        <span class="mt-2 font-weight-bold">${entry.ket}</span>
                                    </span>
                                </label>`
                            ));
                    });
                } else {
                    $('#waktu-pemeriksaan').empty();
                    $('#message').empty();
                    $('#message').append(
                        "<h4 class='text-danger'>Jadwal Praktik Dokter Tidak tersedia Di Tanggal Ini </h4>"
                    )
                }
            }
        });
    }
});

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
                        city = ' <option value = "' + n['type'] + " " + n['city_name'] +
                            '" selected > ' + n['type'] + " " + n['city_name'] + '</option>';
                    } else {
                        city = '<option value="' + n['type'] + " " + n['city_name'] + '">' + n['type'] +
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
                    province = '<option value="' + n['province_id'] + '" selected>' + n[
                        'province'] + '</option>';
                } else {
                    province = '<option value="' + n['province_id'] + '">' + n['province'] +
                        '</option>';
                }
                province = province + '';
                $(id).append(province);
                //$('#nama_provinsi').val(n['province']);
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
                    city = '<option value="' + n['city_id'] + '" selected>' + n['type'] + " " + n[
                        'city_name'] + '</option>';
                } else {
                    city = '<option value="' + n['city_id'] + '">' + n['type'] + " " + n[
                        'city_name'] + '</option>';
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


// FILTER FORM ONLY NUMBER INPUT
function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select",
        "contextmenu", "drop"
    ].forEach(function(event) {
        textbox.addEventListener(event, function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
        });
    });
}
</script>