<?php
require_once 'models/Database.php';
require_once 'models/UserModel.php';
require_once 'models/Validator.php';
require_once 'models/VisitorModel.php';
require_once 'models/PostModel.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/PostController.php';

$db = new Database();
$visitorModel = new VisitorModel($db);
$userModel = new UserModel($db);
$validator = new Validator();
$postModel = new PostModel($db);
$homeController = new HomeController($visitorModel);
$authController = new AuthController($userModel, $visitorModel, $validator);
$postController = new PostController($postModel, $userModel, $validator);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/blog', '', $uri);

switch ($uri) {
    case '':
    case '/':
        $homeController->index();
        break;
    case '/log-in':
        $authController->logIn();
        break;
    case '/signed-up':
        $authController->signedUp();
        break;
    case '/logout':
        $authController->logout();
        break;
    case '/about':
        require 'views/about.php';
        break;
    case '/posts':
        $postController->showAll();
        break;
    case '/add':
        $postController->showForm();
        break;
    default:
        require 'views/404.php';
        break;
}