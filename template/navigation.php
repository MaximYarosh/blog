<nav class="main-navigation">
    <ul>
        <li><a href="/blog/">Головна</a></li>
        <li><a href="/blog/posts">Статті</a></li>
        <?php if($isLoggedIn): ?>
        <li><a href="/blog/add">Додати статтю</a></li>
        <li><a href="/blog/admin">Адмін</a></li>
        <?php endif; ?>
    </ul>
</nav>