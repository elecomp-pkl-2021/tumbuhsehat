<?php
class Booking_model extends CI_Model
{
    public function getDataBooking($idBooking){
        $data = $this->db
                    ->select('booking.id_booking') 
                    ->select('pasien.nama_depan') 
                    ->select('pasien.nama_belakang') 
                    ->select('dokter.nama_dokter')
                    ->select('cabang.nama_cabang')
                    ->select('cabang.alamat')
                    ->select('rencana.tanggal_rencana')
                    ->select('rencana.jam_rencana_mulai')
                    ->select('rencana.jam_rencana_selesai')
                    ->from('booking')
                    ->join('pasien', 'booking.id_pasien = pasien.id_pasien')
                    ->join('dokter', 'booking.id_dokter = dokter.id_dokter')
                    ->join('cabang', 'booking.id_cabang = cabang.id_cabang')
                    ->join('rencana', 'booking.id_booking = rencana.id_booking')
                    ->where(['booking.id_booking' => $idBooking])
                    ->get()->row_array();
        return $data;
    }
}