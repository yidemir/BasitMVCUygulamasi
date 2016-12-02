<?php

class controller
{
	/**
	 * View dosyası çağırmamıza yarayan metod
	 * @param string $file dosyasını adını alır
	 * @param array $params parametreleri alır
	 * @return void view sınıfından render metodu döner
	 */
	public function render($file, array $params = [])
	{
		return view::render($file, $params);
	}

	/**
	 * Model dizininden model dosyası çağırır
	 * @param string $model model dosyası adı
	 * @return void model sınıfı
	 */
	public function model($model)
	{
		/**
		 * Eğer model dosyası varsa 
		 * çağırıp döndürelim
		 */
		if (file_exists($file = MDIR."/{$model}.php")) {
			require_once $file;
			/**
			 * Eğer model sınıfı tanımlıysa
			 * model sınıfını döndür
			 */
			if (class_exists($model)) {
				return new $model;
			/**
			 * Model sınıfı tanımlı değilse programı durdur
			 */
			} else {
				exit("Model dosyasında sınıf tanımlı değil: $model");
			}
		/**
		 * Eğer sınıf yoksa, hata döndürelim
		 */
		} else {
			exit("Model dosyası bulunamadı: {$model}.php");
		}
	}

	/**
	 * Yönlendirme yapar
	 * @param string $path yol
	 */
	public function redirect($path)
	{
		header("Location: {$path}");
	}

	/**
	 * URL oluşturur
	 * Bu sınıfı görünüm dosyası içinde rahat kullanmak için statik yaptık
	 * @return string URL
	 */
	public static function url()
	{
		return URL.'/?url='.implode('/', func_get_args());
	}
}
