<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['pemeriksaan/buat-janji'] = 'Pemeriksaan/buat_jadwal_view';
$route['home/dokter'] = 'Dokter/index';

//daftar dokter
$route['daftar-dokter'] = "dokter_daftar";

$route['daftar-dokter/tambah'] = "dokter_daftar/tambah";

$route['daftar-dokter/detail/(:num)/(:num)'] = function ($id_dokter, $id_user)
{
        return 'dokter_daftar/detail' . '/' . $id_dokter .'/'.$id_user;
};

$route['daftar-dokter/edit/(:num)/(:num)'] = function ($id_dokter, $id_user)
{
        return 'dokter_daftar/edit' . '/' . $id_dokter .'/'.$id_user;
};

$route['daftar-dokter/hapus/(:num)/(:num)'] = function ($id_dokter, $id_user)
{
        return 'dokter_daftar/hapus' . '/' . $id_dokter .'/'.$id_user;
};
//end of daftar dokter

//cabang dokter
$route['cabang-dokter'] = "dokter_cabang";

$route['cabang-dokter/tambah'] = "dokter_cabang/tambah";

$route['cabang-dokter/edit/(:num)'] = function ($id_cbdokter)
{
        return 'dokter_cabang/edit' . '/' . $id_cbdokter;
};

$route['cabang-dokter/hapus/(:num)'] = function ($id_cbdokter)
{
        return 'dokter_cabang/hapus' . '/' . $id_cbdokter;
};
//end of cabang dokter

//jadwal dokter
$route['jadwal-dokter'] = "dokter_jadwal";

$route['jadwal-dokter/tambah'] = "dokter_jadwal/tambah";

$route['jadwal-dokter/edit/(:num)'] = function ($id_cbdokter)
{
        return 'dokter_jadwal/edit' . '/' . $id_cbdokter;
};

$route['jadwal-dokter/hapus/(:num)'] = function ($id_cbdokter)
{
        return 'dokter_jadwal/hapus' . '/' . $id_cbdokter;
};
//end of jadwal dokter

//metode-pembayaran super admin
$route['metode-pembayaran'] = 'Pembayaran_metode';

$route['metode-pembayaran/tambah'] = 'Pembayaran_metode/tambah';

$route['metode-pembayaran/edit/(:num)'] = function ($id)
{
        return 'Pembayaran_metode/edit' . '/' . $id;
};

$route['metode-pembayaran/hapus/(:num)'] = function ($id)
{
        return 'Pembayaran_metode/hapus' . '/' . $id;
};

// end of metode-pembayaran superadmin


//kategori asuransi superadmin
$route['kategori-asuransi'] = 'Asuransi_kategori';

$route['kategori-asuransi/tambah'] = 'Asuransi_kategori/tambah';

$route['kategori-asuransi/edit/(:num)'] = function ($id)
{
        return 'Asuransi_kategori/edit' . '/' . $id;
};

$route['kategori-asuransi/hapus/(:num)'] = function ($id)
{
        return 'Asuransi_kategori/hapus' . '/' . $id;
};

//kategori asuransi superadmin
$route['provider-asuransi'] = 'Asuransi_provider';

$route['provider-asuransi/tambah'] = 'Asuransi_provider/tambah';

$route['provider-asuransi/edit/(:num)'] = function ($id)
{
        return 'Asuransi_provider/edit' . '/' . $id;
};

$route['provider-asuransi/hapus/(:num)'] = function ($id)
{
        return 'Asuransi_provider/hapus' . '/' . $id;
};
