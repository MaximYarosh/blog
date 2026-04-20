<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

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
		<h1 class="title">Реєстрація</h1>
		<a class="btn" href="/blog/">На головну</a>
		<?php if(!empty($errors)): ?>
		<div>
			<?php foreach($errors as $error): ?>
				<p class="message error"><?= $error ?></p>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
		<form class="form" action="/blog/signed-up" method="POST">
			<fieldset class="fieldset">
				<legend>Регестрація</legend>
				<div class="wrapper">
					<label for="name" class="form-label">Логін: </label>
					<input class="input-field" id="name" type="text" value="<?= $name ?? '' ?>" name="name" placeholder="Введіть своє імя">
				</div>
				<div class="wrapper">
					<label for="pass" class="form-label">Пароль:</label>
					<input class="input-field" id="pass" type="password" name="password" placeholder="Створіть надійний пароль">
				</div>
				<div class="wrapper">
					<label for="pass-confirm" class="form-label">Підтвердіть пароль:</label>
					<input class="input-field" id="pass-confirm" type="password" name="password_confirm" placeholder="Введіть пароль повторно">
				</div>
				<button type="submit" class="btn">Зареєструватися</button>
			</fieldset>
		</form>
	</div>
		
</body>
</html>


