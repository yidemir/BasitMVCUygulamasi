<?php

class defaultController extends controller
{
	/**
	 * ?url=default/index için aksiyon yazalım
	 */
	public function indexAction()
	{
		// Görünüm dosyasına gönderilecek değişkenler
		// Görünüm dosyasında $title değişkenini kullanabileceğiz:
		$data['title'] = 'Ana Sayfa';
		$data['text'] = 'Ana sayfadan merhaba!';

		// app/views/index.php görünümünü gösterelim
		$this->render('index', $data);
	}

	/**
	 * ?url=default/test için aksiyon yazalım
	 */
	public function testAction()
	{
		$data['title'] = 'Test Sayfası';
		$data['text'] = 'Şu an test sayfasındasınız';

		return $this->render('index', $data);
	}
}
