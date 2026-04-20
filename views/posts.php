<?php require __DIR__ . '/../template/header.php'; ?>
<div class='container'>
    <ul class="post-list">
    <?php foreach($posts as $post): ?>
        <li>
            <h2 class="post-title"><a href="/blog/posts?post_id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h2>
            <p class="post-content"><?= $post['content'] ?></p>
        </li>
    <?php endforeach; ?>
    </ul>
</div>
<?php require __DIR__ . '/../template/footer.php'; ?>