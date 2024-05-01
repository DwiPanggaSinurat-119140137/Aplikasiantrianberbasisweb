<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin/dashboard', 'Admin::index');
$routes->get('/admin/antrian', 'Admin::antrian');
$routes->get('/admin/layanan', 'Admin::layanan');
$routes->get('/admin/rekapitulasi', 'Admin::rekapitulasi');
$routes->get('/pengguna/dashboard', 'Pengguna::index');
$routes->get('/pengguna/antrian', 'Pengguna::antrian');
$routes->get('/test/(:segment)', 'Pengguna::cekpengguna/$1');
$routes->get('/pengguna/antrian-form', 'Pengguna::pengguna');
$routes->post('/addantrian', 'Admin::addantrian');
$routes->get('/test1', 'Admin::test');
$routes->post('/addlayanan', 'Admin::addlayanan');
$routes->post('/editlayanan', 'Admin::editlayanan');
$routes->post('/deletelayanan', 'Admin::deletelayanan');
$routes->post('/status', 'Admin::status');
$routes->post('/maksimal', 'Admin::updatejumlah');
$routes->post('/batal', 'Admin::batal');
$routes->post('/selesai', 'Admin::selesai');
$routes->post('/pesan', 'Admin::pesan');
$routes->get('/admin/unduhrekapitulasi/(:segment)', 'Admin::unduhrekapitulasi/$1');
$routes->get('/admin/antrian/(:segment)', 'Admin::statusotomatis/$1');
$routes->get('/admin/antrianulang', 'Admin::pergantianhari');
