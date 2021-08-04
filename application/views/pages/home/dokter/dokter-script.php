<script>
var base_url = "<?= base_url(); ?>";
$(document).ready(function() {
    // $('#data-table').DataTable({
    //     searching: false
    // });

    let result = "";
    let no = 0;
    $.ajax({
        url: base_url + 'dokter/getDaftarPasienByIdDokter',
        type: 'GET',
        dataType: "JSON",
        success: function(data) {
            $.each(data, function(index, element) {
                no++;
                result += `<tr>
                                    <td>${no}</td>
                                    <td>${element.jam_rencana_mulai} - ${element.jam_rencana_selesai}</td>
                                    <td>${element.nama_depan} ${element.nama_belakang}</td>
                                    <td>${element.tanggal_lahir}</td>
                                    <td>${element.id_booking}</td>
                                    <td>${element.id_rekam_medis}</td>
                                    <td>`;
                if (element.status == 1) {
                    result += `<span class="badge badge-primary"> Sudah Terdaftar</span>`;
                } else {
                    result += `<span class="badge badge-secondary"> Belum Terdaftar</span>`;
                }
                result += `</td><td>
                                        <div class="table-actions text-center">
                                            <a href="${base_url}dokter/pemeriksaan/${element.id_pasien}/${element.id_rekam_medis}">
                                                <button class="btn btn-danger">
                                                    Mulai Pemeriksaan
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                    `;
            });
            $('#table-result').html(result);
        }
    });
});

var kode_booking = $('#filter-kode-booking');
var filter_jam = $('#filter-jam');
var filter_nama = $('#filter-nama');
var filter_tgl_lahir = $('#filter-tgl-lahir');
var filter_status = $('#filter-status');

function search_press() {
    // console.log(kode_booking.val());
    let result = "";
    let no = 0;
    $.ajax({
        url: base_url + 'dokter/filterDataJadwalPemeriksaanPasien',
        type: 'POST',
        data: {
            kode_booking: kode_booking.val(),
            filter_jam: filter_jam.val(),
            filter_nama: filter_nama.val(),
            filter_tgl_lahir: filter_tgl_lahir.val(),
            filter_status: filter_status.val(),
        },
        dataType: "JSON",
        success: function(data) {
            // console.log(data);
            $.each(data, function(index, element) {
                no++;
                result += `<tr>
                                    <td>${no}</td>
                                    <td>${element.jam_rencana_mulai} - ${element.jam_rencana_selesai}</td>
                                    <td>${element.nama_depan} ${element.nama_belakang}</td>
                                    <td>${element.tanggal_lahir}</td>
                                    <td>${element.id_booking}</td>
                                    <td>${element.id_rekam_medis}</td>
                                    <td>`;
                if (element.status == 1) {
                    result += `<span class="badge badge-primary"> Sudah Terdaftar</span>`;
                } else {
                    result += `<span class="badge badge-secondary"> Belum Terdaftar</span>`;
                }
                result += `</td><td>
                                        <div class="table-actions text-center">
                                            <a href="${base_url}dokter/pemeriksaan">
                                                <button class="btn btn-danger">
                                                    Mulai Pemeriksaan
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                    `;
            });
            $('#table-result').html(result);
        }
    });
}
</script>