<?php

class HomeController 
{

    private $visitorModel;

    public function __construct(VisitorModel $visitorModel)
    {
        $this->visitorModel = $visitorModel;
    }

    public function index()
    {
        $isLoggedIn = $_SESSION['is_logged_in'] ?? false;
        $isRegistrated = $_SESSION['registrated'] ?? false; 

        if($isRegistrated) {
            $name = $_SESSION['name'];
            unset($_SESSION['registrated']);
            unset($_SESSION['name']);
        }

        if($isLoggedIn) {
        
            if(isset($_GET['clear_all'])) {

                $this->visitorModel->deleteAll();

                header("Location: index.php");
                exit;
            }

            if(isset($_GET['delete_id'])) {

                $idToDelete = (int)$_GET['delete_id'];
                $this->visitorModel->delete($idToDelete);

                header("Location: index.php");
                exit;
            }

            $logItems = $this->visitorModel->getAll();
            $message = "Вітаю, {$_SESSION['user_name']}";
        } 

     require __DIR__ . '/../views/home.php';

    }
}