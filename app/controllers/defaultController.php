<?php

class defaultController extends controller
{
	public function indexAction()
	{
		// Görünüm dosyasına gönderilecek değişkenler
		// Görünüm dosyasında $title değişkenini kullanabileceğiz:
		$data['title'] = 'Ana Sayfa';

		// app/views/index.php görünümünü gösterelim
		$this->render('index.php', $data); 
	}
}
