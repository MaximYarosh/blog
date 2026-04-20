<?php
require_once __DIR__ . '/../config.php';

/**
 * connetion to DB
 * 
 */
class Database 
{
	private $pdo;
	
	public function __construct()
	{
		$host = DB_HOST;
		$db = DB_NAME;
		$user = DB_USER;
		$pass = DB_PASS;
		$charset = 'utf8mb4';

		$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

		$this->pdo = new PDO($dsn, $user, $pass, [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,]);
	}

	public function getPdo() 
	{
		return $this->pdo;
	}
}