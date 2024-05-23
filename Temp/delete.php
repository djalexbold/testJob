<?php
global $path;
require_once "config.php";
header("Content-Type: application/json");


if (file_exists($path)) {
    $file = file_get_contents($path);
} else {
    $file = fopen($path, "a+");
}

$dataList = json_decode($file, true);

$del = $_GET['id_del'] ?? null;
unset($dataList[$del]);

file_put_contents($path, json_encode($dataList));

// освобождаем память
unset($file);
unset($dataList);
header("location: index.php");
