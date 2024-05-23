<?php

class controller
{
    public sessionManager $sessionManager;
    public $userInfo;
    protected array $urlInfo;

    public function __construct()
    {

        $this->sessionManager = new sessionManager();

        $this->urlInfo = explode('/',filter_var(rtrim($_GET['act'] ?? '','/'),FILTER_SANITIZE_URL));
    }


    public function render($file,$params = []): void
    {
        if(file_exists(VIEWS_PATH."/".$file.".php"))
        {
            //extract($params);
            require_once VIEWS_PATH."/".$file.".php";

        }
        else
        {
            exit(exit($file." Cannot find ".$file." view file"));
        }

    }

    public function model($file)
    {
        if(file_exists(MODELS_PATH."/".$file.".php"))
        {
            require_once MODELS_PATH."/".$file.".php";
            if(class_exists($file))
            {
                return new $file;
            }
            else
            {
                exit($file." is not a class object");
            }
        }
        else
        {
            exit(" Cannot find ".$file." model file");
        }
    }
    public function importClass($path,$class){
        if(file_exists(CLASSES_PATH."/".$path.".php")){
            require_once CLASSES_PATH."/".$path.".php";
            if(class_exists($class))
            {
                return new $class;
            }else{
                exit($class." is not a class object");

            }
        }else{
            exit(" Cannot find ".$path." file");
        }
    }

}
