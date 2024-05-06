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

$name = $_GET['name'];
$phone = $_GET['phone'];

if ($name && $phone) {
    $dataList[] = array("name" => $name, "number" => $phone);
    file_put_contents($path, json_encode($dataList));
}

// освобождаем память
unset($file);
unset($dataList);
header("location: index.php");
