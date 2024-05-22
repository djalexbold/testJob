<?php
//echo date_default_timezone_get(), "\n<br />", date('d.m.Y H:i');
include '../lib/initialize.php';
$data = Cfg::readJSONFile('data.json')
?>

<!DOCTYPE html>
<html lang="ru">
<meta charset="utf-8">
<link rel="stylesheet" href="main.css">
<head>
    <title>Test</title>
</head>
<body>
<main class="main">
    <div class="container">
        <h2>Добавление контакта</h2>
        <form action="add.php" method="GET">
            <label for="name">Имя:</label><br>
            <input type="text" id="name" name="name"><br><br>
            <label for="phone">Телефон:</label><br>
            <input type="tel" id="phone" name="phone" pattern="\+?[0-9\s\-\(\)]+"><br><br>
            <input class="button" type="submit" value="Добавить">
        </form>
        <br>
    </div>

    <div class="done">
        <h2>Список контактов </h2>
        <div>
            Фильтр имени:
            <form action="" method="GET">
                <label for="filter">
                    <input type="text" id="filter" name="filter">
                    <input class="button" type="submit" value="OK">
                </label>
            </form>
        </div>
        <br>
        <table>
            <thead>
            <tr>
                <td>ID</td>
                <td>Имя</td>
                <td>Телефон</td>
                <td>Действие</td>
            </tr>
            </thead>
            <tbody>
            <?php
            $filter = $_GET['filter'] ?? '';
            foreach ($data as $key => $person) {
                if (isset($filter)) {
                    preg_match_all("/($filter)/", $person["name"], $personFilter);
                    echo $personFilter[0][0] . "\n";
                }
                ?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $person["name"]; ?></td>
                    <td><?php echo $person["number"]; ?></td>
                    <td><a href="delete.php?id_del=<?php echo $key; ?>">удалить</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

</main>
</body>
</html>
