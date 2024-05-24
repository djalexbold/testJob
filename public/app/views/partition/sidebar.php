<sidebar>
    <div class="container">
        <h2>Добавить контакт</h2>
        <form method="POST">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name">
            <label for="phone">Телефон:</label>
            <input type="tel" id="phone" name="phone" pattern="\+?[0-9\s\-\(\)]+">
            <input class="button" type="submit" value="Добавить">
        </form>
    </div>
</sidebar>
<?php
if (!empty($params)) {
    print_r($params);
}

