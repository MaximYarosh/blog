<nav class="main-navigation">
    <ul>
        <li><a href="/">Головна</a></li>
        <li><a href="/posts">Статті</a></li>
        <?php if($isLoggedIn): ?>
        <li><a href="/admin">Адмін</a></li>
        <?php endif; ?>
    </ul>
</nav>