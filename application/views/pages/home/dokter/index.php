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
                        <input type="text" class="form-control" id="filter-kode-booking" placeholder="Kode Booking" oninput="search_press()" autocomplete="off">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="filter-jam" placeholder="Jam Pemeriksaan" oninput="search_press()" autocomplete="off">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="filter-nama" placeholder="Nama Pasien" oninput="search_press()" autocomplete="off">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="filter-tgl-lahir" placeholder="Tanggal Lahir" oninput="search_press()" autocomplete="off">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="filter-status" placeholder="Status Booking" oninput="search_press()" autocomplete="off">
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
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($daftarPasien as $d) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $d['jam_rencana_mulai'] . ' - ' . $d['jam_rencana_selesai']; ?></td>
                                    <td><?= $d['nama_depan'] . ' ' . $d['nama_belakang']; ?></td>
                                    <td><?= $d['tanggal_lahir']; ?></td>
                                    <td><?= $d['id_booking']; ?></td>
                                    <td><?= $d['id_rekam_medis']; ?></td>
                                    <td><?= $d['status'] == 1 ? '<span class="badge badge-primary">Terdaftar</span>' : '<span class="badge badge-warning">Belum Terdaftar</span>'; ?>
                                    </td>
                                    <td>
                                        <div class="table-actions text-center">
                                            <?php if($d['status'] == 1):?>
                                            <a href="<?= base_url('dokter/pemeriksaan/' . $d['id_pasien'] . '/' . $d['id_rekam_medis']) ?>">
                                                <button class="btn btn-danger">
                                                    Mulai Pemeriksaan
                                                </button>
                                            </a>
                                            <?php endif;?>
                                        </div>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>