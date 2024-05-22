<?php
include dirname(__FILE__) . '/config.php';

set_include_path(LIB_PATH);
define('MODELS_PATH', Cfg::ROOT_DIR . '/models/');

spl_autoload_register(function ($class) {
    if (0 === strpos($class, 'Api\\')) {
        $parts = explode('\\', $class);
        switch ($parts[1]) {
            case 'Model':
                unset($parts[0], $parts[1]);
                $filename = MODELS_PATH . implode('/', $parts) . '.php';
                break;
            default:
                $filename = LIB_PATH . '/' . str_replace('\\', '/', $class). '.php';
        }
    } else {
        $filename = LIB_PATH . '/Library/' . str_replace('\\', '/', $class). '.php';
        //echo $filename, '<br />';
    }
    if (file_exists($filename)) {
        require $filename;
        return true;
    }
    return false;
});
