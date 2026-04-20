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
        <a class="btn" href="/blog/">На головну</a>
        <?php if(!empty($errors)): ?>
        <div>
             <?php foreach($errors as $error):?>
            <p class="message error"><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif;?>
        <form class="form" action="/blog/log-in" method="POST">
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
