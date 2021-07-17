<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{
    public function showCity(){
        $curl = curl_init();
        curl_setopt_array($curl,array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 8b273fb86a0e6550ac4b20b1104cfa48"),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $result = 'error';
            return 'error';
        }else {
            return $response;
        }
    }

    public function showProvince(){
        $curl = curl_init();
        curl_setopt_array($curl,array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 8b273fb86a0e6550ac4b20b1104cfa48"),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $result = 'error';
            return 'error';
        }else {
            return $response;
        }
    }
    public function showCity2($province){
        $curl = curl_init();
        curl_setopt_array($curl,array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 8b273fb86a0e6550ac4b20b1104cfa48"),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $result = 'error';
            return 'error';
        }else {
            return $response;
        }
    }

    public function showKodePos($kota){
        $curl = curl_init();
        curl_setopt_array($curl,array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/city?id=$kota",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 8b273fb86a0e6550ac4b20b1104cfa48"),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $result = 'error';
            return 'error';
        }else {
            return $response;
        }
    }
}

/* End of file Login_model.php */