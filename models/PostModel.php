<?php

class PostModel 
{
    private $pdo;

    public function __construct(Database $db)
    {
        $this->pdo = $db->getPdo();
    }

    public function getAll() 
    {
        $sql = 'SELECT * FROM posts ORDER BY created_at DESC';
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function getById($id) 
    {
        $sql = 'SELECT * FROM posts WHERE id = :id LIMIT 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function getCategories() 
    {
        $sql = 'SELECT * FROM categories';
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function add($title, $content, $categoryId, $userId)
    {
        $sql = 'INSERT INTO posts (title, content, category_id, user_id) VALUES (:title, :content, :categoryId, :userId)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['title' => $title, 'content' => $content, 'categoryId' => $categoryId, 'userId' => $userId]);
    }
}