<?php
require __DIR__ . '/../template/header.php';
?>
	<div class="container">
		<h1 class="title"><?= $isLoggedIn ? 'Адмін панель' : 'Привітання' ?></h1>
		<?php if($isLoggedIn): ?>
		<p class="message"><?= $message ?></p>
		<a href="/blog/logout" class="btn">Вийти</a>
		<div class="log">
			<h3 class="log-title">Історія входів:</h3>
			<?php if(!empty($logItems)): ?>
			<a class="btn delete_btn" href="index.php?clear_all" onclick="return confirm('Це видалить всі записи. Ви впевнені?')">Видалити все</a>
			<?php foreach ($logItems as $key => $log): ?>
			<p class="log-item"> <span><?= $key + 1 ?>. </span>
				[<?= $log['visit_time'] ?>] Користувач: <?= $log['username'] ?>
			 	<a class="btn delete_btn" href="index.php?delete_id=<?= $log['id'] ?>"
			 		onclick="return confirm('Ви впевнені?')">&times;Видалити</a></p>
			<?php endforeach;?>
			<?php else: ?>
				<p class="message">Історія поки що порожня.</p>
			<?php endif; ?>
		</div>
		<?php elseif($isRegistrated): ?>
		<div class="container">
			<h2>Вітаємо нового користувача: <?= $name ?> </h2>
			<p class="message">Будь ласка <a class="btn" href="/blog/log-in">увійдіть</a></p>
		</div>

		<?php else: ?>
			
		<div class="container">
			<h2>Вітаємо на нашому сайті</h2>
			<p class="message">Будь ласка <a class="btn" href="/blog/log-in">увійдіть</a> або <a class="btn" href="/blog/signed-up">зареєструйтесь</a></p>
		</div>

		<?php endif;?>	
	</div>
<?php require __DIR__ . '/../template/footer.php' ?>