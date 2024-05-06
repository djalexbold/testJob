<?php
$filename = "data.json";
function readJSONFile($filename)
{
    try {
        $jsonContents = file_get_contents($filename);
        if ($jsonContents === false) {
            throw new Exception("Ошибка чтения файла JSON");
        }
        $decodedData = json_decode($jsonContents, true);
        if ($decodedData === null) {
            throw new Exception("Ошибка декодирования данных JSON");
        }
        return $decodedData;
    } catch (Exception $e) {
        echo "Произошла ошибка: " . $e->getMessage();
    }
    return $e;
}

$data = readJSONFile($filename);

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
        <h2>Список контактов</h2>
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
            foreach ($data as $key => $person) {
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
