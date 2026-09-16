<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::index', ['priority' => 1]);

$routes->get('/login', 'Auth::index');
// PERBAIKAN DI SINI: legacyLogin diubah menjadi login sesuai nama method di controller
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/forbidden', 'Auth::forbidden');

$routes->get('/home', 'LotHistory::index');
$routes->get('/production', 'Production::index'); 

// Rute Production
$routes->get('/production/form','Production::formInputProduction');
$routes->post('/production', 'Production::createProduction'); 
$routes->get('/production/edit/form', 'Production::formEdit');
$routes->get('/production/edit/(:num)', 'Production::edit/$1');
$routes->get('/productions/history/(:num)', 'Production::productionByNumber/$1');
$routes->get('/production/data','Production::dataProduction');
$routes->delete('/production/(:num)','Production::deleteProduction/$1');

$routes->get('/startup', 'Startup::index'); 

// PERBAIKAN UTAMA DI SINI:
// Sebelumnya: $routes->get('/startup/form','Production::formInputStartup');
// Menjadi:
$routes->get('/startup/form','Startup::formInputStartup');

$routes->post('/startup', 'Startup::createStartup');
$routes->get('/startup/edit/form','Startup::formEdit');
$routes->get('/startup/edit/(:num)','Startup::edit/$1');
$routes->get('/startup/history/(:num)', 'Startup::startupByNumber/$1');
$routes->get('/startup/data','Startup::dataStartup');
$routes->delete('/startup/(:num)','Startup::deleteStartup/$1');

$routes->get('/foregoing', 'Foregoing::index'); 
$routes->get('/foregoing/form','Foregoing::formInputForegoing');
$routes->post('/foregoing', 'Foregoing::createForegoing'); 
$routes->get('/foregoing/edit/form','Foregoing::formEdit'); 
$routes->get('/foregoing/edit/(:num)','Foregoing::edit/$1'); 
$routes->get('/foregoing/history/(:num)', 'History::foregoingByNumber/$1'); 
$routes->get('/foregoing/data','History::dataForegoing'); 
$routes->delete('/foregoing/(:num)','Foregoing::deleteForegoing/$1');

$routes->get('/log-activity', 'LogActivity::index');
$routes->get('/input', 'Input::index'); 
$routes->get('/input/note-form/(:any)', 'Input::formStandard/$1');
$routes->get('/history', 'History::index');
$routes->get('/history/export/ff-d2-001', 'History::exportFF_D2_001');

// TAMBAHAN: Route untuk export Excel
// $routes->get('/history/exportExcel', 'History::exportExcel');
$routes->get('/approve', 'Approval::index');
$routes->get('/approve-form', 'Approval::formApproval');
$routes->post('/approve', 'Approval::updateApproval');
$routes->get('/approval/([a-zA-Z0-9]+)','Home::approval/$1');

$routes->get('/process/list', 'Process::listProcess');
$routes->get('/process', 'Process::index');
$routes->post('/process', 'Process::createProcess');
$routes->post('/process/update', 'Process::updateProcess');
$routes->delete('/process/([0-9]+)', 'Process::deleteProcess/$1');
$routes->get('/process/add', 'Process::addProcess');
$routes->get('/process/edit/(:num)', 'Process::updateProcessForm/$1');

$routes->get('/device', 'Device::index');
$routes->get('/device/list', 'Device::listDevice');
$routes->post('/device', 'Device::createDevice');
$routes->post('/device/update', 'Device::updateDevice');
$routes->delete('/device/([0-9]+)', 'Device::deleteDevice/$1');
$routes->get('/device/add', 'Device::createDeviceForm');
$routes->get('/device/edit/(:num)', 'Device::updateDeviceForm/$1');

$routes->match(['GET', 'POST'], 'home/ajaxAutofill', 'Home::ajaxAutofill');
$routes->get('/testing','Test::testEmp');
$routes->get('/test2/([a-zA-Z0-9]+)/([a-zA-Z0-9]+)','Test::testStartup/$1/$2');