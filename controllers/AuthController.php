<?php

class AuthController 
{
    private $userModel;
    private $visitorModel;
    private $validator;

    public function __construct(UserModel $userModel, VisitorModel $visitorModel, Validator $validator)
    {
        $this->userModel = $userModel;
        $this->visitorModel = $visitorModel;
        $this->validator = $validator;
    }

    public function logIn()
    {
         if($_SERVER['REQUEST_METHOD'] === "POST") {

            $name = $this->validator->clearData($_POST['name'] ?? '');
            $password = $_POST['password'] ?? '';
            $errors = $this->validator->check($name, $password);


            if(empty($errors)) {

                $user = $this->userModel->getByName($name);

                    if($user && password_verify($password, $user['password'])) {
                    
                    $_SESSION['is_logged_in'] = true;
                    $_SESSION['user_name'] = $name;

                    $this->visitorModel->add($name);
                        
                    header("Location: /blog/");
                    exit;

                    } else {

                        $errors[] = "Не вірний логін або пароль.";
                    }
            }
        }

        require __DIR__ . '/../views/log-in.php';
    }

    public function signedUp() 
    {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $this->validator->clearData($_POST['name'] ?? '');
            $password = $_POST['password'] ?? '';
            $password_confirm = $_POST['password_confirm'] ?? '';

            if(empty($password_confirm)) {
                $errors[] = "Заповніть всі поля!";
            } else {
               $errors = $this->validator->check($name, $password, $password_confirm);
            }

            if(empty($errors)) {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $this->userModel->create($name, $password_hash);

                $_SESSION["registrated"] = true;
                $_SESSION["name"] = $name;
                header('Location: /blog/');
                exit;
            }
        }

        require __DIR__ . '/../views/signed-up.php';
    }

    public function logout()
    {
        session_destroy();
        header('Location: /blog');
        exit;
    }
}