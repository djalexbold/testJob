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


}
