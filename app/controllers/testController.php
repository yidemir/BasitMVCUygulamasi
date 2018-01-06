<?php

class testController extends controller
{
	public function indexAction()
	{
		echo '<meta charset="utf-8">';
		echo 'Burası test sayfası!';
	}

	public function isimGosterAction($isim)
	{
		echo '<meta charset="utf-8">';
		echo "Merhaba {$isim}! Hoş geldin!";
	}

	public function isimSoyisimGosterAction($isim, $soyisim)
	{
		echo '<meta charset="utf-8">';
		echo "Merhaba {$isim} {$soyisim}! Seni daha çok tanıyorum!";
	}

	public function jsonTestAction()
	{
		header('Content-Type: application/json');
		echo json_encode(['status' => 200, 'data' => ['deneme', 'foo', 'bar']]);
	}
}
