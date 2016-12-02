<?php

class model
{
	/**
	 * Veritabanını nesnesini tutar
	 * @var void
	 */
	public $db;

	/**
	 * Veritabanı nesnesini oluşturur
	 */
	public function __construct()
	{
		$this->db = new PDO(DB_DSN, DB_USR, DB_PWD);
	}

	/**
	 * Tek satırlık veri döndüren sorgu çalıştırır
	 * @param string $query SQL sorgusu
	 * @param array $params varsa parametreler
	 * @return array
	 */
	public function fetch($query, array $params = [])
	{
		$sth = $this->db->prepare($query);
		$sth->execute($params);
		return $sth->fetch();
	}

	/**
	 * Birden fazla satır döndüren sorgu çalıştırır
	 * @param string $query SQL sorgusu
	 * @param array $params varsa parametreler
	 * @return array
	 */
	public function fetchAll($query, array $params = [])
	{
		$sth = $this->db->prepare($query);
		$sth->execute($params);
		return $sth->fetchAll();
	}

	/**
	 * Sorgu çalıştırır
	 * @param string $query SQL sorgusu
	 * @param array $params varsa parametreler
	 * @return array
	 */
	public function query($query, array $params = [])
	{
		$sth = $this->db->prepare($query);
		return $sth->execute($params);
	}
}
