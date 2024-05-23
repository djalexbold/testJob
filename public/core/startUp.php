<?php

class startUp
{

    protected $class;
    protected $method;
    public function __construct()
    {


        $this->class = "main";
        $this->method = "index";
    }
    public function start()
    {
        /* Get Url */
        if(@$_GET['act'])
        {
            $url = explode('/',filter_var(rtrim($_GET['act'],'/'),FILTER_SANITIZE_URL));
        }
        else
        {
            $url[0] = $this->class;
            $url[1] = $this->method;
        }

        /* Find Controller */
        if(file_exists(CONTROLLERS_PATH."/".$url[0].".php"))
        {
            $this->class = $url[0];
        }
        require_once CONTROLLERS_PATH . "/" . $this->class . ".php";

        if(class_exists($this->class))
        {
            $this->class = new $this->class;
            array_shift($url);
        }
        else
        {
            exit($this->class." class cannot found");
        }
        /* Find Method */
        if(isset($url[0]))
        {
            if(method_exists($this->class,$url[0]))
            {
                $this->method = $url[0];
                array_shift($url);
            }
            else
            {
                exit($url[0]." method connot find");
            }
        }
        call_user_func_array([$this->class,$this->method],$url);


    }
}