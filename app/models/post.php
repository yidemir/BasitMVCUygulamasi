<?php

/**
 * Örnek bir model dosyası
 * post tablosunu temsil edecek
 */
class post extends model
{
	/**
	 * Bütün gönderileri (postları) getirmesini sağlayalım
	 * $this->fetchAll'ı genişlettiğimiz (extend) model sınıfı aracılığıyla kullanıyoruz
	 * @return array
	 */
	public function getAll()
	{
		return $this->fetchAll('SELECT * FROM post');
	}
}
