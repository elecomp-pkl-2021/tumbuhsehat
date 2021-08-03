<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3>Rencana / Jadwal Pemeriksaan Berhasil Di Buat !</h3>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h6><b>Kode Booking</b></h6>
                        <h2><?= $booking['id_booking'];?></h2>
                        <span><?= $booking['nama_depan']. ' '. $booking['nama_belakang'];?> | </span>
                        <span><?= $booking['nama_dokter'];?> | </span>
                        <span><?= $booking['nama_cabang'].' - '. $booking['alamat'];?> | </span>
                        <span><?= $booking['tanggal_rencana'];?> | </span>
                        <span><?= $booking['jam_rencana_mulai'].' - '.$booking['jam_rencana_selesai'];?></span>
                        <br>
                        <br>
                        <p>Informasikan kode booking kepada Pasien Anda. Selanjutnya, kode booking ini diperlukan saat
                            pasien Anda melakukan registrasi di jadwal pemeriksaan yang telah ditentukan.</p>
                        <a href="<?= base_url('/home');?>" class="btn btn-primary">Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>