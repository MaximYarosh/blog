<?php
require_once __DIR__ . '/../template/header.php';
?>
<div class="container">
    <h2 class="subtitle">Додати статтю<h2>
    <form action="/blog/add" method="POST">
        <div class="wrapper">
            <label class="form-label" for="title">Назва статті</label>
            <input class="input-field" type="text" name="title" id="title" placeholder="Веедіть назву сюди" required>
        </div>
        <div class="wrapper">
            <label class="form-label" for="category">Оберіть категорію</label>
            <select class="input-field" name="category" id="category">
                <?php foreach($categories as $category):?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="wrapper column">
            <label class="form-label" for="content">Текст статті</label>
            <textarea class="input-field textarea" id="content" name="content" cols="5" rows="7" required>

            </textarea>
        </div>
        <input class="btn" type="submit" value="Додати статтю">
    </form>
</div>
<?php require_once __DIR__ . '/../template/footer.php';?>