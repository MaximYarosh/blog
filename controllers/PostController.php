<?php

class PostController 
{
    private $postModel;
    private $userModel;
    private $validator;

    public function __construct(PostModel $postModel, UserModel $userModel, Validator $validator) 
    {
        $this->postModel = $postModel;
        $this->userModel = $userModel;
        $this->validator = $validator;
    }

    public function showAll() 
    {
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
           
        }
        $isLoggedIn = $_SESSION['is_logged_in'] ?? false;
        $posts = $this->postModel->getAll();
        require __DIR__ . '/../views/posts.php';
    }

    public function showForm() 
    {
        $categories = $this->postModel->getCategories();
        $isLoggedIn = $_SESSION['is_logged_in'] ?? '';
        $name = $_SESSION['user_name'] ?? '';
        

        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $title = $this->validator->clearData($_POST['title']);
            $content = $this->validator->checkLenght($_POST['content']);
            $categoryId = $_POST['category'];
            $userId = $this->userModel->getByName($name)['user_id'];

            $this->postModel->add($title, $content, $categoryId, $userId);
            header('location: /blog/posts');
            exit;
        }

        require __DIR__ . '/../views/add.php';
    }

}