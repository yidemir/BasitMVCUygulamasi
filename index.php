<?php

define('ROOT_DIR', __DIR__); // Kök dizin
define('APP_DIR', ROOT_DIR.'/app'); // Uygulama dizini
define('CORE_DIR', APP_DIR.'/core'); // Çekirdek dizini
define('MDIR', APP_DIR.'/models'); // Model dizini
define('VDIR', APP_DIR.'/views'); // View dizini
define('CDIR', APP_DIR.'/controllers'); // Controller dizini
define('URL', 'http://localhost'); // Sistemin çalışacağı URL

// Veritabanı ayarlamalarını yapıyoruz
// Eğer ki veritabanı işlemi yapmayacaksak ayarlamak şart değil
define('DB_DSN', 'mysql:host=localhost;dbname=blog;charset=utf8');
define('DB_USR', 'root');
define('DB_PWD', 'root');

// Çekirdek sınıflarımızı dahil ediyoruz
// Bu uygulamanın çalışması için mecburi
require CORE_DIR.'/app.php';
require CORE_DIR.'/model.php';
require CORE_DIR.'/view.php';
require CORE_DIR.'/controller.php';

// Rota verilerini oluşturuyoruz
$routes = [
	'anasayfa' => 'defaultController:indexAction',
	'testet' => 'testController:indexAction',
	'isim/:param' => 'testController:isimGosterAction',
	'isim/:param/:param' => 'testController:isimSoyisimGosterAction',
	'test/json' => 'testController:jsonTestAction'
];

// Uygulamamızı oluşturuyoruz
// Rota verilerini sınıfa veriyoruz
$app = new app($routes);

// ve oluşturduğumuz uygulamayı çalıştırıyoruz
$app->run();
