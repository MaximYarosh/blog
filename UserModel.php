<?php
/*
*create and get user
*/
class UserModel
{
	private $pdo;

	public function __construct(Database $db) 
	{
		$this->pdo = $db->getPdo();
	}

	public function getByName($username) 
	{
		$sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(['username' => $username]);
		return $stmt->fetch();
	}

	public function create($username, $password)
	{
		$sql = "INSERT INTO users (username, password) VALUES(:u, :p)";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(['u' => $username, 'p' => $password]);
	}
}
