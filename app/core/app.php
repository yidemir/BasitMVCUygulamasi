<?php

class app
{
	/**
	 * Sınıf içerisinde tutulacak değerler
	 * __construct metodu ile belirleyip
	 * run metodu ile kullanacağız
	 */
	public $controller, $action, $params;

	/**
	 * Controller ve Action'ı belirleyen başlatıcı metod
	 */
	public function __construct()
	{
		/**
		 * Eğer url sorgusu varsa, başındaki ve
		 * sonundaki / işaretlerini siliyoruz
		 * yoksa geçerli olarak default/index
		 */
		$url = isset($_GET['url']) && !empty($_GET['url']) ? 
			trim($_GET['url'], '/') : 'default/index';

		/**
		 * URL dizgesini / karakterleriyle bölüyoruz
		 * Böylelikle her bölüme ulaşabileceğiz
		 */
		$url = explode('/', $url);

		/**
		 * Controller ve Action'ı belirliyoruz
		 * Eğer $url[0] varsa onu $url[0].'Controller' yani $url[0]'ın default olduğunu varsayalım
		 * indexController olacaktır, eğer yoksa defaultController olarak ayarla dedik
		 * Aynı işlemi action için de yapıyoruz. Action $url[1]'de yer alıyor
		 */
		$this->controller = isset($url[0]) ? $url[0].'Controller' : 'defaultController';
		$this->action = isset($url[1]) ? $url[1].'Action' : 'indexAction';

		/**
		 * array_shift fonksiyonu, dizedeki ilk elemanı siler/kaldırır
		 */
		array_shift($url);
		array_shift($url);

		/**
		 * $url[0] ve $url[1]'i aldık, gerisi parametre. 
		 * Yani default/index/1/2/3'ün 1/2/3 olan yeri. 
		 */
		$this->params = $url;
	}

	/**
	 * Uygulamayı başlatır
	 */
	public function run()
	{
		// Eğer Controller dosyası varsa $file değişkenini yol olarak belirle
		if (file_exists($file = CDIR."/{$this->controller}.php")) {
			// Dosyayı sistemimize dahil edelim
			require_once $file;
			// Eğer sınıf yaratılmışsa/varsa controller'ımızı çağıralım
			if (class_exists($this->controller)) {
				// controller'ı çağıralım:
				$controller = new $this->controller;
				// Eğer metod varsa ve yaratılmışsa
				if (method_exists($controller, $this->action)) {
					// call_user_func ile controller ve metodu çağırıyoruz
					call_user_func_array([$controller, $this->action], $this->params);
				// Eğer method yoksa programdan çık
				} else {
					exit("Metod mevcut değil: {$this->action}");
				}
			// Sınıf yoksa ve yaratılmamışsa programdan çık
			} else {
				exit("Sınıf mevcut değil: $this->controller");
			}
		// Controller dosyası yoksa programdan çık
		} else {
			exit("Controller dosyası mevcut değil: {$this->controller}.php");
		}
	}
}
