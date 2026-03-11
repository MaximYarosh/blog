<?php 
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    session_start();

    require_once 'Database.php';
    require_once 'UserModel.php';
    require_once 'VisitorModel.php';
    require_once 'Validator.php';

    $db = new Database();
    $userModel = new UserModel($db);
    $visitorModel = new VisitorModel($db);
    $validator = new Validator();

    if($_SERVER['REQUEST_METHOD'] === "POST") {

        $name = $validator->clearData($_POST['name'] ?? '');
        $password = $_POST['password'] ?? '';
        $errors = $validator->check($name, $password);


        if(empty($errors)) {

            $user = $userModel->getByName($name);

                if($user && password_verify($password, $user['password'])) {
                
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_name'] = $name;

                $visitorModel->add($name);
                    
                header("Location: index.php");
                exit;

                } else {

                    $errors[] = "Не вірний логін або пароль.";
                }
        }
    }
?>
<!DOCTYPE html>
<html lang="ua">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome</title>
	<link rel="stylesheet" href="style/style.css">
</head>
 <body>
    
    <div class="container">
        <h1 class="title">Привітання</h1>
        <a class="btn" href="index.php">На головну</a>
        <?php if(!empty($errors)): ?>
        <div>
             <?php foreach($errors as $error):?>
            <p class="message error"><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif;?>
        <form class="form" action="signed-in.php" method="POST">
        <fieldset class="log-in">
            <legend>Вхід у систему</legend>
            <div class="wrapper">
                <label for="name" class="form-label">Логін: </label>
                <input class="input-field" id="name" type="text" name="name" value="<?= $name ?? '' ?>" placeholder="Введіть своє імя">
            </div>
            <div class="wrapper">
                <label for="pass" class="form-label">Пароль:</label>
                <input class="input-field" id="pass" type="password" name="password" placeholder="Введіть пароль">
            </div>
            <button type="submit" class="btn">Вхід</button>
        </fieldset>
        </form>
    </div>

</body>
</html>
