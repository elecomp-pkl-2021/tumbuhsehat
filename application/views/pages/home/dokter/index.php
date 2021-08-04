<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header justify-content-between bg-light">
                <h3>Daftar Jadwal Pemeriksaan Pasien Anda</h3>
                <div class="row align-items-center">
                    <div class="col-2 text-right">
                        <span class="font-weight-bold">Filter Data :</span>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="filter-kode-booking" placeholder="Kode Booking"
                            oninput="search_press()" autocomplete="off">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="filter-jam" placeholder="Jam Pemeriksaan"
                            oninput="search_press()" autocomplete="off">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="filter-nama" placeholder="Nama Pasien"
                            oninput="search_press()" autocomplete="off">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="filter-tgl-lahir" placeholder="Tanggal Lahir"
                            oninput="search_press()" autocomplete="off">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="filter-status" placeholder="Status Booking"
                            oninput="search_press()" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="mx-5">
                    <table class="table" id="data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jam Periksa</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>ID Booking</th>
                                <th>No. Rekam Medis</th>
                                <th>Status</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <<<<<<< HEAD <tbody>
                            <?php $no = 1;?>
                            <?php foreach($daftarPasien as $d):?>
                            <tr>
                                <td><?= $no;?></td>
                                <td><?= $d['jam_rencana_mulai'].' - '.$d['jam_rencana_selesai'];?></td>
                                <td><?= $d['nama_depan'].' '.$d['nama_belakang'];?></td>
                                <td><?= $d['tanggal_lahir'];?></td>
                                <td><?= $d['id_rekam_medis'];?></td>
                                <td><?= $d['status'] == 1 ? '<span class="badge badge-primary"> Sudah Terdaftar</span>' : '<span class="badge badge-secondary"> Belum Terdaftar</span>';?>
                                </td>
                                <td>
                                    <div class="table-actions text-center">
                                        <a href="<?= base_url('dokter/pemeriksaan')?>">
                                            <button class="btn btn-danger">
                                                Mulai Pemeriksaan
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php $no++;?>
                            <?php endforeach;?>
                            =======
                            <tbody id="table-result">
                                >>>>>>> 532fd060347fe60409b40f94ac21a23888139621
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#data-table').DataTable({
        searching: false
    });
});
</script>