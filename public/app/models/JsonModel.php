<?php

class JsonModel
{
    public static function readJSONFile()
    {
        $path = 'data.json';

        try {
            $jsonContents = file_get_contents($path);
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

    public static function writeJSONFile(): void
    {
        $path = 'data.json';
        header("Content-Type: application/json");

        if (file_exists($path)) {
            $file = file_get_contents($path);
        } else {
            $file = fopen($path, "a+");
        }

        $dataList = json_decode($file, true);

        $name = $_POST['name'];
        $phone = $_POST['phone'];

        if ($name && $phone) {
            $dataList[] = array("name" => $name, "number" => $phone);
            file_put_contents($path, json_encode($dataList));
        }
        unset($file);
        unset($dataList);

    }


}
