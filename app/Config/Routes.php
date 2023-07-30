<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->setAutoRoute("true");
// siswa
// $routes->get('siswa', 'siswa::index');
// $routes->get('/siswa/input_siswa', 'siswa::input_siswa');
// $routes->get('/siswa/hapus(:num)', 'siswa::hapus/$1');
// $routes->get('/siswa/edit/(:segment)', 'siswa::edit/$1');
// //kelas
// $routes->get('/kelas', 'kelas::index');
// $routes->get('/kelas/input_kelas', 'kelas::input_kelas');
// $routes->get('/kelas/edit/(:segment)', 'kelas::edit/$1');
// $routes->get('/kelas/hapus/(:num)', 'kelas::edit/$1');
// //input tagihan
// $routes->get('/bebas_bayar', 'bebas_bayar::index');
// $routes->get('/bebas_bayar/input/(:segmenet)', 'bebas_bayar::input/$1');
// //spp

// //spp bebas
// $routes->get('/bebas', 'bebas::index');
// $routes->get('/bebas/input_bebas', 'bebas::input_bebas');
// $routes->get('/bebas:edit/(:segment)', '/bebas::edit/$1');
// $routes->get('/bebas/hapus/(:num)', 'bebas::hapus/$1');
// // bayar spp
// $routes->get('/bayar', 'bayar::index');
 $routes->get('/tunggakan/cari', 'tunggakan::cari');
// $routes->get('/tunggakan/bayar', 'tunggakan::bayar');

// // bayar bebas
// $routes->get('/bebas_bayar/data_bayar', 'bebas_bayar::data_bayar');
// $routes->get('/bebas_bayar:bayar/(:segment)', 'bebas_bayar::bayar/$1');
// $routes->get('/bebas_bayar:cetak_kuitansi/(:segment)', 'bebas_bayar::cetak_kuitansi/$1');
// //laporan
// $routes->get('/tunggakan', 'tunggakan::index');
// $routes->get('/laporan/spp', 'laporan::spp');
// $routes->get('/laporan/laporan_siswa', 'laporan::laporan_siswa');



//histori
$routes->get('/siswa/histori', 'siswa::histori');
$routes->get('/siswa/histori_bayar/(:any)', 'siswa::histori_bayar/(:any)');



$routes->get('/bayar/save/(:segment)', 'bayar::save/$1');
$routes->get('/tunggakan/bayar_spp/(:segment)', 'tunggakan::bayar_spp/$1');
$routes->get('/siswa/input_tunggakan/(:segment)', 'siswa::input_tunggakan/$1');
$routes->get('/', 'input_tunggakan::index');
$routes->get('input_tunggakan/search', 'input_tunggakan::search');
$routes->post('chart-transaksi', 'Home::showChartTransaksi');
$routes->post('chart-siswa', 'Home::showJumlahTransaksi');
// $routes->post('Home', 'Home::showChartTotal');
// laporan 
$routes->get('tunggakan', 'tunggakan::filter');
$routes->get('tunggakan/export_pdf/(:any)/(:any)', 'tunggakan::export_pdf/$1/$2');

// API
$routes->resource('/Api/input_tunggakan', ['controller' => 'Api\input_tunggakan']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
