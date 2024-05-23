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
    if (!empty($params)) {
    $filter = $_GET['filter'] ?? '';
    foreach ($params['data'] as $key => $person) {
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
    <?php }} ?>
    </tbody>
</table>


