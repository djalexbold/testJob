<?php

define('ROOT_PATH', realpath(dirname(__FILE__) . '/../'));
define('LIB_PATH', ROOT_PATH . '/lib');

class Cfg
{
    const ROOT_DIR = LIB_PATH;


    public static function readJSONFile($path)
    {

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
