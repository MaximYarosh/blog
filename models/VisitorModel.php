<?php
/**
 * visitors log
 */
class VisitorModel 
{
	private $pdo;
	
	public function __construct(Database $db)
	{
		$this->pdo = $db->getPdo();
	}

	public function getAll(){
		$sql = "SELECT * FROM visitors ORDER BY id DESC";
		$stmt = $this->pdo->query($sql);
		return $stmt->fetchAll();
	}

	public function add($username) 
	{
		$sql = "INSERT INTO visitors (username) VALUES(:name)";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(['name' => $username]);
	}

	public function delete($id) {
		$sql = "DELETE FROM visitors WHERE id = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(['id' => $id]);
	}

	public function deleteAll()
	{
		$sql = "TRUNCATE visitors";
		$stmt = $this->pdo->query($sql);
	}
}